<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/db_connect.php');
//require("../db_connect.php");
session_start();
if(isset( $_SESSION["userID"])){

}else{
    header("Location: ../login.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../cssmenu/header.css">
    <script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.js"></script>
    <link rel="stylesheet" href="../cssmenu/styles.css">
    <script src="../cssmenu/script.js"></script>




</head>

    <body>



        <div  id='cssmenu'>
            <ul>
                <li style="margin-left:2%;margin-top: -0.6%"><h3 style="font-weight:bolder; color: #CFF;"><font face="time new roman">SALES AND DELIVERY</font></bold></h3></li>
                <li style="margin-left:18%"><a href='#'>Welcome <?php echo $_SESSION["userName"] ?></a></li>
                <li style="margin-left:2.6%"><a href='#'><bold> notification <span class="glyphicon glyphicon-bell" aria-hidden="true"></span></bold></a></li>
                <li ><a href='#'><?php echo date("D M j Y ,g:i a");?></a></li>
                <li class='active'"><a href='#'><span  class="glyphicon glyphicon-user" aria-hidden="true"></span> Account</a>
                    <ul>
                        <li><a href='update.php'>Edit Profile</a></li>
                        <li><a href='../logout.php'>Log Out</a></li>
                    </ul>
                </li>

            </ul>
        </div>



        <div id='cssbar' style="position: static">

            <ul>
                <li><a href='registration.php'><span>Register Users</span></a></li>
                <li><a href='registration.php'><span>Delete Users</span></a></li>
            </ul>
        </div>

    </body>
</html>