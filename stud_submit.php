<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit_leave'])) {
    if (empty($_POST['date']) || empty($_POST['days']) || empty($_POST['reason'])) {
    $error = "INCOMPLETE form Please Fill the Details ";
    echo $error;
    }else{
    $date=$_POST['date'];
    $days=$_POST['days'];
    $reason=$_POST['reason'];
    $connection = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("student", $connection);
    $key=$_SESSION['login_user'];
    $query = mysql_query("UPDATE student_leave SET date='$date', days='$days', reason='$reason', status='Pending' where id='$key' ", $connection);
    //echo $key;
  // $sql=mysql_query(" UPDATE student_leave SET date='$date', days='$days', reason='$reason', status='p' where ", $connection);
   
}}
       
//mysql_close($connection); // Closing Connection
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                  <li class="active"><a href="stud_submit.php">Submit leave</a></li>
                    <li><a href="stud_report.php">History</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
    
    <div class="container"> 
        <div class="col-lg-12" style="padding-bottom:30px;">
        <h1>Submit Your Leave Here </h1></div>
            
        <div class="col-lg-6 col-lg-offset-2" style="padding-top:40px;">
            <form class="form-horizontal" role="form" method="post" action="">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
          <label for="date"> Leave Start From </label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Leave date" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <label for="date"> Number of Leaves</label>
            <input type="text" class="form-control" id="days" name="days" placeholder="Leaves" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="reason" placeholder="Reason"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit_leave" type="submit" value="Submit" class="submit">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <! Will be used to display an alert to the user>
        </div>
    </div>
</form>
        </div>
      </div>

   

      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">you are welcome here</p></center>
      </div>
    </footer>
 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>