<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        <h1 class="display-2">Add Event</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <form method="POST" action="inc/addScript.php">
          <div class="mb-3">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="startdate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startdate" name="startdate" required>
          </div>

          <div class="mb-3">
            <label for="enddate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="enddate" name="enddate">
          </div>

          <div class="mb-3">
            <label for="starttime" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime">
          </div>

          <div class="mb-3">
            <label for="endtime" class="form-label">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime">
          </div>

          <div class="mb-3">
            <label for="eventtype1" class="form-label">Event Type 1</label>
            <input type="text" class="form-control" id="eventtype1" name="eventtype1">
          </div>

          <div class="mb-3">
            <label for="eventtype2" class="form-label">Event Type 2</label>
            <input type="text" class="form-control" id="eventtype2" name="eventtype2">
          </div>

          <div class="mb-3">
            <label for="eventtype3" class="form-label">Event Type 3</label>
            <input type="text" class="form-control" id="eventtype3" name="eventtype3">
          </div>

          <div class="mb-3">
            <label for="library_id" class="form-label">Library ID</label>
            <input type="number" class="form-control" id="library_id" name="library_id" required>
          </div>

          <div class="mb-3">
            <label for="pagelink" class="form-label">Page Link</label>
            <input type="url" class="form-control" id="pagelink" name="pagelink">
          </div>

          <div class="mb-3">
            <label for="otherinfo" class="form-label">Other Info (JSON)</label>
            <textarea class="form-control" id="otherinfo" name="otherinfo" rows="3" placeholder='{"smallImageURL": "http://example.com/image.jpg"}'></textarea>
          </div>

          <button type="submit" class="btn btn-primary" name="addEvent">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>