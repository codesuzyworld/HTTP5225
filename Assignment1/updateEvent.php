<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Event</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .form-background {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
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

    $startdate = date('Y-m-d', strtotime($result['startdate']));
    $enddate = date('Y-m-d', strtotime($result['enddate']));
    $starttime = date('H:i', strtotime($result['starttime']));
    $endtime = date('H:i', strtotime($result['endtime']));

    // Fetch available libraries for the dropdown
    $librariesQuery = "SELECT library_id, library FROM librarylocation";
    $librariesResult = mysqli_query($connect, $librariesQuery);
  ?> 

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="display-5">Update Event</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="form-background">
          <form method="POST" action="inc/updateScript.php">
            <div class="mb-3">
              <label for="title" class="form-label">Event Title</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title']; ?>" required>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="startdate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $startdate; ?>" required>
              </div>
              <div class="col-md-6">
                <label for="enddate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $enddate; ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="starttime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="starttime" name="starttime" value="<?php echo $starttime; ?>">
              </div>
              <div class="col-md-6">
                <label for="endtime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="endtime" name="endtime" value="<?php echo $endtime; ?>">
              </div>
            </div>

            <div class="mb-3">
              <label for="library_id" class="form-label">Library</label>
              <select class="form-control" id="library_id" name="library_id" required>
                <?php 
                  while ($library = mysqli_fetch_assoc($librariesResult)) { 
                    $selected = ($library['library_id'] == $result['library_id']) ? 'selected' : '';
                    echo "<option value='{$library['library_id']}' $selected>{$library['library']}</option>";
                  }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"><?php echo $result['description']; ?></textarea>
            </div>

            <input type="hidden" name="_id" value="<?php echo $result['_id']; ?>">
            <button type="submit" class="btn btn-primary" name="updateEvent">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>