<?php
session_start(); // Starting Session
  
    $connection = mysqli_connect("localhost", "root", "","student");
    
    $key=$_SESSION['login_user'];
    $query = mysqli_query($connection,"SELECT * from student_leave where  id='$key'");
    $row = mysqli_fetch_assoc($query);
        $date=$row["date"];
        $days=$row["days"];
        $reason=$row["reason"];
        $status=$row["status"];
    $sql = mysqli_query($connection, "SELECT num_leave from student where  id='$key'");
    $rows = mysqli_fetch_assoc($sql);
        $num=$rows["num_leave"];

        
      
mysqli_close($connection); // Closing Connection
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
                  <li ><a href="student.php">Home</a></li>
                  <li ><a href="stud_submit.php">Submit leave</a></li>
                    <li class="active"><a href="stud_report.php">History</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
    </nav></div>
    <div class="container">
        <div class="col-lg-12 col-md-12" style="padding-bottom:30px;">
        <h1>Your Leave History </h1></div>
        <div class="row" style="padding-left:100px;" >
            <div class="col-lg-5 col-md-5">
                <div class="col-lg-12 col-md-12" style="color:orange;text-align:center;"><h3>Previous Leave Status</h3></div>
                <div class="col-lg-12 col-md-12" style="padding-left:20px;">
                 <h4>Leave from&nbsp;&nbsp; :&nbsp;&nbsp;<?php echo $date; ?></h4>
                 <h4>No of days&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;<?php echo $days; ?></h4>
                 <h4>Reason &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $reason; ?></h4>
                <h4>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php
                echo $status ;
                
                    
                ?></h4>
                    
                </div>
            </div>
            <div class="col-lg-5" >
                <div class="col-lg-12" style="color:orange;text-align:center;"><h3>No of Leaves Taken</h3></div>
                <div class="col-lg-12" style="color:orange;text-align:center;"><h1><?php echo $num; ?> </h1><br><br><br><br><br></div>
            </div>
        </div>
      
    </div>

      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">welcome dear on the Portal</p></center>
      </div>
    </footer>
 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
