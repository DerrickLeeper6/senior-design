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

<h1 style = "text-align:center;">Budget</h1>
<hr/>



<div class = 'container'>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="card">
                <div id="totalBudget" class ='card-body'>
                    <h3>Total Budget</h3>
                    <input type = 'text' class = 'budgetStyling' value = '25000' readonly>
                    <h3>Funds Allocated</h3>
                    <input type = 'text' class = 'budgetStyling' value = '20000' readonly></p>
                    <h3>Funds Remaining</h3>
                    <input type = 'text' class = 'budgetStyling' value = '5000' style = 'background-color: green;' readonly></p>
                </div>            
            </div>
        </div>


        <div class="col-xs-12 col-md-8">
            <div class="card">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCostModal">Add Cost</button>
                <div class ='card-body' style = 'text-align: center'>
                    <table id="budgetTable" style = 'width: 100% !important;'>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Cost</th>
                                <!-- <th>Action</th> -->
                        </thead>
                        <tbody id = 'budgetTbody'>
                          <tr>
                            <td>500</td><td>Other</td>
                          </tr>
                          <tr>
                            <td>5000</td><td>Venue</td>
                          </tr>
                          <tr>
                            <td>5000</td><td>Other</td>
                          </tr>
                          <tr>
                            <td>5000</td><td>Other</td>
                          </tr>                                                    
                          <tr>
                            <td>2500</td><td>Food</td>
                          </tr>
                          <tr>
                            <td>2000</td><td>Venue</td>
                          </tr>
                          <tr></tr>
                        </tbody>
                    </table>
                </div>            
            </div>        
        </div>     
        <div  class="col-xs-12 col-md-8">
          <div class="no_border_card">
            <div>
              <h2>Your budget, simple</h2>
              <h4>Manage where every dollar of your money is going</h4>
              <p>See where every dollar goes and what it goes for. Provide <br>
              descriptions so everyone can know where your money is going</p>
            </div>
          </div>    
        </div>               
    </div>
</div>


<div class="modal" id="addCostModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">New Cost</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action=''>
                <div class="form-group">
                    <label for="cost">Cost: ($)</label>
                    <input type="text" class="form-control" id="cost">
                </div>

                <div class="form-group" id="categoryCostGroup">
                    <label for="categoryCost">Category:</label>
                    <select class = 'form-control' id='categoryCost' required>
                        <option value=""></option>
                        <option value="Vendors">Vendors</option>
                        <option value="Food">Food</option>
                        <option value="Venue">Venue</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
                <!-- <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows = '4' class="form-control" id=  "description" style ='resize:vertical'></textarea>
                </div>                 -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id = 'addCost' class="btn btn-primary" data-dismiss="modal">Add Cost</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
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
