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
            <div class="container">
                <div class="inside">
                    <div class="logoSide">
                    <img src="../uploads/logo2.png" class="logo"> <p class="petsociety">Pet Society</p>
                    </div>
              
                <h3>Welcome to Pet Society</h3>
                <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"; enctype = "multipart/form-data">
                 
                       
                        <input type="text" name = "user_username" placeholder = "Username"/>               
                        <input type="password" name = "user_password"  placeholder = "Password"/></br>

                            <button name = "login_user" id = "login_user" >LOGIN</button></br>
                     <a href = "/Pet/admin/login.php">Log in as an Admin?</a>
                    </form>
                </div>
           
            </div>
           
    </div>
    </body>

    <style>
        *{
            font-family: "Varela Round", sans-serif;
            color: #5a5bf3;
            
        }
        #LoginForm{
            display: flex;
            justify-content: center;
            width: 100vw;
            
            
            
        }
        .container{
            display: flex;
            justify-content: center;
            border-radius: 5px;
            margin-top: 5vh;
            margin-left: 15%;
            margin-right: 15%;
            background: white;
            width: 60%;
            height: 70vh;
            box-shadow:4px 6px 16px 0px rgba(0, 0, 0, 0.2);
        }
        .inside{
            height: 100%;
            width: 50%;
            padding-top: 20px; 
        }
        input{
           width: 100%;
           height: 56px;
           border-radius: 10px;
           padding: 10px;
           text-align: left;
           outline: none;
           border: .5px solid #444;
           margin-top: 15px;
    
        }
        button{
            width: 100%;
            height: 56px;
            border-radius: 25px;
            margin-top: 10px;
            outline: none;
            border: none;
            color: #888;
        }
        .logo{
            width: 25px;
             height: 25px;
        }
       .logoSide{
        display: inline-flex;
        border-bottom: .9px solid black;
        padding-bottom: 10px;
        margin-bottom: 20px;
       }
       .petsociety{
           margin-left: 10px;
           color: #444;
       }
    </style>
    
</html>



