<?php
session_start();    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
//echo "haiiii";
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
$sql = mysql_query("select * from student where id='$key' ", $conn);
if(mysql_num_rows($sql) > 0){
    while($row = mysql_fetch_assoc($sql)){
        $name=$row["name"];
        $img=$row["image"];
        $id=$row["id"];
        $phone=$row["mob_no"];
        $email=$row["email"];
    }
    
}else{
echo "no matched";
}


mysql_close($conn);
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
                  <li class="active"><a href="student.php">Home</a></li>
                  <li ><a href="stud_submit.php">Submit leave</a></li>
                    <li><a href="stud_report.php">History</a></li>
                     <li><a href="php/logout.php">Sign out</a></li>
                </ul>
          </nav></div>
      
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom:30px;">
          <h1>My Profile</h1>
        </div>
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-4" style="padding:0 0 0 200px;">
                    <img src="<?php echo $img; ?>"  class="img-thumbnail" height="300px" width="200px;">
                </div>
                <div class="col-lg-6 col-md-5 col-sm-6" style="border-left:thin solid #333;margin-left:50px;padding-left:40px;">
                    <h4>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $name;        ?></h4><br>
                     <h4>USER ID&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $id;        ?></h4><br>
                     <h4>EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $email;        ?></h4><br>
                     <h4>MOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $phone;        ?></h4><br>
                    
                </div>
        </div>
        
    </div>

   

      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">hello student ! You are Welcome Here</p></center>
      </div>
    </footer>
 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>