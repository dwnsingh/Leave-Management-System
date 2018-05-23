
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if(isset($_SESSION['login_user'])){
  if($_SESSION['usertype']=="stud"){
    header("location: student.php");
  }
  else{
    header("location:admin.php");
  }
}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "please fill all the entries.";
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
        $_SESSION['login_user']=$username;
        $_SESSION['usertype'] = $row["type"]; // Initializing Session
        if ($row["type"]=="stud") {
          
          header("location: student.php");   
        }
        else {  
          
          header("location: admin.php");	
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
       <link href="css/signin.css" rel="stylesheet">
    <style type="text/css">
      .box{
        background-color: #f0f0f0;
        padding: 20px;
        margin: auto;
        width: 500px;
        border-radius: 5px;
      }
      input[type=text]{
        width: 100%;
        box-sizing: border-box;
        display: inline-block;
        padding: 20px 20px;
        margin:8px 0;
        border:1px solid #ccc;
        border-radius: 4px;
      }
       input[type=password]{
        width: 100%;
        box-sizing: border-box;
        display: inline-block;
        padding: 20px 20px;
        margin:8px 0;
        border:1px solid #ccc;
        border-radius: 4px;
      }

      input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        display: inline-block;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
       }
       input[type=submit]:hover{
        background-color:  #45a049;
       }

    </style>
  </head>
  <body >
    
    <div class="navbar navbar-static-top" style="background-color:gray;">
       
        <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
            <h2 style="color:white">Leave Management System</h2>
        </div>
    </div>
    <div class="container">
      <div class="col-lg-12" style="padding:100px 0 20px 0;">
      <center><h1 style="color:orange;font-size:50px;">Leave Management Portal</h1></center>
      </div>
    </div> 
    <div class="container">
    
      <form  class="box"  method="POST" action=" ">
        <h2 class="form-signin-heading">Sign in</h2>
        <label for="userid" >UserId:</label>
        <input type="text" name="username" id="userid" class="form-control" placeholder="user id" required autofocus>
        <label for="inputPassword" >Password:</label>
        <input type="password" name="password"id="inputPassword" class="form-control" placeholder="Password" required>
      
        <input type="submit" name="submit"></input>
<!--          <span><?php echo $error; ?></span>   -->
      </form>
     
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
