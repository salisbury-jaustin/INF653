<?php 
    // get categories
    function getCategories() {
        global $db;
        $query = 'select * from categories';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }
    // get categories by ID 
    function getCatByCatID($categoryID) {
        global $db;
        $query = 'select * from categories
                    where categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $categories= $statement->fetch();
        $statement->closeCursor();
        $categoryName = $categories['categoryName'];
        return $categoryName;
    }
    // add category
    function addCat($categoryName) {
        global $db;
        $query = 'insert into categories
                    (categoryName)
                    values
                    (:categoryName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $categoryName);
        $statement->execute();
        $statement->closeCursor();
    }
    // remove category
    function rmvCat($categoryID) {
        global $db;
        $query = 'delete from categories
                    where categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();

        $query = 'update todoitems
                    set categoryID = NULL
                    where categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();
    }
?>