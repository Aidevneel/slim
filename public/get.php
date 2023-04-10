<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->get('/', function(Request $request, Response $response, $args){
    $response->getBody()->write("Hello World!");
    return $response;
});

$app->get('/data', function(Request $request, Response $response,$args){
    $param = $request->getQueryParams();
    var_dump($param);
    $response->getBody()->write("hello");
    return $response;
    // http://localhost:8000/data?id=56&name=neel
});

$app->get('/data/{name}', function(Request $request, Response $response,$args){
    $name = $args['name'];
    $response->getBody()->write("hello $name");
    return $response;
    // http://localhost:8000/data/neel
});


// Optional placeholder
$app->get('/data[/{name}]', function(Request $request, Response $response,$args){
    if($args){
        $name = $args['name'];
        $response->getBody()->write("hello $name");
        return $response;
    }else{
        $response->getBody()->write("hello n");
        return $response;
    }
    // http://localhost:8000/data/
});


// Optional multiple placeholder
$app->get('/data[/{name}[/{surname}]]', function(Request $request, Response $response,$args){
    if($args){
        if(count($args) == 2 ){
        $name = $args['name'];
        $surname = $args['surname'];
        $response->getBody()->write("hello $name $surname");
        return $response;
        }else if(count($args) == 1 ) {
            $name = implode(" ",$args);      
            $response->getBody()->write("hello $name ");
            return $response;        
        }
    }else {
        $response->getBody()->write("hello");
        return $response;
    }
    // http://localhost:8000/data/Neel/Shah
});


// unlimited placeholder
$app->get('/data[/{params:.*}]', function(Request $request, Response $response,$args){
    $name = implode(" ",$args); //array to string
    $response->getBody()->write("hello $name");
    return $response;
    // http://localhost:8000/data/12/23/34/45/5/6
});

// regular expression
$app->get('/data/{id:[1-5]+}', function(Request $request, Response $response,$args){
    $name = $args['id']; //array to string
    $response->getBody()->write("hello $name");
    return $response;
    // http://localhost:8000/data/4
});

$app->run();

?>