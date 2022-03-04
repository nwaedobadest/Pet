<div id = "bodyleft">
    <h3>Admin Dashboard</h3>

    <ul>
        <li><a href = "index.php"><img src="../uploads/home.svg" class="navicons">Donatoins</a></li>
        <li><a href = "index.php?viewall_cat"><img src="../uploads/category.png" class="navicons">Categories</a></li>
        <li><a href = "index.php?viewall_sub_cat">Sales Inventory</a></li>
        <li><a href = "index.php?add_products">Add Product</a></li>
        <li><a href = "index.php?viewall_products">Products</a></li>
        <li><a href= "index.php?viewall_users">View All Users</a></li> 

    </ul>
</div>

<?php
    if(isset($_GET['viewall_cat']))
    {
        include("cat.php");
    }
    if(isset($_GET['viewall_sub_cat']))
    {
        include("sub_cat.php");
    }
    if(isset($_GET['viewall_products']))
    {
        include("viewall_products.php");
    }
    if(isset($_GET['add_products']))
    {
        include("add_products.php");
    }
    if(isset($_GET['viewall_users']))
    {
        include("viewall_users.php");
    }

?>