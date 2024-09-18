<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizz Buzz</title>
</head>
<body>
    <h1> Welcome to the Magic Number Game! </h1>


    <?php


        $number = rand();
        echo "<h1>Our random number this time is $number</h1>" . "<br>";

        if ($number % 3 === 0) {
            echo "<h2>It is a FIZZ!</h2>". "<br>" . "Because $number is divisible by 3". "<br>";
        } else if ($number % 5 === 0) {
            echo "<h2>It is a BUZZ!</h2>". "<br>";
            echo "Because $number is divisible by 5". "<br>";
        } else if ($number % 5 === 0 && $number % 3 === 0) {
            echo "<h2>It is a FIZZBUZZ!</h2>". "<br>";
            echo "Because $number is divisible by both 3 and 5". "<br>";          
        } else {
            echo "<h2>The magic number is $number itself!</h2>". "<br>";
            echo "Because $number is NOT divisible by either 3 or 5". "<br>";    
        }

    ?>

</body>
</html>