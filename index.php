
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

      <form class="form-signin" method="POST" action="php/login.php">
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