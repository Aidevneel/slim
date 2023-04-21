<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods');

$data = json_decode(file_get_contents("php://input"),true);

$name = $data['name'];
$book = $data['book'];
$bg = $data['bg'];

include "config.php";

$sql = "insert into student(SName, Fav_book, BloodGroup) values('{$name}','{$book}','{$bg}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=>'Record inserted.','status'=>true));
}else{
    echo json_encode(array('message'=>'No record inserted.','status'=>false));
}

?>