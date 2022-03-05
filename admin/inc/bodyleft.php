<div id = "bodyleft">

    <ul>
        <li><a href = "index.php"><img src="../uploads/donation2.1.svg" class="navicons">Donations</a></li>
        <li><a href = "index.php?viewall_cat"><img src="../uploads/categories3.svg" class="navicons">Categories</a></li>
        <li ><a href = "index.php?viewall_sub_cat"><img src="../uploads/sales4.svg" class="navicons">Sales Inventory</a></li>
        <li ><a href = "index.php?add_products"><img src="../uploads/box.svg" class="navicons">Product Management</a></li>
        <li><a href = "index.php?viewall_products"><img src="../uploads/deliver.svg" class="navicons">Deliveries</a></li>
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