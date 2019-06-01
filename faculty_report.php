<?php
session_start();    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

$key=$_SESSION['login_user'];


$sql = mysqli_query($conn,"SELECT * from student where type='stud';");
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
            <h2 style="color:white">Details of all Students</h2>
        </div>
    </div>
      <div class="col-lg-12" style="text-align:right;">      
      <nav>
                <ul class="nav masthead-nav">
                  <li ><a href="faculty.php">Home</a></li>
                  <li ><a href="faculty_man_leave.php">Manage leave</a></li>
                  <li ><a href="faculty_man_stud.php">Manage students</a></li>
                    <li class="active"><a href="faculty_report.php">Details</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
      <div class="container">
          <div class="col-lg-12" style="padding-bottom:30px;">
          <h1>All Students</h1>
        </div>
          <div class="col-lg-12">
              <table class="table">
              <tr style="font-weight: bold;">
                  <td>User Id</td>
                  <td>Name</td>
                  <td>Mobile No</td>
                  <td>Parents NO</td>
                  <td>Email</td>
                  <td>Leaves</td>
                  </tr>
                  <?php
                  $count=mysqli_num_rows($sql);
                if ($count>0){
                    while($row = mysqli_fetch_assoc($sql)){
                    ?>
                  <tr >
                  <td><?php echo $row["id"];  ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["mob_no"]; ?></td>
                  <td><?php echo $row["p_mob_no"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["num_leave"]; ?></td>

                  
                  </tr>
                  
                    <?php 
                    }
                }
                  ?>
                  
                
              </table>

          </div>
        
      </div>
   
    
      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">all student details are here</p></center>
      </div>
      </footer>
      
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
