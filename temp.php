    <div class="container">
          <div class="col-lg-12" style="padding-bottom:30px;">
          <h1>Manage Student</h1>
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
                  $count=mysql_num_rows($sql);
                if ($count>0){
                    while($row = mysql_fetch_assoc($sql)){
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
              <div class="panel panel-default">
  <div class="panel-body" >
  <form action="" method="POST">
   <input type="text" name="user_id" id="userid"  placeholder="user id" required autofocus>&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" name="comments" id="comments"  placeholder="comments" required autofocus>&nbsp;&nbsp;&nbsp;
 <label><input type="radio" name="app" value="app">&nbsp;&nbsp;&nbsp;Approve</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="app" value="rej">&nbsp;&nbsp;&nbsp;Reject</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-warning" type="submit" name="submit">Go</button>
</form>
  </div>
</div>
          </div>
        
      </div>
   
    
      <footer class="footer">
      <div class="container-fluid">
          <center><p class="text-muted" style="color:white;">all rights @ 2015</p></center>
      </div>
      </footer>
      
<?php
session_start(); // Starting Session
session_start();    
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
   // mysql_select_db("student", $conn);
if($app=='app'){
mysql_query("UPDATE student_leave SET status='Approved',comments='$comments' WHERE id='$app_id'", $conn);
mysql_query("UPDATE student SET num_leave=num_leave+1 where id='$app_id'", $conn);        
header("location: ../faculty_man_leave.php");
}else if($app=='rej') {
mysql_query("UPDATE student_leave SET status='Rejected',comments='$comments' WHERE id='$app_id'", $conn);
header("location: ../faculty_man_leave.php");
}
}
}
?>






-----------------------
if (empty($_POST['user_id']) || empty($_POST['comments']) || empty($_POST['app'])) {     
header("location: ../faculty_man_leave.php");
}else{
    $app_id=$_POST['user_id'];
    $comment=$_POST['comments'];
    $app=$_POST['app'];
    $rej=$_POST['rej'];
   // mysql_select_db("student", $conn);
if($app=='app'){
mysql_query("UPDATE student_leave SET status='Approved',comments='$comments' WHERE id='$app_id'", $conn);
mysql_query("UPDATE student SET num_leave=num_leave+1 where id='$app_id'", $conn);        
header("location: ../faculty_man_leave.php");
}else if($app=='rej') {
mysql_query("UPDATE student_leave SET status='Rejected',comments='$comments' WHERE id='$app_id'", $conn);
header("location: ../faculty_man_leave.php");
}
}