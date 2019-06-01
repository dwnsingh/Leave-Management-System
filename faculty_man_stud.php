<?php
session_start(); // Starting Session    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if (isset($_POST['add'])){
    if (empty($_POST['a_user_id']) || empty($_POST['a_name']) || empty($_POST['a_pass'])){
    }else{
    $aid=$_POST['a_user_id'];
    $aname=$_POST['a_name'];
    $pno=$_POST['a_p_no'];
    $phone=$_POST['a_phone'];
    $aemail=$_POST['a_email'];
    $apass=$_POST['a_pass'];
    mysqli_query($conn,"INSERT into student_leave values('$aid','','','','','$aname','');");
    mysqli_query($conn,"INSERT into student values('$aname','$aid','0','$phone','$pno','$aemail','$apass','img/default.png','stud');");
    mysqli_query( $conn,"INSERT into login_table values('$aid','$apass','stud');");
    }

}

if (isset($_POST['delete'])){
    if (empty($_POST['d_user_id'])){
    }else{    
    $did=$_POST['d_user_id'];    
    mysqli_query($conn,"DELETE from student where id='$did';");
    mysqli_query( $conn,"DELETE from student_leave where id='$did';");
    mysqli_query( $conn,"DELETE from login_table where user_id='$did';");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Leave Management Portal</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
       <link href="css/signin.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">

  </head>
  <body  >
      
    <div class="navbar navbar-static-top" style="background-color:gray;">
      
        <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
            <h2 style="color:white">Leave Management System</h2>
        </div>
    </div>
      <div class="col-lg-12" style="text-align:right;">      
      <nav>
                <ul class="nav masthead-nav">
                  <li ><a href="faculty.php">Home</a></li>
                  <li ><a href="faculty_man_leave.php">Manage leave</a></li>
                  <li class="active"><a href="faculty_man_stud.php">Manage students</a></li>
                    <li><a href="faculty_report.php">Details</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
      <div class="container">
      <div class="col-lg-12" style="padding-bottom:30px;">
          <h1>Add/Remove Students</h1>
      </div>
      <div class="row">
         <div class="col-lg-12">
             <div class="col-lg-12" style="color:red;" >
          <h3>Add New Student</h3>
      </div>
                <div class="panel panel-default">
              <div class="panel-body" >
              <form action="" method="POST">
               <input type="text" name="a_user_id" id="userid" style="padding: 4px"; placeholder="user id"  required autofocus>&nbsp;&nbsp;
               <input type="text" name="a_name" id="comments" style="padding: 4px"; placeholder="Name" required autofocus>&nbsp;&nbsp;
                 <input type="text" name="a_phone" id="comments" style="padding: 4px"; placeholder="Phone" required autofocus>&nbsp;&nbsp;
                   <input type="text" name="a_p_no" id="comments" style="padding: 4px"; placeholder="Parents No" required autofocus>&nbsp;&nbsp;
                   <input type="text" name="a_email" id="comments" style="padding: 4px"; placeholder="email" required autofocus>&nbsp;&nbsp;
                  <input type="text" name="a_pass" id="a_pass" style="padding: 4px"; placeholder="password" required autofocus>&nbsp;&nbsp;
           
              <button class="submit" type="submit" style="padding: 4px"; name="add">Add</button>
            </form>
              </div>
            </div>
          </div> 
          
          <div class="col-lg-12" style="padding-top:10px;">
                     <div class="col-lg-12" style="color:red;" >
          <h3>Remove Student</h3>
      </div>
              <div class="panel panel-default">
              <div class="panel-body" >
              <form action="" method="POST">
               <input type="text" name="d_user_id" id="userid" style="padding: 4px"; placeholder="user id" required autofocus>&nbsp;&nbsp;
              <button class="submit" type="submit" style="padding: 4px"; name="delete">Delete</button>
            </form>
              </div>
            </div>
          </div> 
          
    </div>
          
    </div>
  
 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
