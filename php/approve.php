<?php
session_start(); // Starting Session
if (isset($_POST['submit'])){
if (empty($_POST['user_id']) || empty($_POST['comments']) || empty($_POST['app'])) {
//echo "haiii .......................";
//header("location: ../admin_man_leave.php");
}else{

header("location: ../admin_man_leave.php");
    echo "you are the man";


}
}


?>
