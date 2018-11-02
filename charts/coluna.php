 <script type="text/javascript" src="loader.js"></script>
  <script type="text/javascript">
  
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["NOme", "Density", { role: "style" } ],
		
        ["Cobre", 8.94, "#b87333"],
        ["Prata", 10.49, "silver"],
        ["Ouro", 19.30, "gold"],
        ["Magannes", 10.30, "green"],
        ["Platina", 21.45, "#e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Densidade dos ELementos",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>