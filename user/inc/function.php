<?php
    session_start();
    function signUp()
    {
        include("inc/db.php");
        if(isset($_POST['sign_up']))
        {
            $user_username = $_POST['user_username'];
            $user_pass = $_POST['user_pass'];
            $user_email = $_POST['user_email'];
            $user_contact_number = $_POST['user_contact_number'];

            $user_img = $_FILES['user_img']['name'];
            $user_img_tmp = $_FILES['user_img']['tmp_name'];

            move_uploaded_file($user_img_tmp,"../uploads/user_profile/$user_img");

            $add_user = $con->prepare("INSERT INTO users_tbl
            (
                user_username, 
                user_pass,
                user_email,
                user_contact_number,
                user_img
            ) 
            VALUES
            (
                '$user_username',
                '$user_pass',
                '$user_email',
                '$user_contact_number',
                '$user_img'
            )");

            if($add_user->execute())
            {
                echo "<script>alert('Registration Successful!');</script>";
                echo "<script>window.open('index.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('Registration Failed!');</script>";
            }
        }
    }

    function LogIn()
    {
        include("inc/db.php");
        if(isset($_POST['login_user']))
        {
            $user_username = $_POST['user_username'];
            $user_password = $_POST['user_password'];

            $fetchuser = $con->prepare("SELECT * FROM users_table WHERE user_username = '$user_username' AND user_password = '$user_password'");
            $fetchuser->setFetchMode(PDO:: FETCH_ASSOC);
            $fetchuser->execute();
            $countUser = $fetchuser->rowCount();

            $row = $fetchuser->fetch();
            $user_role = $row['user_type'];
            if($countUser>0)
            {
                $_SESSION['user_username'] = $_POST['user_username'];
                echo "<script>window.open('index.php?login_user=".$_SESSION['user_username']."','_self');</script>";
            }
            else
            {
                echo "<script>alert('Username or Password is incorrect!');</script>";
            }
        }

    }
    
    function myProfile()
    {
        include("inc/db.php");
        if(isset($_SESSION['user_username']))
        {
            $user_id = $_SESSION['user_username'];
            $fetch_user_username = $con->prepare("SELECT * FROM users_table WHERE user_username = '$user_id'");
            $fetch_user_username->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_user_username->execute();
    
            $row = $fetch_user_username->fetch();
            $id = $row['user_id'];
    
            echo 
            "<form method = 'POST' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Username: </td>
                        <td><input type = 'text' name =  'user_username' value = '".$row['user_username']."' /></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type = 'password' name = 'user_password' value = '".$row['user_password']."' /></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type = 'email' name = 'user_email' value = '".$row['user_email']."' /></td>
                    </tr>
                    <tr>
                        <td>Contact Number: </td>
                        <td><input type = 'text' name = 'user_contactnumber' value = '".$row['user_contactnumber']."' /></td>
                    </tr>
                    <tr>
                        <td>Profile Photo: </td>
                        <td>
                            <input type = 'file' name = 'user_profilephoto' />
                            <img src = '../uploads/user_profile/".$row['user_profilephoto']."'  />
                        </td>
                    </tr>
                </table>
                <button name = 'update_user'>Update Profile</button>
            </form>";
    
            if(isset($_POST['update_user']))
            {
                $user_username = $_POST['user_username'];
                $user_password =  $_POST['user_password'];
                $user_contactnumber = $_POST['user_contactnumber'];
                $user_email = $_POST['user_email'];
                $user_profilephoto = $_POST['user_profilephoto'];
    
                $update_user = $con->prepare("UPDATE users_table 
                SET 
                    user_username='$user_username',
                    user_password = '$user_password',
                    user_contactnumber = '$user_contactnumber',
                    user_email = '$user_email',
                    user_profilephoto = '$user_profilephoto'
                WHERE 
                    user_id = '$id'");
    
                if($update_user->execute())
                {
                    echo "<script>alert('Your Information Successfully Updated!');</script>";
                    echo "<script>window.open('index.php?login_user=".$_SESSION['user_username']."', '_self');</script>";
                }
            }
        }
    }

    function getIp() 
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }

    function add_cart()
    {
        if(isset($_POST['cart_btn']))
        {
            array_push( $_SESSION['cart'], $_POST['pro_id']);
            echo "<script>window.open('/Pet/user/index.php?' ,'_self');</script>";  
        }
       
    }

    function cart_count()
    {
        // include("inc/db.php");

        // $ip = getIp();
        // $get_cart_item = $con->prepare("SELECT * FROM cart WHERE ip_add='$ip'");
        // $get_cart_item->execute();

        // $count_cart = $get_cart_item->rowCount();

        // echo $count_cart;
        //HEHE
    }
    
    function cart_display()
    {   
        $net_total = "0";
        if(!empty($_SESSION['cart']))
        {
            include("inc/db.php");
            if(!isset($_SESSION['qty_array']))
            {
                $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
            }
            $display_cart = $con->prepare("SELECT * FROM product_tbl WHERE pro_id IN (".implode(',',$_SESSION['cart']).")");
            $display_cart->setFetchMode(PDO:: FETCH_ASSOC);
            $display_cart->execute();
            
            echo "<table cellpadding='0' cellspacing = '0'>
                             <tr>
                                 <th>Image</th>
                                 <th>Product Name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Sub Total</th>
                                 <th>Remove</th>
                             </tr>";

            while($row_pro = $display_cart->fetch()):
                echo "<form method = '' enctype = 'multipart/form-data'>
                        <tr>
                            <td>
                            <img src = '../uploads/products/".$row_pro['pro_img']."'  />
                            </td>
                            <td>
                                ".$row_pro['pro_name']."
                            </td>
                            <td>
                                <input type = 'number' class = 'iquantity' onchange='subTotal()' name = 'pro_quantity' value = '".array_count_values($_SESSION['cart'])[$row_pro['pro_id']]." min = '1' max = '1
                                '/>
                            </td>
                            <td>
                                <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id'/>
                                <a href = 'update_cart_qty.php?update_cart_qty=".$row_pro['pro_id']."'><button id = 'pro_btn'>Update</button></a>
                            </td>
                            <td>
                                class = 'iprice' value = '".$row_pro['pro_price']."'
                            </td>
                            <td class = 'itotal'>";
                                $qty = $row_pro['pro_quantity'];
                                $pro_price = $row_pro['pro_price'];
                                $sub_total = $qty * $pro_price;
                                echo $sub_total;

                                $net_total = $net_total + $sub_total;
                            echo "</td>
                            <td>
                                <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id'/>
                                <a href = 'delete_cart.php?delete_cart=".$row_pro['pro_id']."'><button id = 'pro_btn'>X</button></a>
                            </td>
                        </tr>
                    </form>";
            endwhile;
        }
        else
        {
            echo "<td>
                    <h2><center>Your cart is empty!</center</h2
                 </td>
                 <td>
                     <center><a href='/Pet/user/index.php'>Click Here to Buy a Product from our Store!</a></center>
                 </td>";
        }
    }

    function delete_cart_items() {

        if(isset($_GET['delete_cart']) && !empty($_GET['delete_cart'])) {


            //Get Product Id
            $itemID = trim($_GET['delete_cart']);


            //Remove $itemID from session cart
            if(in_array($itemID, $_SESSION['cart'])) {


                //Whats happening here?
                //array_diff would compute the difference between
                //$_SESSION['cart'] and the needle array which has the 
                //value of $itemID. Doing so would return unique values into $_SESSION['cart']
                $_SESSION['cart'] = array_diff($_SESSION['cart'], array($itemID));


                header("location: cart.php");

            } else {

                //When the specified product Id doesnt exist
                //You could still redirect to previous page
                //Maybe append some error query
                header("location: cart.php?error=" . $itemID . " key not found");
            }
        } else {


            //Something isn't Right
            //The product Key is not set or empty
            header("location: cart.php?error=" . $itemID . " key not found");
        }
    }

    function update_cart_quantity() {

        try {

            //From the Update Button
            //A link with a querystring "update_cart_qty"
            //was seen holding the product Id from database Result
            //Therefore, Request type must be _GET or _REQUEST
            if(isset($_GET['update_cart_qty']) && !empty($_GET['update_cart_qty'])) {


                //This holds Your Product Id
                $pro_id = trim($_GET['update_cart_qty']);


                //Validate $pro_id
                //Remove this line if $pro_id contains letters
                if(!is_numeric($pro_id)) {
                    throw new Exception("Invalid Product Key");
                    
                }


                //Add product Id to session cart
                //Ensure it doesn't exists there already
                if(in_array($pro_id, $_SESSION['cart'])) {
                    throw new Exception("Item already addded");
                    
                }


                //Push $pro_id into cart
                array_push($_SESSION['cart'], $pro_id);

                
                //Redirect to cart.php
                header("location: cart.php");
            } else {

                //Throw exception
                //Since we can't work with empty Id
                throw new Exception("Product Key Not Found");
                
            }


        } catch (\Exception $th) {
            header("location: cart.php?error=" . $th->getMessage() . " key not found");
        }

    }

    function checkOut()
    {
        $_SESSION['message'] = 'You need to login to checkout';
	    header('location: view_cart.php');
    }
    
    function dog_food_products()
    {
        include("inc/db.php");

        $fetch_cat = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='1'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id = $row_cat['prod_id'];
        echo"<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro = $con->prepare("select * from product_tbl where cat_id='$cat_id' LIMIT 0,3");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro = $fetch_pro->fetch()):
            echo"
                <li>
                    <form method = 'post' enctype='multipart/form-data'>
                    <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                        <h4>".$row_pro['pro_name']."</h4>
                        <img src ='../uploads/products/".$row_pro['pro_img']."' />
                        <center>
                            <button id = 'pro_btn'>
                                <a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a>
                            </button>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button id = 'pro_btn' name = 'cart_btn'>
                            Cart
                            </button>
                            <button id = 'pro_btn'>
                                <a href = '#'>Wishlist</a>
                            </button>
                        </center>
                    </a>
                    </form>
                </li>
                ";
        endwhile;
    }

    function fish_food_products()
    {
        include("inc/db.php");

        $fetch_cat = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='4' LIMIT 0,3");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id = $row_cat['prod_id'];
        echo"<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro = $con->prepare("select * from product_tbl where cat_id='$cat_id'");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro = $fetch_pro->fetch()):
            echo"
                <li>
                    <form method = 'post' enctype='multipart/form-data'>
                    <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                        <h4>".$row_pro['pro_name']."</h4>
                        <img src ='/uploads/products/".$row_pro['pro_img']."' />
                        <center>
                            <button id = 'pro_btn'>
                                <a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a>
                            </button>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button id = 'pro_btn' name = 'cart_btn'>Cart
                            </button>
                            <button id = 'pro_btn'>
                                <a href = '#'>Wishlist</a>
                            </button>
                        </center>
                    </a>
                    </form>
                </li>
                ";
        endwhile;
    }

    function pro_details()
    {
        include("inc/db.php");

        if(isset($_GET['pro_id']))
        {
            $pro_id = $_GET['pro_id'];
            $pro_fetch=$con->prepare("SELECT * FROM product_tbl WHERE pro_id = '$pro_id'");
            $pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
            $pro_fetch->execute();

            $row_pro = $pro_fetch->fetch();
            $cat_id = $row_pro['cat_id'];
            echo 
                "<div id = 'pro_img'>
                    <img src ='../uploads/products/".$row_pro['pro_img']."'/>
                    <ul>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img2']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img3']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img4']."'/>
                        </li>
                    </ul>
                  </div>
                  <div id = 'pro_brand'>
                    <h3>".$row_pro['pro_name']."</h3>
                    <ul>
                        <li>
                            
                        </li>
                    </ul>
                    <ul>

                    </ul><br clear = 'all'>
                    <center>
                        <h4>Price: ".$row_pro['pro_price']."</h4>
                        <form method = 'POST'>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button name = 'buy_now' id = 'buy_now' style = color:#000>Buy Now</button>
                            <button name = 'cart_btn'>Add to Cart</button>
                        </form>
                    </center>
                </div><br clear = 'all'>    
                <div id = 'sim_pro'>
                    <h3>Related Products</h3>
                    <ul>";
                        echo add_cart();
                        $sim_pro = $con->prepare("SELECT * from product_tbl WHERE pro_id!=$pro_id AND cat_id='$cat_id' LIMIT 0,5");
                        $sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
                        $sim_pro->execute();

                        while($row=$sim_pro->fetch()):
                            echo "<li>
                                    <a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>
                                        <img src ='../uploads/products/".$row['pro_img']."'/>
                                        <p>Product Name: ".$row['pro_name']."</p>
                                        <p>Price: ".$row['pro_price']."</p>
                                    </a>
                                  </li>";
                        endwhile;
                    echo "</ul>";
                "</div>";
            ;            
        }
    }

    function all_cat() 
    {
        include("inc/db.php");
        $all_cat = $con->prepare("SELECT * FROM pet_prod");
        $all_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $all_cat->execute();

        while($row=$all_cat->fetch()):
            echo "<li>
                    <a href = 'cat_detail.php?cat_id=".$row['prod_id']."'>
                        ".$row['cat_name']."
                    </a>
                  </li>";
        endwhile;
    }

    function cat_detail()
    {
        include("inc/db.php");

        if(isset($_GET['cat_id']))
        {
            $cat_id = $_GET['cat_id'];
            $cat_pro = $con->prepare("SELECT * FROM product_tbl where cat_id = '$cat_id'");
            $cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $cat_pro->execute();
            
            $fetch_cat_name = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='$cat_id'");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
    
            $row_cat=$fetch_cat_name->fetch();
            $cat_id = $row_cat['prod_id'];
            echo"<h3>".$row_cat['cat_name']."</h3>";

            while($row_cat = $cat_pro->fetch()):
                echo"
                    <li>
                        <a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>
                            <h4>".$row_cat['pro_name']."</h4>
                            <img src ='../uploads/products/".$row_cat['pro_img']."' />
                            <center>
                                <button id = 'pro_btn'>
                                    <a href = 'pro_detail.php?pro_id=".$row_cat['pro_id']."'>View</a>
                                </button>
                                <button id = 'pro_btn'>
                                    <a href = '#'>Cart</a>
                                </button>
                                <button id = 'pro_btn'>
                                    <a href = '#'>Wishlist</a>
                                </button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    function search() {
        include("inc/db.php");

        if(isset($_GET['search']) && isset($_GET['user_query'])) {

            $user_query = $_GET['user_query'];
            $search = $con->prepare("SELECT * from product_tbl WHERE pro_name LIKE '%$user_query%' or pro_keyword LIKE '%$user_query%'");
            $search->setFetchMode(PDO:: FETCH_ASSOC);
            $search->execute();

            echo "<div id = 'bodyleft'><ul>";
            if($search->rowCount() == 0){
                echo "<h2>Product Not Found</h2>";
            }
            else
            {
                while($row=$search->fetch()):
                    echo"
                        <li>
                            <a href='pro_detail.php?pro_id=".$row['pro_id']."'>
                                <h4>".$row['pro_name']."</h4>
                                <img src ='./uploads/products/".$row['pro_img']."' />
                                <center>
                                    <button id = 'pro_btn'>
                                        <a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>View</a>
                                    </button>
                                    <button id = 'pro_btn' name = 'cart_btn'>
                                    Cart
                                    </button>
                                    <button id = 'pro_btn'>
                                        <a href = '#'>Wishlist</a>
                                    </button>
                                </center>
                            </a>
                        </li>
                        ";
                endwhile;
            }
            echo "</ul></div>";
        }
    }
?>

<script>

    var iprice = document.getElementByClassName('iprice');
    var iquantity = document.getElementByClassName('iquantity');
    var itotal = document.getElementByClassName('itotal');

    function subTotal()
    {
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        }
    }
    subTotal();

</script>
