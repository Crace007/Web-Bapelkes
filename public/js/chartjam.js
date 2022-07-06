(function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML = 
      h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
})();

function checkTime(i){
  if(i<10){i = "0" + i}
  return i;
}

(function chartPerserta(){
    var densityCanvas = document.getElementById("densityChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var densityData = {
      label: 'Jumlah Peserta Pelatihan',
      data: [204, 255, 276, 301, 176, 190],
      backgroundColor: 'rgba(0, 99, 132, 0.6)',
      borderColor: 'rgba(0, 99, 132, 1)',
      yAxisID: "y-axis-density"
    };
    
    var gravityData = {
      label: 'Jumlah Total Pelatihan',
      data: [25, 31, 35, 28, 19, 23],
      backgroundColor: 'rgba(99, 132, 0, 0.6)',
      borderColor: 'rgba(99, 132, 0, 1)',
      yAxisID: "y-axis-gravity"
    };
    
    var planetData = {
      labels: ["2018", "2019", "2020", "2021", "2022", "2023"],
      datasets: [densityData, gravityData]
    };
    
    var chartOptions = {
      scales: {
        xAxes: [{
          barPercentage: 1,
          categoryPercentage: 0.6
        }],
        yAxes: [{
          id: "y-axis-density"
        }, {
          id: "y-axis-gravity"
        }]
      }
    };
    
    var barChart = new Chart(densityCanvas, {
      type: 'bar',
      data: planetData,
      options: chartOptions
    });
})();