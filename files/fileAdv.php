<?php


$file = fopen("uploadedFiles/read.txt","r");

// echo fread($file,20) . "<br>";
// echo fread($file,filesize("uploadedFiles/read.txt")) . "<br>";
// echo fgets($file) . "<br>";
// echo fgets($file) . "<br>";
// echo ftell($file) . "<br>";
// fseek($file,15) . "<br>";
// echo ftell($file) . "<br>";


while(!feof($file)){
    $line = fgets($file);
    echo $line . "<br>";
}
?>