<div id = "navbar">
            <ul>
                <li>
                    <a href = "#">CATEGORIES</a>
                    <ul>
                        <?php echo all_cat(); ?>
                    </ul>
                </li>
            </ul>
            <div id = 'link'>
        <ul>
            <?php
                if(isset($_SESSION['user_username']))
                {
                    // echo "<li>".$_SESSION['user_username']."</li>";
                    echo "
                            <a>".$_SESSION['user_username']."</a>
                            <a href = 'myProfile.php?username=".$_SESSION['user_username']."'>My Profile<a/>
                            <a href = 'logout.php'>Log Out</a>
                         ";
                }
                else
                {
                    echo "<a href = 'login.php'>Log In</a>";
                    echo "<a href = 'signup.php'>Sign Up</a>";
                    echo "<a href = 'Donate'>Donate</a>";
                }
            ?>
        </ul>
    </div>
        </div><!-- <End of Navbar> -->