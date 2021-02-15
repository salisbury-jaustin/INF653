<?php
    include 'database.php';
    $index = filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT);
    $errMessage = null;
    $query = 'delete from todoitems 
                where ItemNum = :itemNum';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $index);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
    }
    include 'index.php';
?>