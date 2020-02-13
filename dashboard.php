<!DOCTYPE html>
<?php session_start(); ?>
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
  <?php include "navbar.php";?>
</header>
<section class="main">
  <div class="flex_space_around">
    <div>
      <div class="card" id="selectWedding">
        <h2>Wedding Select</h2>
        <form action="">
          <div class="flex_space_around">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newWeddingModal">New Wedding</button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#existingWeddingModal">Edit Existing Wedding</button>
          </div>
        </form>
        <p><label>Wedding ID:</label> 123456</p>
        <p><label>Bride: </label> Jane Smith</p>
        <p><label>Groom: </label> John Doe</p>
      </div>
      <div class="card" id="rsvpData">
        <div>
          <div>
            <h3>Attendance</h3>
            <p><label>Going:</label> 136</p>
            <p><label>Not Going:</label> 42</p>
            <p><label>Unanswered:</label> 23</p>
            <p><label>Invited:</label> 201</p>
          </div>
          <div>
            <canvas id="rsvpPie"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="card num" id="percentComplete">
        <div>
          <h3>% Plan Completion</h3>
          <p>64%</p>
        </div>
      </div>
      <div class="card" id="percentCompleteDoughnut">
        <div>
          <canvas id="progress_pie"></canvas>
        </div>
      </div>
      <div class="card" id='costAnalysisCard'>
        <h3>Cost Analysis</h3>
        <canvas id="costAnalysis"></canvas>
      </div>
    </div>
    <div>
      <div class="card num" id="budget">
        <div id="totalBudget">
          <h3>Total Budget</h3>
          <p>$25000</p>
          <h3>Funds Allocated</h3>
          <p>$16547</p>
          <h3>Funds Remaining</h3>
          <p>$8453</p>
        </div>
      </div>
      <div class="card" id="taskList">
        <div class="container-fluid">
          <h3>Upcoming Tasks</h3>
          <table class="table table-striped" id="taskTable">
            <thead class="thead-dark">
              <th class="col-xs-1">Task No.</th>
              <th class="col-xs-1">Description</th>
              <th class="col-xs-1">Status</th>
            </thead>
            <tbody>
              <tr><td>1</td><td>Example task</td><td>Not Started</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="flex_space_around">
    <!--<div class="card" id='costAnalysisCard'>
      <h3>Cost Analysis</h3>
      <canvas id="costAnalysis"></canvas>
    </div>-->
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="createWedding($('#groomFirstName').val(), $('#groomLastName').val(), $('#brideFirstName').val(), $('#brideLastName').val(), $('#date').val());">Create Wedding</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="existingWeddingModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Select a Wedding</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="">
          <select name="weddingList" id="weddingList" class="custom-select">
            <option selected>Select a Wedding</option>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="">Edit Wedding</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script>
//window.onload = function(){
  //costCategories();
  var pieData = {
    labels: ["% Complete", "% Incomplete"],
    datasets: [{
      label: 'Percent Complete',
      data: [64, 36],//this will be populated with actual data
      backgroundColor:['rgba(0, 255, 128, 0.4)',
                'rgba(255, 51, 51, 0.2)'],
      borderColor: ['rgba(0,255,128,1)',
                'rgba(255, 51, 51, 1)',],
      borderWidth: 1
    }]
  };
  var costAnalysisData = {
    labels: ['Food and Drink', 'Cake', 'Decoratives', 'Venue Fees', 'Transportation', 'DJ', 'Misc'],
    datasets: [{
      label: 'Cost Analysis',
      data: [5000, 300, 5200, 4000, 2500, 600, 3750],
      backgroundColor: ['rgba(228,26,28,0.2)',
                        'rgba(55,126,184,0.2)',
                        'rgba(77,175,74,0.2)',
                        'rgba(152,78,163,0.2)',
                        'rgba(255,127,0,0.2)',
                        'rgba(255,255,51,0.2)',
                        'rgba(166,86,40,0.2)'],
      borderColor: ['rgba(228,26,28,1)',
                        'rgba(55,126,184,1)',
                        'rgba(77,175,74,1)',
                        'rgba(152,78,163,1)',
                        'rgba(255,127,0,1)',
                        'rgba(255,255,51,1)',
                        'rgba(166,86,40,1)'],
      borderWidth: 1
    }]
  };
  var rsvpData = {
    labels: ['Going', 'Not Going', 'Unanswered'],
    datasets: [{
      label: 'Attendance',
      data: [136, 42, 23],
      backgroundColor: ['rgba(0, 255, 128, 0.4)',
                        'rgba(255, 51, 51, 0.2)',
                        'rgba(255,255,51,0.2)'],
      borderColor: ['rgba(0, 255, 128, 1)',
                        'rgba(255, 51, 51, 1)',
                        'rgba(255,255,51,1)'],
      borderWidth: 1
    }]
  };
  drawChart('doughnut', $('#progress_pie'), pieData);
  drawChart('horizontalBar', $('#costAnalysis'), costAnalysisData);
  drawChart('pie', $('#rsvpPie'), rsvpData);
  populateWeddingList();
//}
function costCategories()
{
  var costAnalysis = $('#costAnalysis');
  var myCostAnalysis = new Chart(costAnalysis, {
    type: 'horizontalBar',
    data: {
      labels: []
    }
  });
}
function drawChart(type, canvas, data, options = {}){
  var myChart = new Chart(canvas, {
    type: type,
    data: data,
    options: options
  });
}

function createWedding(groomFirstName, groomLastName, brideFirstName, brideLastName, date)
{
  $.post("../php/createWedding.php", {groomFirstName: groomFirstName, groomLastName: groomLastName, brideFirstName: brideFirstName, brideLastName: brideLastName, date: date}, function(data, status){
    alert("Wedding created.");
    $('#newWeddingModal').modal("hide");
  });
}
function populateWeddingList()
{
  $.get("../php/populateWeddingList.php", function(data, status){
    $('#weddingList').append(data);
    console.log('the wedding list should be populated');
  });
}
/*function planCompletion()
{
  $.get("restricted/php/plan")
}*/
</script>
</html>
