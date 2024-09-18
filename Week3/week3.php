<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Feeding</title>
</head>
<body>
    <h1> What are the animal having now? </h1>


    <?php

        //Setting the timezone to Toronto Canada
        date_default_timezone_set("Canada/Eastern");

        //Showing the time now
        echo "The time now is " . date("h:i:sa") . "<br>";
        
        // Depending on the meal type, display the meal list
        $breakfast = "Bananas, Apples, and Oats";
        $lunch = "Fish, Chicken, and Vegetables";
        $dinner = "Steak, Carrots, and Broccoli";

        //Get time now
        $hour = date('G');

        // If else statement that shows the meal type according to type
        if ($hour >= 5 && $hour <= 9) {
            echo "<h1> Good morning! </h1>" . "<br>" . "The animals are having $breakfast.";
        } else if ($hour >= 12 && $hour <= 14) {
            echo "<h1> Good Afternoon! </h1>" . "<br>" . "The animals are having $lunch.";
        } else if ($hour >= 19 && $hour <= 21) {
            echo "<h1> Good Evening! </h1>" . "<br>" . "The animals are having $dinner.";
        } else {
            echo "<h1> Hello! </h1>" . "We are not feeding animals at the moment.";
        }

    ?>

</body>
</html>