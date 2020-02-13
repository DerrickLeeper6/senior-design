<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RosePetals</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
</head>
<body>
<header>
  <a id="top"></a>
  <?php include "navbar.php"; ?>
</header>
<section class="main">

</section>
<div class="modal" id="signUpModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create an Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="/action_page.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd">
          </div>
          <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm_pwd">
          </div>
          <button type="button" class="btn btn-primary" id="create_account">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="backtotop_container">
    <a class="backtotop" href="#top"><button type="button" class="btn">Back to Top</button></a>
  </div>
</footer>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
