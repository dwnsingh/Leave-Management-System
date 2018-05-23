<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
      // Define $username and $password
      $username=$_POST['username'];
      $password=$_POST['password'];
      $password_hash=md5($password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter//
      $connection = mysql_connect("localhost", "root", "");
   // echo $connection;
// To protect MySQL injection for Security purpose
      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysql_real_escape_string($username);
      $password = mysql_real_escape_string($password);
// Selecting Database
      $db = mysql_select_db("student", $connection);
// SQL query to fetch information of registerd users and finds user match.
      $query = mysql_query("select * from login_table where password='$password' AND user_id='$username'", $connection);
      $rows = mysql_num_rows($query);
      $row = mysql_fetch_assoc($query);
      if ($rows == 1) {
        $_SESSION['login_user']=$username; // Initializing Session
        if ($row["type"]=="stud") {
          header("location: ../student.php");
        }
        else {
          header("location: ../admin.php");	
        }
      } 
      else {
	       echo "<script type='text/javascript'>
          alert('Username or Password is invalid')</script>";
  
      }
    mysql_close($connection); // Closing Connection
    } 
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Leave Management Portal</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
       <link href="css/signin.css" rel="stylesheet">

  </head>
  <body >
    
    <div class="navbar navbar-static-top" style="background-color:gray;">
       
        <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
            <h2 style="color:white">Leave Management System</h2>
        </div>
      </div>
      <div class="col-lg-12" style="padding-top:150px;"><center><h1 style="color:orange;font-size:50px;">Leave Management Portal</h1></center</div>
          
    <div class="container">

      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Sign in</h2>
        <label for="userid" class="sr-only">user id</label>
        <input type="text" name="username" id="userid" class="form-control" placeholder="user id" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password"id="inputPassword" class="form-control" placeholder="Password" required>
      
        <button class="submit" type="submit" name="submit">Sign in</button>
<!--          <span><?php echo $error; ?></span>   -->
      </form>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>