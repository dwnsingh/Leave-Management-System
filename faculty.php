<?php
session_start();    


require 'php/connect.php';

$key=$_SESSION['login_user'];


$sql="SELECT `id`,`name`,`image`,`email` FROM `admin` WHERE `id`='$key'";
      $query=mysqli_query($conn,$sql);
      if($query){
        $rows=mysqli_num_rows($query);
        //echo $rows;
        if($rows==1){

            $row = mysqli_fetch_assoc($query);
             $name=$row["name"];
            $img=$row["image"];
            $id=$row["id"];
           // $phone=$row["mob_no"];
            $email=$row["email"];
        }
        else{
          echo "<script type ='text/javascript'> 
          alert('inavalid user name or password ')</script>";
        }
      }
      else{
        die("error in query ".mysqli_error($conn));
      }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
                  <li class="active"><a href="faculty.php">Home</a></li>
                  <li ><a href="faculty_man_leave.php">Manage leave</a></li>
                  <li><a href="faculty_man_stud.php">Manage students</a></li>
                    <li><a href="faculty_report.php">Details</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
      
      <div class="container">
        <div class="col-lg-12" style="padding-bottom:30px;">
          <h1>My Profile</h1>
        </div>
        <div class="row">
                <div class="col-lg-4 col-md-6" style="padding:0 0 0 200px;">
                    <img src="img/default.png" class="img-thumbnail" height="300px" width="200px;">
                </div>
                <div class="col-lg-6 col-md-5" style="border-left:thin solid #333;margin-left:50px;padding-left:40px;">
                    <h4>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $name;        ?></h4><br>
                     <h4>USER ID&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $id;        ?></h4><br>
                     <h4>EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $email;        ?></h4><br>
                     
                    
                </div>
        </div>
        
    </div>
    
      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">Welcome Rajesh on LMS Portal</p></center>
      </div>
    </footer>
 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
