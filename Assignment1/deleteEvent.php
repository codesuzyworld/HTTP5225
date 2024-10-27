<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm Delete</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php'); ?>
      </div>
    </div>
  </div>

  <?php 
  // Error Reporting
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

    require('reusables/connect.php');
    $id = $_GET['_id'];
    $query = "SELECT * FROM tpl_events_feed WHERE `_id` = '$id'";
    $event = mysqli_query($connect, $query);
    $result = $event->fetch_assoc();
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="display-4"><?php echo "Are you sure you want to delete \"" . $result['title'] . "\"?" ?></h2>
      </div>
      <div class="col-md-12 mt-3">
        <form method="POST" action="inc/deleteScript.php">
          <input type="hidden" name="_id" value="<?php echo $id; ?>">
          <button class="btn btn-danger" name="deleteEvent">Delete</button>
          <a href="../index.php" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>