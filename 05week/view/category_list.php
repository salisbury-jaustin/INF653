<?php include './view/header.php';?>
    <h2>Category List</h2>
    <div id="category_list">
        <h5>Name</h5>
        <div class="remove"></div>
        <?php foreach ($categories as $category) : ?> 
            <p><?php echo $category['categoryName']?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="rmv_cat"></input>
                <button type="submit" name="categoryID" value="<?php echo $category['categoryID'] ?>">Remove</button> 
            </form>
        <?php endforeach ?>
    </div>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_cat"></input>
        <h2>Add Category</h2>
        <label for="categoryName">Name:</label>
        <input type="text" id="categoryName" name="categoryName"></input>
        <button type="submit">Add Category</button>
    </form>
    <a href="./index.php">View To Do List</a>
<?php include './view/footer.php';?>