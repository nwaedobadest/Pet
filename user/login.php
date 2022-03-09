<?php 
    include("inc/function.php");
    echo LogIn();
?>
<html>
    <head>
    <title>Login</title>
        <link rel = "stylesheet" href="css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id ="LoginForm">
            <h3>Login</h3>
                <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"; enctype = "multipart/form-data">
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
        <a href = "/Pet/admin/login.php">Click here to Log in as an Admin</a>
    </form>
    </div>
    </body>

    <style>

    </style>
    
</html>



