<?php 
    include 'database.php';
    // retrieve the todolist
    $query = 'select * from todoitems';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>ToDo List</title>
</head>
<body>
    <header>
        <h1>ToDo List</h1>
    </header> 
    <main> 
        <form id="inputForm" action="post_addItem.php" method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" class="input" id="titleInput"></input>
            <label for="desc">Description</label>
            <input type="text" name="desc" class="input" id="descInput"></input>
            <button type="submit">Add</button>
            <?php if (!empty($errMessage)) : ?>
                <p><?php echo 'Error: ' . $errMessage?></p>
            <?php endif ?>
        </form>
        <div id="list">
            <?php foreach ($items as $item) : ?>
                <div class="todoItem">
                    <div class="itemName">
                        <h2>
                            <?php 
                                echo $item['Title'];   
                            ?> 
                        </h2>
                    </div>
                    <div class="itemDesc">
                        <p>
                            <?php
                                echo $item['Description'];
                            ?>
                        </p>
                    </div>
                    <form id="removeForm" action="post_removeItem.php" method="POST">
                        <button type="submit" name="index" value="<?php echo $item['ItemNum']?>">X</button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </main>
    <div>

    </div>
</body>
</html>