<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <?php 
        require('reusables/connect.php');
        $id = $_GET['id'];
        $query = "SELECT * FROM schools WHERE `id` = '$id'";
        $school = mysqli_query($connect, $query);

        $result = $school -> fetch_assoc();
    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="display-4"><?php echo "Are you sure you want to delete" . " " . $result['School Name'] . " ?"?></h1>
      </div>
      <div>
        <div class="col">
                  <form method="POST" action="inc/deleteScript.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">              
                  <button class="btn btn-sm btn-danger" name="deleteSchool">Delete</button>
        </div>
      </div>
</body>
</html>