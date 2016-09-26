<?php session_start();
if(isset($_SESSION["userID"])){

}else{
    header("Location: ../UserManagement/login.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="_css/form1.css" type="text/css"/>

    <body>

<a href="/registration.php">register</a>
<a href="/update.php">Update</a>





    </body>
</html>