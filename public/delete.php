<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/DB.php';

$app = AppFactory::create();

$app->delete('/data/{name}', function(Request $request, Response $response,$args){
    
    $name = $args['name'];

    $db = new DB();
    $conn = $db->connect();
    $sql = $conn->query("delete from slimTBL where name = '$name'");
    $error = $sql->errorInfo();
    if($error[1]){
        print_r($error[2]);
        $response->getBody()->write("ERROR");
        return $response;
    }else{
        while($row = $sql->fetch(PDO::FETCH_OBJ)){
            echo "{$row->name} - {$row->surname} - {$row->age}  - {$row->number} <br>";
        } 
        $response->getBody()->write("deleted :  $name");
        return $response;  
    }        

    // http://localhost:8000/data/neel
});

$app->run();

?>