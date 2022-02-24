<div id ="bodyright">
    <h3>View All Categories</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
                    include("inc/function.php"); 
                    echo viewall_category(); 
                ?>
            </tr>
        </table>
    </form>
    <h3 id = "add_cat">Add Category</h3>
    <form method = "POST">
        <table>
            <tr>
                <td>Enter Category Name: </td>
                <td><input type="text" name = "cat_name" /></td>
            </tr>
        </table>
        <button name = "add_cat">Add Category</button>
    </form>
</div>

<?php
    echo add_cat();
?>
