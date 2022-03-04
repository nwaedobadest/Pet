<?php 
    include("inc/function.php");
    echo LogIn();
?>

<div id ="LoginForm">
    <h3>Login</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <td>Enter Username: </td>
                <td><input type="text" name = "user_username" /></td>
            </tr>
            <tr>
                <td>Enter Password: </td>
                <td><input type="password" name = "user_password" /></td>
            </tr>
        </table>
        <button name = "login_user" id = "login_user">Log In</button>
    </form>
</div>


