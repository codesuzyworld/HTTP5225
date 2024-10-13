<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connect = mysqli_connect(
            'localhost',
            'root',
            'root',
            'phpweek5'
        );

        if(!$connect){
            echo 'Error Code:' . mysqli_connect_errno();
            echo 'Error Message:' . mysqli_connect_error();
            exit;
        }

        $query = 'SELECT `Name`, `Hex` FROM `colors`';

        $results = mysqli_query($connect, $query);

        if(!$results){
            echo 'Error Message:' . mysqli_error($connect);
        } else {
            echo 'The query found the following number of results: ' . mysqli_num_rows($results);
            
            //Hex


            foreach ($results as $result) {

                echo '<div style="background-color:' . $result["Hex"] . ';text-align:center;">' . $result["Name"] . '</div>';
            }

        }
    ?>

</body>
</html>