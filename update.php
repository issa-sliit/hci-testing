<?php
require('menu.php');


$userID=  $_SESSION["UID"];



//echo $_SESSION["UID"];


$update_query="select * from users where UId='$userID'";
$result_update=mysqli_query($conn,$update_query);
$row=mysqli_fetch_assoc($result_update);

$passh=$row['password'];

$pass=password_needs_rehash($passh,PASSWORD_BCRYPT,array(null));

$_SESSION['userID']=$row['userID'];
$_SESSION["FirstName"]=$row['fname'];
$_SESSION["LastName"]=$row['lname'];
$_SESSION["email"]=$row['email'];

//$_SESSION["Password"]=$row['password'];

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
    <script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>

<body>

<div style="width: 36%; margin-top:4%;margin-left:35%;margin-bottom: auto">
<h2><font color="#0000cd">Update User Details</font></h2>
<hr>
<p>Please Fil All The Information Below. All Fields Are Required To Be Filled ! </p>
<br>
</div>
<div style="width: 42%;margin-left: 28%">
    <form class="form-horizontal" name="update_form" method="POST" action="" >

        <div class="form-group">
            <label for="userName" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Name" name="updateFname" value="<?php echo $_SESSION['FirstName'] ?>" >
            </div>
        </div>

        <div class="form-group">
            <label for="userName" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Name" name="updateLname" value="<?php echo $_SESSION['LastName'] ?>" >
            </div>
        </div>

        <div class="form-group">
            <label for="userID" class="col-sm-2 control-label">User ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="UserID" name="updateUserID" value="<?php echo $_SESSION['userID'] ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control"  placeholder="Email" name="updateEmail" value="<?php echo $_SESSION["email"]?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="updatePassword">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="Update" name="update">
            </div>
        </div>
    </form>
</div>


<?php

if(isset($_POST['update']))
{


    $UpdateFname=$_POST["updateFname"];
    $UpdateLname=$_POST["updateLname"];
    $UpdateUserID=$_POST["updateUserID"];
    $UpdateEmail=$_POST["updateEmail"];
    $UpdatePassword=$_POST["updatePassword"];

    if($UpdatePassword==null)
    {
        $sql1 = "update users set fname='$UpdateFname',lname='$UpdateLname',userID='$UpdateUserID',email='$UpdateEmail' where UId='$userID'";
    }else{
        $storePassword=password_hash($UpdatePassword,PASSWORD_BCRYPT,array('cost'=>10));
        $sql1 = "update users set fname='$UpdateFname',lname='$UpdateLname',userID='$UpdateUserID',password='$storePassword',email='$UpdateEmail' where UId='$userID'";
    }





    if (mysqli_query($conn, $sql1)) {
       echo" <script> location.replace('../UserManagement/update.php'); </script>";
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }

}

?>

<?php ?>
</body>
</html>

