window.onload = function(){
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
}
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
