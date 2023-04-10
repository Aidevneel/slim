<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
// $app->get('/data', function(Request $request, Response $response,$args){
//     $param = $request->getQueryParams();
//     var_dump($param);
//     $response->getBody()->write("hello");
//     return $response;    
// });


$app->run();

?>