<!--?php
require ('conn.php');
require ('font.php');
?-->
<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        * {
            font-family: Calibri;
        }

        body {
            margin: 0;
            font-size: 16px;
        }

        .login-form {
            padding: 20px;
            border: 1px solid #aaa;
            border-radius: 20px;
            width: 86%;
            max-width: 600px;
            margin: 40px auto;
            box-shadow: 3px 3px 10px #555;
        }

        .login-form img {
            border-radius: 14px;
            width: 150px;
            height: 100px;
            margin: 10px;
        }

        input {
            font-size: 16px;
            width: 90%;
            max-width: 300px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #aaa;
            margin: 10px 0;
        }

        button {
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            color: #fff;
            margin: 0 6px;
        }

        .btn-blue {
            background-color: #29f;
        }

        .btn-red {
            background-color: tomato;
        }

        a {
            text-decoration: none;
            color: #29f;
        }

        .container {
            padding: 0 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="login-form" action="logindb.php" method="POST">
            <!-- <legend><img src="icons/login.png"></legend> -->
            <!-- <p id="i"> -->
            <img src="icons/login.png"><br>
            <!-- Login -->
            Username: <br><input type="text" name="uname" placeholder="Enter username"><br><br>
            Password: <br><input type="password" name="pwd" placeholder="Enter password"><br><br>
            <!--   <p>Password-2:<input type="password" name="pwd" placeholder="Re-Enter password"><br> -->

            <button class="btn-blue" type="submit" name="login-btn">Login</button>
            <button class="btn-red" type="reset">Cancel</button> <br><br>
            Forgot your Password
            <a href="/*Rahul enter your forgot password link here*/">Reset here</a>
            <br><br>
            Don't have an Account
            <a href="/*put the link to signup*/">Signup here</a>

            <!-- </p> -->
        </form>
    </div>
</body>

</html>