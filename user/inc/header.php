<?php
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
 
	//unset quantity
	unset($_SESSION['qty_array']);
?>

<div id = "header">
    <div id = "logo">
        <a href = "index.php"><img src = "../uploads/logo2.png" class="logo"/></a>
    </div><!-- <End of Logo> -->
   
   
    <div id = "search">
        <form method = "get" action = "search.php" enctype="multipart/form-data">
            <input type="text" name = 'user_query' placeholder = "Search products here..">
            <button id = "search_btn" name = "search"><img src = "../uploads/search.svg" class = "searchIcon"></button>
            <button id = "cart_btn"><a href = 'cart.php'>Cart (<?php echo count($_SESSION['cart']); ?>)</a></button>
        </form>
    </div><!-- <End of Search> -->

    
   <!-- <End of Link> -->
</div><!-- <End of Header> -->
