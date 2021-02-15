<?php 
    include 'database.php';
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
    $errMessage = null;
    if (empty($title) || empty($description)) {
        $errMessage = 'You must provide title and description for your entry!';
    } else {
        $query = 'insert into todoitems 
                    (Title, Description)
                    values
                    (:title, :desc)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':desc', $description);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $errMessage = $e->getMessage();
        }
    }

    include 'index.php';
?>