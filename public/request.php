<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__  .  '/../vendor/autoload.php';

$app = AppFactory::create();

$app->any('/', function(Request $req, Response $res, $args){
    $data = $req->getMethod();     
    $res->getBody()->write("Method is : $data");
    return $res;
});

// fetch data passed into body (application/x-www-form-urlencoded) format
// $app->post('/', function(Request $req, Response $res, $args){
//     $data = $req->getParsedBody();
//     print_r($data);
    
//     echo "<br>";      
//     echo $data["name"] . " " . $data["number"];

//     $body = $req->getBody();
//     print_r("<br>" . $body->getSize());
//     print_r("<br>" . $body->getContents());

//    if($body->isReadable()){
//     echo "<br> readable";
//    }else{
//     echo "<br> not readable";
//    }

//    if($body->isWritable()){
//     echo "<br> writable";
//    }else{
//     echo "<br> not writable";
//    }
//     return $res;
// });

// get all headers
// $app->post('/', function(Request $req, Response $res,array $args){
//     $headers = $req->getHeaders();
//     foreach ($headers as $name => $values) {
//         echo $name . ": " . implode(", ", $values) . "<br>";
//     }    
    
//     echo "<br>";    //check if header is accept
//     if ($req->hasHeader('Accept')) {
//         $res->getBody()->write("Accept");
//         return $res;
//     }else{    
//     $res->getBody()->write("You don;t have accept in header");
//     return $res;}
// });

// URI
// $app->post('/data', function(Request $req, Response $res,array $args){
//     $uri = $req->getUri();
//     $data = $uri->getScheme();
//     print_r("<br>" . $data);
//     $data = $uri->gethost();
//     print_r("<br>" . $data);
//     $data = $uri->getPort();
//     print_r("<br>" . $data);
//     $data = $uri->getPath();
//     print_r("<br>" . $data);
//     $data = $uri->getQuery();
//     print_r("<br>" . $data);
//     $data = $uri->getUserInfo();
//     print_r("<br>" . $data);
//     $data = $uri->getAuthority();
//     print_r("<br>" . $data);
//     $data = $uri->getFragment();
//     print_r("<br>" . $data);
//     $res->getBody()->write("<br>end");
//     return $res;
// });

$app->run();

?>