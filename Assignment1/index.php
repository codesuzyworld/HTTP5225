<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome CDN for Logos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Toronto Public Library Events</h1>
      </div>
    </div>
    <div class="row">
      <?php 
        require('reusables/connect.php');
        $query = 'SELECT tpl_events_feed.*, librarylocation.library AS library 
                  FROM tpl_events_feed 
                  LEFT JOIN librarylocation
                  ON tpl_events_feed.library_id = librarylocation.library_id';
        $events = mysqli_query($connect, $query);

        foreach($events as $event) {
          // if "otherinfo" says "None", then return null, if it's a valid JSON, then decode it and return true
          if ($event['otherinfo'] !== 'None') {
            $otherinfo = json_decode($event['otherinfo'], true);
          } else {
            $otherinfo = null;
          }
      
          echo '<div class="col-12 mb-3">
                  <div class="card mb-3">
                    <div class="row g-0">';
      
          // If otherinfo is null, then show a placeholder 
          if ($otherinfo != null) {
            echo '<div class="col-md-4">
                    <img src="' . $otherinfo['smallImageURL'] . '" class="card-img" alt="Event Image" style="max-height: 300px; object-fit: cover;">
                  </div>';
          } else {
            echo '<div class="col-md-4 d-flex align-items-center justify-content-center flex-column" style="max-height: 300px; background-color: #f0f0f0;">
                    <i class="fas fa-image mb-2" style="font-size: 3rem; color: #ccc;"></i>
                    <p class="text-muted">No Image Available</p>
                  </div>';
          }
      
          // Right Column: Event Information
          echo '<div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title text-primary">' . $event['title'] . '</h5>';
      
          // Display badges if eventtype fields are not 'None'
          if ($event['eventtype1'] != 'None') {
            echo '<span class="badge bg-primary">' . $event['eventtype1'] . '</span> ';
          }
          if ($event['eventtype2'] != 'None') {
            echo '<span class="badge bg-secondary">' . $event['eventtype2'] . '</span> ';
          }
          if ($event['eventtype3'] != 'None') {
            echo '<span class="badge bg-success">' . $event['eventtype3'] . '</span> ';
          }
      
          echo '<p class="card-text">
                  <i class="fas fa-calendar-alt me-2"></i>' . $event['startdate'] . ' - ' . $event['enddate'] . '
                </p>';
      
          if ($event['starttime'] == 'None' && $event['endtime'] == 'None') {
            echo '<p class="card-text"><i class="fas fa-clock me-2"></i>Full Day Event</p>';
          } else {
            echo '<p class="card-text">
                    <i class="fas fa-clock me-2"></i>' . $event['starttime'] . ' - ' . $event['endtime'] . '
                  </p>';
          }
      
          echo '<p class="card-text">
                  <i class="fas fa-map-marker-alt me-2"></i>' . $event['library'] . '
                </p>
      
                <button class="btn btn-link text-decoration-none p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $event['_id'] . '" aria-expanded="false" aria-controls="collapse' . $event['_id'] . '">
                  Show Event Description
                </button>
      
                <div id="collapse' . $event['_id'] . '" class="collapse">
                  <div class="card-body">
                    <p class="card-text">' . $event['description'] . '</p>
                  </div>
                </div>
              </div>
              
              <!-- Footer with buttons -->
              <div class="card-footer d-flex justify-content-between">

                <a href="' . $event['pagelink'] . '" class="btn btn-sm btn-info"><i class="fas fa-external-link-alt"></i> Go to Event Page</a>

                <form method="GET" action="updateEvent.php">
                  <input type="hidden" name="_id" value="' . $event['_id'] . '">
                  <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Update</button>
                </form>
      
                <form method="GET" action="deleteEvent.php">
                  <input type="hidden" name="_id" value="' . $event['_id'] . '">              
                  <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>';
        }
      ?>
    </div>
  </div>
</body>
</html>