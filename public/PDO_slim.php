<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/DB.php';

$app = AppFactory::create();

$app->any('/data', function(Request $req, Response $res,array $args){
    
    try{
        $db = new DB();
        $conn = $db->connect();
        $sql = $conn->query("select * from slimTBL");
        $error = $sql->errorInfo();
        if($error[1]){
            print_r($error[2]);
        }else{
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                echo "{$row->name} - {$row->surname} - {$row->age}  - {$row->number} <br>";
            }   
        }        

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    finally{
        $res->getBody()->write("<br>end");
        return $res;
    }

});

$app->run();

?>