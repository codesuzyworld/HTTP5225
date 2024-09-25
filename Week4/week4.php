<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid justify-content-center">
        <div class="row g-2">
            <?php
                // Function to fetch user data from the JSONPlaceholder API
                function getUsers() {
                $url = "https://jsonplaceholder.typicode.com/users";
                $data = file_get_contents($url);
                return json_decode($data, true);
                }
                // Get the list of users
                $users = getUsers();
                for ($i = 0; $i < count($users); $i++) {
                    echo '<div class="col-md-4 mb-4"><div class="card" style="width: 18rem;">' .
                        '<div class="card-body">' . 
                            '<h5 class="card-title">' . $users[$i]["name"] . '</h5>' . 
                            '<h6 class="card-subtitle mb-2 text-muted">'. $users[$i]["email"] . '</h6>' .
                            '<h6 class="card-subtitle mb-2 text-muted">'. $users[$i]["phone"] . '</h6>' .  
                            '<p class="card-text">' .  
                                $users[$i]["address"]["suite"] . " " . 
                                $users[$i]["address"]["street"] . " " .  
                                $users[$i]["address"]["city"] . " " .  
                                $users[$i]["address"]["zipcode"] .
                            '</p>' .
                            '<a href="' . 'http://' . $users[$i]["website"] . '"' . 'class="btn btn-primary"> Personal Website' . '</a>' .
                        '</div>' . 
                        '</div>' . 
                    '</div>';
                };
            ?>
        </div>
    </div>
</body>
</html>