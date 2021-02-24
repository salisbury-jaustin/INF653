<?php 
    // get all items from todolist
    function getList() {
        global $db;
        $query = 'select i.ItemNum, i.Title, i.Description, i.categoryID, c.categoryName
                     from todoitems i left join categories c
                     on i.categoryID = c.categoryID';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }
    // get items by category
    function getItemByCatID($categoryID) {
        global $db;
        $query = 'select i.ItemNum, i.Title, i.Description, i.categoryID, c.categoryName
                    from todoitems i left join categories c
                    on i.categoryID = c.categoryID
                    where i.categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }
    // add item
    function addItem($item, $desc, $category) {
        global $db;
        if (!empty($category)) {
            $query = 'insert into todoitems
                        (Title, Description, categoryID)
                        values
                        (:item, :desc, :categoryID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $category);
        } else {
            $query = 'insert into todoitems
                        (Title, Description)
                        values
                        (:item, :desc)';
            $statement = $db->prepare($query);
        }
        $statement->bindValue(':item', $item);
        $statement->bindValue(':desc', $desc);
        $statement->execute();
        $statement->closeCursor();
    } 
    // remove item
    function rmvItem($index) {
        global $db;
        $query = 'delete from todoitems
                    where ItemNum = :index';
        $statement = $db->prepare($query);
        $statement->bindValue(':index', $index);
        $statement->execute();
        $statement->closeCursor();
    }
?>