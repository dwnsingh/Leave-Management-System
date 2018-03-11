<?php
session_start();    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
//echo $_SESSION['login_user'];
$key=$_SESSION['login_user'];
//echo $key;
mysql_select_db("student", $conn);
$sql = mysql_query("select * from student_leave where status='Pending' ", $conn);
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
                  <li ><a href="faculty.php">Home</a></li>
                  <li class="active"><a href="faculty_man_leave.php">Manage leave</a></li>
                  <li><a href="faculty_man_stud.php">Manage students</a></li>
                    <li><a href="faculty_report.php">Details</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
      <div class="container">
          <div class="col-lg-12" style="padding-bottom:30px;">
          <h1>Manage Leave</h1>
        </div>
          <div class="col-lg-12">
              <table class="table">
              <tr style="font-weight: bold;">
                  <td>User Id</td>
                  <td>Name</td>
                  <td>Date</td>
                  <td>Days</td>
                  <td>Reason</td>
                  <td>Status</td>
                  </tr>
                  <?php

                    $i=1;
                  $count=mysql_num_rows($sql);
                  //$data=;
                if ($count>0){
                    while($row = mysql_fetch_assoc($sql)){
                    ?>
                  <tr >
                  <td><?php echo $row["id"];
                
                    //$_SESSION[$data[$i]]=$row["id"];
                    $i=$i+1;     
                ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["date"]; ?></td>
                  <td><?php echo $row["days"]; ?></td>
                  <td><?php echo $row["reason"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>

                  
                  </tr>
                  
                    <?php 
                    }
                }
                  ?>
                  
                
              </table>
              <div class="panel panel-default">
  <div class="panel-body" >
  <form action="" method="POST">
   <input type="text" name="user_id" id="userid"  placeholder="user id" required autofocus>&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" name="comments" id="comments"  placeholder="comments" required autofocus>&nbsp;&nbsp;&nbsp;
 <label><input type="radio" name="app" value="app">&nbsp;&nbsp;&nbsp;Approve</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="app" value="rej">&nbsp;&nbsp;&nbsp;Reject</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="submit" type="submit" name="submit">Go</button>
</form>
  </div>
</div>
          </div>
        
      </div>
   
    
      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">Welcome to the Page</p></center>
      </div>
      </footer>
      
<?php
//session_start(); // Starting Session
//session_start();    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
//echo "haiiii";
// Create connection
$conn = mysql_connect($servername, $username, $password);
if (isset($_POST['submit'])){
if (empty($_POST['user_id']) || empty($_POST['comments']) || empty($_POST['app'])) {     
header("location: ../faculty_man_leave.php");
}else{
    $app_id=$_POST['user_id'];
    $comment=$_POST['comments'];
    $app=$_POST['app'];
    $rej=$_POST['rej'];
 mysql_select_db("student", $conn);
if($app=='app'){
mysql_query("UPDATE student_leave SET status='Approved',comments='$comments' WHERE id='$app_id'", $conn);
mysql_query("UPDATE student SET num_leave=num_leave+1 where id='$app_id'", $conn);
header("location: ./faculty_man_leave.php");
}else if($app=='rej') {
mysql_query("UPDATE student_leave SET status='Rejected',comments='$comments' WHERE id='$app_id'", $conn);
header("location: ./faculty_man_leave.php");
}
}
}
?>

 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>