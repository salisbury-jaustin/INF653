<?php include './view/header.php';?>
    <main>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="add_item"></input>
            <label for="cat_select">Category:</label>
            <select id="cat_select" name="categoryID">
                <option value=''>
                    None
                </option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach ?>
            </select>
            <label for="title">Title:</label>
            <input type="text" name="title"></input>
            <label for="desc">Description:</label>
            <input type="text" name="desc"></input>
            <button type="submit">Add Item</button>
        </form>
        <?php if (!empty($errMessage)) : ?>
            <p><?php echo $errMessage ?></p>
        <?php endif ?>
        <a href="./index.php">View To Do List</a>
    </main>
<?php include './view/footer.php';?>