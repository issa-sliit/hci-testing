<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
    <title>Awesome Login Form Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login.css" type="text/css"/>
</head>

<?php
require('../db_connect.php');

if(isset($_POST['login'])) {
    $userID = $_POST['userID'];
    $password = $_POST['password'];


    $login = "SELECT * FROM users where userID='$userID'";
    $result = mysqli_query($conn, $login);


    $row = mysqli_fetch_assoc($result);
    $pass=$row['password'];


    if(password_verify($password,$pass))
    {
        session_start();
        $_SESSION["userID"] = $row['userID'];
        $_SESSION["UID"] = $row['UId'];
        $_SESSION["userName"]=$row['fname'];
        $_SESSION["role"]=$row['role'];

        header("Location: menu.php");
    }
    else
    {
        session_start();
        $_SESSION["error"] = "Yes";
    }
}

?>



<body>
<div class="form">
    <div class="header"><h2> Sign In <sub><small> Supplier </small></sub></h2></div>
    <div class="login">
        <form name="login" method="POST" action="">
            <ul>
                <li>
                    <span class="un"><i class="fa fa-user"></i></span><input type="text" required class="text" placeholder="User Name Or Email" name="userID"/></li>
                <li>
                    <span class="un"><i class="fa fa-lock"></i></span><input type="password" required class="text" placeholder="User Password" name="password"/></li>
                <li>
                    <input type="submit" value="LOGIN" class="btn" name="login">
                </li>
                <li>
                    <div class="span"><span class="ch"><input type="checkbox" id="r"> <label for="r">Remember Me</label> </span> <span class="ch"><a href="#">Forgot Password?</a></span></div>
                </li>
            </ul>
            <?php if(isset($_SESSION["error"])) {?>
                <p style="color: red">Invalid login ! Please Try again</p>
            <?php } ?>
        </form>
    </div><br/>
    <div class="sign">
        <div class="need">Are You a Staff Memeber ?</div>
        <div class="up"><a href="../login.php">Login Here</a></div>
    </div>
</div>



</body>
</html>