<?php 
    // parameters for php data object
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $user = 'root';
    $password = '';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // sets error mode for PDO

    // initialize the pdo
    try {
        $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        $errorMssg = $e->getMessage();
        include('../view/error.php');
        exit();
    }
?>