<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];

include "config.php";

$sql = "select * from student where Enroll = {$id}";

$result = mysqli_query($conn, $sql) or die("SQL query fail");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No record found.','status'=>false));
}
?>