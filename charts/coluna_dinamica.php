 <meta charset="UTF-8">
 <script type="text/javascript" src="loader.js"></script>
  <script type="text/javascript">
<?php
$cor = array('#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF');
?>		  
		  
  	<?php 
		$conexao = mysqli_connect ('localhost','root','','royalties') or die ('Erro na conexão');

	?>
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Mes", "Valor", { role: "style" } ],
		
		<?php 
		$sql='SELECT * FROM transferencia2017'; 
		$sql=mysqli_query($conexao,$sql);
		while($dado=mysqli_fetch_array($sql)){	
		?>
        ["<?php echo $dado['D'];?>", <?php echo $dado['E'];?>, "<?php echo $cor[$i];  $i=$i+1;?>"],
		
		<?php } ?>
		
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Royalties Parauapebas 2017",
        //width: 1200,
        height: 400,
        bar: {groupWidth: "55%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: auto; height: 300px;"></div>