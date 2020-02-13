<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RosePetals</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<link rel="stylesheet" type="text/css" href="css/invitations.css">
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
  <div class="flex_space_around">
    <div>
      <img id="joinUsPhoto" alt="Invitation" src="img/join-us.jpg">
    </div>
    <div class="card" id="yourGuestList">
      <div>
        <h2>Your Guest List</h2>
        <p><label>Total Invited:</label> 150</p>
        <p><label>Going:</label> 84</p>
        <p><label>Not Going:</label> 23</p>
        <p><label>No Response Yet:</label> 43</p>
        <div class="flex_space_around">
          <button id="guestListBtn" class="btn btn-primary">View Guest List</button>
        </div>
      </div>
    </div>
  </div>
  <div class="flex_space_around margin_all_sides">
    <div class="no_border_card">
      <div>
        <h2>Your guest list has never been so clear</h2>
        <h4>You're not a sheepdog.  Let us round up your guests for you.</h4>
        <p>As RSVP's flow in, your guest list is ever-changing.<br>
        With RosePetals, you don't have to wonder who's showing up to the party.<br>
        While your guests RSVP through our site,<br>
        You won't have to manually calculate how many people to expect.<br>
        All that is done right here, automatically,<br>
        so that you won't have to worry about a thing.<br>
        All you'll have to do is update your invite list,<br>
        and we'll take care of the rest.</p>
      </div>
    </div>
    <div class="basic_border_card">
      <div>
        <h2>Electronic Invitations</h2>
        <h4>Get the word out faster</h4>
        <p>Don't leave your wedding invitations solely in the hands of your mail carrier.<br>
        Ensure your loved ones will be getting an invitation as quickly as possible,<br>
        minimizing the risk of lost invitations<br>
        or invitations received after your guests already made other plans.<br>
        Send your guests an instant electronic invitation, via email,<br>
        as an addition to the invitation sent in the mail.<br>
        Make things easier for everyone,<br>
        starting with just the click of a button.
        </p>
        <button id="emailBtn" type="button" class="btn btn-primary">Send the Message</button>
      </div>
    </div>
  </div>
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
