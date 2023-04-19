<?php

    $host = "mysql:host=localhost;dbname=slimDB";    
    $password = "home1234";
    $username = "neel";

    try {
        $conn = new PDO($host, $username, $password);
        $sql = $conn->query("Select * from slimTBL");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        while($row = $sql->fetch(PDO::FETCH_OBJ)){
            echo "{$row->name} - {$row->surname} - {$row->age}  - {$row->number} <br>";
        }
        
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<pre>";
            print_r($row);
            echo "</pre>";
            // echo "{$row['name']}";
        }

       
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
   

?>