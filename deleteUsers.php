<?php require('menu.php');?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../_css/table.css" type="text/css"/>
    <link rel="stylesheet" href="../_css/myStyle.css" type="text/css"/>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../DataTables/media/css/smoothness.css" type="text/css"/>
    <!--<script type="text/javascript" src="../DataTables/media/js/jquery.js "></script>
    <!-- jQuery -->
    <!--<script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../DataTables/media/js/jquery.dataTables.js"></script>

    <style type="text/css">


        @import "../DataTables/media/css/dataTables.jqueryui.css";
        @import "../DataTables/media/css/jquery.dataTables_themeroller.css";

    </style>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#datatable').DataTable({
                "sPaginationType":"full_numbers",
                "bJQueryUI":true
            });
        });

    </script>

</head>
<body>
<?php //require("../db_connect.php")?>
<?php //require('../UserManagement/menu.php');?>

<div id="margin" style="width:67%;margin-left: 17%">
    <h1><font color="#0000cd">Delete Users</font></h1>
    <hr>
    <p>Please use the table below to navigate or filter the results</p>
    <br>


    <?php

    echo "<table id='datatable' class='display'>
                    <thead>
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td> Role</td>
                            <td>Email</td>
                            <td>Delete</td>

                        </tr>
                    </thead>";

    $sql = "SELECT * FROM users ";
    $result = mysqli_query($conn, $sql);

    echo "<tbody>";
    while($row = mysqli_fetch_array($result))
    {
        echo '<tr>
                            <td>'.$row["fname"].'</td>
                            <td>'.$row["lname"].'</td>
                            <td>'.$row["role"].'</td>
                            <td>'.$row["email"].'</td>

                            <td><a class="btn btn-danger" href="deleteUsers.php?id='.$row['UId'].'" role="button">Delete</a>

             </tr>';?>

    <?php } //"invoice.php?id='.$row['sales_referenceNo'].'"
                  echo"  </tbody>
                    </table>"; ?>


    <?php
             if(isset($_GET['id'])) {
                 $id = $_GET['id'];
                 $sql = "DELETE FROM users WHERE UId='$id'";
                 $result = mysqli_query($conn, $sql);
                 header("Location: ../UserManagement/deleteUsers.php");
             }
    ?>




</div>
</div>
</body>
</html>