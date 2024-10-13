<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
    <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <h1 class="display-2"> Schools </h1>
            </div>
        </div>

        <div class="row">
            <?php
                require('reusables/connect.php');
                
                $query = 'SELECT * FROM schools'; 
                $schools = mysqli_query($connect,$query); 

                // echo '<pre>' . print_r($schools) . '</pre>'

                foreach($schools as $school){
                    echo '<div class="col-md-4 mt-2 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">' . $school['School Name'] . '</h5>
                                <p class="card-text">' . $school['School Level'] . '</p>
                                <span class="badge bg-secondary">' . $school['Phone'] . '</span>
                                <span class="badge bg-info">' . $school['Email'] . '</span>
                              </div>
                            </div>
                          </div>';  
                  }
            ?>
        </div>

    </div>
</body>
</html>