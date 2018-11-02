<html>
  <head>
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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes','2015','2016','2017','2018'],
		  
		<?php 
		$sql="SELECT t2015.d,t2015.e,t2016.e,t2017.e,t2018.e FROM transferencia2015 as t2015 inner join transferencia2016 as t2016 inner join transferencia2017 as t2017 inner join transferencia2018 as t2018  on t2016.d=t2017.d and t2017.d=t2018.d  and t2015.d=t2016.d"; 
		$sql=mysqli_query($conexao,$sql);
		while($dado=mysqli_fetch_array($sql)){	
		?>
        ["<?php echo ''.$dado['0'];?>", <?php echo $dado['1'];?>, <?php echo $dado['2'];?>, <?php echo $dado['3'];?>, <?php echo $dado['4'];?>],
		
		<? } ?>
		
        ]);

        var options = {
          title: 'Royalties Parauapebas',
         // curveType: 'function',
		   // width: 1200,
          legend: { position: 'bottom' },

        vAxis: {
          title: 'Valor'
        }
        };


        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width:auto; height: 500px"></div>
  </body>
</html>