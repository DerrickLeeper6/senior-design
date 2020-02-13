<?php
session_start();
$_SESSION["CURRENT_PAGE"] = "/";
setcookie("HOME","https://www.adlweddings.com/restricted/", time() + (86400 * 30), "/");

if (isset( $_SESSION['userEmail'] ) ) {
  preg_match('/.+?(?=@)/', $_SESSION['userEmail'] , $matches);
  $_SESSION['userName'] = $matches[0];
} else {
  header("location: ../login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADL Wedding Planning Users only</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" type="text/css" href="css/navbar-header.css">
  <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
  <script src="jquery.ui.touch-punch.min.js"></script>
</head>
<body>
  <?php include "navbar.php"; ?>
  <div class="panel-body">

    <div id = 'weddingOptions'>
      <br/>
      <div id="loadWeddings">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newWeddingModal">New Wedding</button>
        <br/><br/>
        <select name = "wedding" id = "wedding" class = 'selectPicker'>
          <option value=""></option>
        </select>
      </div>
    </div>
    <br/>
    <hr/>


    <div class="tab-content">
      <div class="tab-pane fade in active" id="tab1default">Home</div>

      <div class="tab-pane fade in active" id="dashboard">Dashboard</div>
      <div class="tab-pane fade" id="invitations">Invitations</div>
      <div class="tab-pane fade" id="tasks"></div>
      <div class="tab-pane fade" id="costs"></div>
    </div>
  </div>

  <div class="modal" id="newWeddingModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Wedding</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action=''>
            <div class="form-group">
              <label for="groomFirstName">Groom's first name:</label>
              <input type="text" class="form-control" id="groomFirstName">
            </div>
            <div class="form-group">
              <label for="groomLastName">Groom's last name:</label>
              <input type="text" class="form-control" id="groomLastName">
            </div>
            <div class="form-group">
              <label for="brideFirstName">Bride's first name:</label>
              <input type="text" class="form-control" id="brideFirstName">
            </div>
            <div class="form-group">
              <label for="brideLastName">Bride's last name:</label>
              <input type="text" class="form-control" id="brideLastName">
            </div>
            <div class="form-group">
              <label for="date">Date of event:</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="form-group">
              <label for="budgetWedding">Total Budget:</label>
              <input type="text" class="form-control" id="budgetWedding"/>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="createWedding($('#groomFirstName').val(), $('#groomLastName').val(), $('#brideFirstName').val(), $('#brideLastName').val(), $('#date').val(), $('#budgetWedding').val() );">Create Wedding</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>



  <script>
    $(document).ready(function () {
      getWeddings();


      $("#wedding").on("change",function(){
        console.log("Wedding changed");
        var $this = $(this);

        var weddingID = $this.val();
        if (weddingID != '') {
          getTasks(weddingID);
          getBudget(weddingID);
          percentComplete();
          getGuestInformation(weddingID);
        }
        //setSessionWeddingID(weddingID);
      })

    })

/*  function setSessionWeddingID(weddingID)
  {
    $.post("queries/setWeddingSession.php", {wedding: weddingID}, function(data, status){
      console.log("wedding session initiated.");
    });
  }*/
  function buildThePage() {
      $.get("parts/tasks.php", "", function (data) { $("#tasks").html(data); })
      $.get("parts/costs.php", "", function (data) { $("#costs").html(data); })
      $.get("parts/dashboard.php", "", function(data){$('#dashboard').html(data);});
      $.get("parts/invitations.php", "", function(data){$('#invitations').html(data);});
  }

  function createWedding(groomFirstName, groomLastName, brideFirstName, brideLastName, date, budget)
{
  $.post("../php/createWedding.php", {groomFirstName: groomFirstName, groomLastName: groomLastName, brideFirstName: brideFirstName, brideLastName: brideLastName, date: date, budget: budget}, function(data, status){
    alert("Wedding created.");
    $("#newWeddingModal").modal("hide");
    getWeddings();
  });
}

function getWeddings() {
  $("#wedding").empty();
  $.ajax({
    url: 'queries/getWeddings.php',
    type: "POST",
    success: function (result) {
      $("#wedding").append("<option value = ''></option>");
      // console.log(result);
      for (var i = 0; i < result.length; i++) {
      // console.log(result[i]);
      // $('#wedding').append('<option value="1">One</option>');
      $("#wedding").append("<option value = '" + result[i].rowseq + "'> " + result[i].brideFirstName + " " + result[i].brideLastName + ", " + result[i].groomFirstName + " " + result[i].groomLastName + "</option>")



      }
      buildThePage();
    },
    error: function (err, e) {
      console.error(err.responseText);
    }
  })
}

function getGuestInformation(weddingID) {
  $('#emailTable tbody').empty();
  $.get("https://www.adlweddings.com/restricted/queries/dashboard/getGuests.php", {weddingID: weddingID}, function(data, status){
      var unanswered = 0, coming = 0, notComing = 0;
      for(var i =  0; i < data.length; i++) {
        // console.log(data[i]);
        if(data[i].attending == 'unanswered') {
          unanswered++;
        } else if(data[i].attending == 'going') {
          coming++;
        } else if(data[i].attending = 'notGoing') {
          notComing++;
        }
        // $('#guests').append("<tr><td>" + data[i].firstName + "</td><td>" + data[i].lastName + "</td><td>" + data[i].attending + "</td><td><button type='button' class='btn btn-danger' id='guestDelete" + data[i].rowseq + "'>Delete</button></td>");
        $('#emailTable tbody').append("<tr><td>" + data[i].firstName + "</td><td>" + data[i].lastName + "</td><td>" + data[i].attending + "</td><td><button type='button' class='btn btn-danger' id='guestDelete" + data[i].rowseq + "' class ='deleteGuest'>Delete</button></td>");

      }
      // console.log(data.length);
      
      $("#invited").text(data.length)
      $("#going").text(coming)
      $("#notGoing").text(notComing)   
      $("#unanswered").text(unanswered)       

      $("#invitedT").text(data.length)
      $("#goingT").text(coming)
      $("#notGoingT").text(notComing)   
      $("#unansweredT").text(unanswered)                  
  });
}
  </script>
