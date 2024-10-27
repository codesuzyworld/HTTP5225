<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event</title>
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
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <div class="container mt-5">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="display-5">Add Event</h1>
    </div>
  </div>
</div>

      <?php 
      // Error showing
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require('reusables/connect.php');

    // Fetch available libraries for the dropdown
        $librariesQuery = "SELECT library_id, library FROM librarylocation";
        $librariesResult = mysqli_query($connect, $librariesQuery);
      ?> 

    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="form-background">
          <form method="POST" action="inc/addScript.php">
            <div class="mb-3">
              <label for="title" class="form-label">Event Title</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="startdate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startdate" name="startdate" required>
              </div>
              <div class="col-md-6">
                <label for="enddate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="enddate" name="enddate">
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="starttime" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="starttime" name="starttime">
              </div>
              <div class="col-md-6">
                <label for="endtime" class="form-label">End Time</label>
                <input type="time" class="form-control" id="endtime" name="endtime">
              </div>
            </div>

            <div class="mb-3">
              <label for="eventtypes" class="form-label">Event Types</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="eventtype1" name="eventtype1" placeholder="Type 1">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="eventtype2" name="eventtype2" placeholder="Type 2">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="eventtype3" name="eventtype3" placeholder="Type 3">
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="library_id" class="form-label">Library For Event</label>
              <select class="form-control" id="library_id" name="library_id" required>
                <?php 
                  while ($library = mysqli_fetch_assoc($librariesResult)) { 
                    echo "<option value='{$library['library_id']}'>{$library['library']}</option>";
                  }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="pagelink" class="form-label">Page Link</label>
              <input type="url" class="form-control" id="pagelink" name="pagelink">
            </div>

            <div class="mb-3">
              <label for="otherinfo" class="form-label">Photo Link (JSON)</label>
              <textarea class="form-control" id="otherinfo" name="otherinfo" rows="3" placeholder='{"smallImageURL": "http://example.com/image.jpg"}'></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="addEvent">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>