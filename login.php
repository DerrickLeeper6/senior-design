<?php

setcookie("HOME","https://www.adlweddings.com/restricted/", time() + (86400 * 30), "/");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADL Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script src="js/login-script.js"></script>
    <link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

  <?php include "navbar.php"; ?>

  
  <!-- THIS SHOULD BE FINE TO DELETE AND GET RID OF -->
    <!-- <div class="modal" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Login to your Account</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="">

              <div class="form-group">
                <label for="loginEmail">Email address:</label>
                <input type="email" class="form-control" id="loginEmail">
                <h4 id="userEmailLoginError"></h4>
              </div>
              
              <div class="form-group">
                <label for="loginPwd">Password:</label>
                <input type="password" class="form-control" id="loginPwd">
                <h4 id="passWordLoginError"></h4>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="login_account">Login</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div> -->
  <!--END OF POTENTIAL JUNK -->

  
  <div class="container loginContainer">
    <div style ="-webkit-box-shadow: 0px 0px 7px 8px rgba(207,207,207,1); -moz-box-shadow: 0px 0px 7px 8px rgba(207,207,207,1); box-shadow: 0px 0px 7px 8px rgba(207,207,207,1); background-color:white;" class="col-lg-6 col-sm-12 .col-xs-12 row justify-content-center align-self-center">
      <h2 style ="text-align:center;">Login into your account</h2>
      <hr>
        <form action="">

          <div class="form-group">
            <label for="loginEmail">Email address:</label>
            <input type="email" class="form-control" id="loginEmail">
            <h4 id="userEmailLoginError"></h4>
          </div>
          
          <div class="form-group">
            <label for="loginPwd">Password:</label>
            <input type="password" class="form-control" id="loginPwd">
            <h4 id="passWordLoginError"></h4>
          </div>
        </form>    
        <hr/>
        <button type="button" class="btn btn-lg btn-primary btn-block text-uppercase" id="login_account">Login</button>  
        <br/>
        <!-- <form class="form-signin">
            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
            </div>
            
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
        </form> -->
      <br/>
    </div>
  </div>



</body>
</html>