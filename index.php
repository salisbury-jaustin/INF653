<?php 
    $fName = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    $lName = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET,'age', FILTER_SANITIZE_NUMBER_INT);
    $message = null;
    if (empty($fName) || empty($lName) || empty($age)) {
        $message = 'You must provide your first and last name, and your age.';
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body class="flexCenter">
    <!--
        3 get parameters:
            first name
            last name
            age
        output:
            "Hello, my name is first name last name"
            "I am age years old and...
            a. if >= 18: I am old enough to vote in the United States."
            b. if < 18: I am not old enough to vote in the United States."
        calculate:
            the days based on the number given for age
        add: 
            the current date to the page
        clean input parameters using built-in php functions
        output messages if the given parameters are not submitted
            empty or do not exist
    -->
<div class='flexCenter content'>
    <header class='flexCenter'>
        <h1>Assignment 1</h1>
    </header>
    <main class='flexCenter'>
        <?php if ($message != null):?>
            <h1><?php echo $message?></h1>
        <?php else:?>
            <h1><?php echo 'Hello, my name is ' . $fName . ' ' . $lName . '.'?></h1>
            <h2>
                <?php 
                    echo 'I am ' . $age . ' years old and ';  
                    if ($age < 18) {
                        echo 'I am not old enough to vote in the United States.';
                    } else {
                        echo 'I am old enough to vote in the United States.';
                    }
                ?>
            </h2>
            <h2>
                <?php
                    echo "That means I am atleast " . $age*365 . " days old.";
                ?>
            </h2>
        <?php endif;?>
    </main>
    <footer class='flexCenter'>
            <h3>
                <?php
                    echo "Today is " . date('m/d/y');
                ?>
            </h3>
    </footer>
</div>
</body>
</html>