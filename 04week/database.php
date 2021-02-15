<?php 
    // parameters for php data object
    $dsn = 'mysql:host=localhost;dbname=ToDoList';
    $username = 'root';
    $password = '';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // sets error mode for PDO

    // create database
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) { // if error then retrieve error message and include error page
        $errorMessage = $e->getMessage();
        include('dbError.php');
        exit();
    }
?>