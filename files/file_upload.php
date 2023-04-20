<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 class="text-center text-primary mt-3">Upload file</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="mb-3">
                    <form action="" method="post" enctype="multipart/form-data">
                    <label for="formFile" class="form-label">Select text file</label>
                    <input class="form-control my-2" type="file" id="formFile" name="image">
                    <!-- <input type="file" name="example" multiple="multiple"/><br/> -->
                     <input type="submit">
                    </form>
                </div>                  
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="border border-primary m-4 p-4">
    <?php

if(isset($_FILES['image'])){
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";

  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_type = $_FILES['image']['type'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $target_dir = "uploadedFiles/";

  if(move_uploaded_file($file_tmp, $target_dir . $file_name)){
    echo "File uploded successfully!";
  }else{
    echo "File not uploded :(";
  }
}

?>
  </div>
  </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
