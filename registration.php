<?php

require('menu.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../cssmenu/header.css">
    <!--<script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!--must include-->
    <script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>

    <body>



<div style="margin-left: 34%;width: 35%;margin-top:3%">
<h2><font color="#0000cd">Register Users</font></h2>
<hr>
<p>Please Fil All The Information Below. All Fields Are Required To Be Filled ! </p>
<br>
    </div>

<div style="width: 40%;margin-left: 28%">

    <form class="form-horizontal" name="registration" method="POST" action="" >

    <div class="form-group">
        <label for="userName" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="Name" name="name">
        </div>
    </div>
    <div class="form-group">
        <label for="userID" class="col-sm-2 control-label">User ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="UserID" name="userID">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control"  placeholder="Email" name="email">
        </div>
    </div>

    <div class="form-group">
        <label for="role" class="col-sm-2 control-label">Role</label>

        <div class="col-sm-10">
            <input type="text" list="roles" class="form-control"  placeholder="Role" name="role" >
            <datalist id="roles">
                <option value="Sales And Delivery">
                <option value="Stock Management">
                <option value="Sales And Delivery">
                <option value="Stock Management">

            </datalist>
        </div>
    </div>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="Register" name="register">
        </div>
    </div>
</form>
</div>

<?php

require("../db_connect.php");


if(isset($_POST['register']))
{

    // $group = $_POST["group"];
    $name=$_POST["name"];
    $userID=$_POST["userID"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $role=$_POST["role"];
    $storePassword=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));


    $sql1 = "INSERT INTO users (fname,userID,role,email,password) values ('$name','$userID','$role','$email','$storePassword')";

    if (mysqli_query($conn, $sql1)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}

?>


    </body>
</html>

