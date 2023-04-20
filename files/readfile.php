<?php

$file = "uploadedFiles/read.txt";

echo filesize($file) . "<br>";
echo filetype($file) . "<br>";
echo filetype("uploadedFiles") . "<br>";
echo $path = realpath($file) . "<br>";
echo "<pre>";
print_r(pathinfo($file)) . "<br>";
echo "</pre>";

echo dirname($path,5) . "<br>";
echo dirname($path) . "<br>";

// if(file_exists($file)){
//     echo readfile("$file");

//     copy($file,"copyfile.txt");
//     echo "<br>File copy";

//     rename("copyfile.txt","renamed.txt");

//     unlink("renamed.txt");

// }else{
//     echo "File does not exists";
// }

// if(!file_exists("newfolder")){
    
//     mkdir("newfolder");
//     echo "New Folder created";

// }else{
//     echo "File Folder already exists";
//     rmdir("newfolder");
//     echo "<br> Removing file";
// }


?>