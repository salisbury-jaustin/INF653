<?php 
require('./model/database.php');
require('./model/item_db.php');
require('./model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'list_items';
}

// defualt list display
if ($action == 'list_items') {
    $categories = getCategories();
    $items = getList();
    include('./view/item_list.php');
} 

// sort list by category
else if ($action == 'sort') {
    try{
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_NUMBER_INT); 
        if (empty($categoryID)) {
            $items = getList();
        } else {
            $items = getItemByCatID($categoryID);
        }
        $categories = getCategories();
        include('./view/item_list.php');
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
        include('./view/error.php');
    }
}

// go to add item page
else if ($action == 'add_page') {
    $categories = getCategories();
    include('./view/add_item.php');
} 

// go to add category page
else if ($action == 'cat_page') {
    $categories = getCategories();
    include('./view/category_list.php');
} 

// adds item to todoitems table
else if ($action == 'add_item') {
    try {
        $item = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_NUMBER_INT);
        if (empty($item) || empty($description)) {
            $errMessage = "You must include a title and description."; 
            include('./view/add_item.php');
        } else {
            addItem($item, $description, $category);
            include('./view/add_item.php');
        } 
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
        include('./view/error.php');
    }
}

// removes item from todoitems table
else if ($action == 'rmv_item') {
    try {
        $index = filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT);
        rmvItem($index);
        $items = getList();
        $categories = getCategories();
        include('./view/item_list.php');
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
        include('./view/error.php');
    }
}

// adds category to categories table
else if ($action == 'add_cat') {
    try {
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        addCat($categoryName);
        $categories = getCategories();
        include('./view/category_list.php');
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
        include('.view/error.php');
    }
}

// removes category from categories table
else if ($action == 'rmv_cat') {
    try {
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_STRING);
        rmvCat($categoryID);
        $categories = getCategories();
        include('./view/category_list.php');
    } catch (PDOException $e) {
        $errMessage = $e->getMessage();
        include('view/error.php');
    }
}
?>