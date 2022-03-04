<div id = "header">
    <div id = "logo">
        <a href = "index.php"><img src = "/Pet/uploads/logo.png" /></a>
    </div><!-- <End of Logo> -->
    <div id = 'link'>
        <ul>
            <li>
                <a href = ''>Donate</a>
            </li>
            <li>
                <a href = ''>Sign Up</a>
            </li>
            <li>    
                <?php 
                    include("inc/db.php");
                    session_start();

                    if(isset($_SESSION['user_username']))
                    {
                        $user_id = $_POST['user_id'];
                        $showUserName = $con->prepare("SELECT * FROM users_table WHERE user_id = '$user_id'");
                        $showUserName->execute(['user_id'=>$_SESSION['user_username']]);
                        $fetchUser = $showUserName->fetch();

                        echo $fetchUser['user_username'];
                    }
                ?>
            </li>
        </ul>
    </div><!-- <End of Link> -->
   
    <div id = "search">
        <form method = "get" action = "search.php" enctype="multipart/form-data">
            <input type="text" name = 'user_query' placeholder = "Search products here..">
            <button id = "search_btn" name = "search">Search</button>
            <button id = "cart_btn"><a href = 'cart.php'>Cart (<?php echo cart_count(); ?>)</a></button>
        </form>
    </div><!-- <End of Search> -->
</div><!-- <End of Header> -->
