<div id ="bodyright">
<h3>View All Sub Categories</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <th>Sub Category Id</th>
                <th>Sub Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
                    include("inc/function.php"); 
                    echo viewall_sub_category(); 
                ?>
            </tr>
        </table>
    </form>
    <h3 id = "add_cat">Add New Sub Category</h3>
    <form method = "POST">
        <table>
            <tr>
                <td>Select Category Name: </td>
                <td>
                    <select name = "main_cat">
                        <?php 
                            include("inc/function.php");
                            echo viewall_cat();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Sub Category Name: </td>
                <td><input type="text" name = "sub_cat_name" /></td>
            </tr>
        </table>
        <button name = "add_sub_cat">Add Sub Category</button>
    </form>
</div>

<?php
   echo add_sub_cat();
?>
