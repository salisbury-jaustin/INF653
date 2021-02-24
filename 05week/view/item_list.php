<?php include './view/header.php';?>
<main>
    <div id="toolbar">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="sort"></input> 
            <label for="cat_select">Category:</label>
            <select id="cat_select" name="categoryID">
                <option value=''>
                    View All Categories 
                </option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach ?>
            </select>
            <button type="submit">Sort</button>
        </form>
        <form action="index.php" method="post">
            <button type="submit" name="action" value="add_page">Add Item</button>
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="cat_page"></input>
            <button type="submit">Edit/Remove Categories</button>
        </form>
    </div>
    <div id="todolist">
        <h5>Title</h5>
        <h5>Description</h5>
        <h5>Category</h5>
        <div class="remove"></div>
        <?php foreach ($items as $item) : ?>
            <p><?php echo $item['Title']; ?></p>
            <p><?php echo $item['Description']; ?></p>
            <p><?php echo $item['categoryName']; ?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="rmv_item"></input>
                <button name="index" value="<?php echo $item['ItemNum']?>">Remove</button>
            </form>
        <?php endforeach ?>
    </div>
</main>
<?php include './view/footer.php';?>