<html>
	<head>
<script src="grafik/js/jquery.min.js" type="text/javascript"></script>
<script src="grafik/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container1',
            type: 'column'
         },   
         title: {
            text: 'Grafik Penggunaan Room '
         },
         xAxis: {
            categories: ['Room']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
        	include('koneksi.php');
            //$sql   	= "SELECT room  FROM penjualan";
			$sql   		="SELECT room, status, (count(room)) AS jumlah From matrix where status NOT LIKE  'Cancel' and status Like 'Fix' GROUP BY room";
            $query 		= mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            $room		=$ret['room'];                     
                 
			//$sql_jumlah   = "SELECT jumlah FROM penjualan WHERE room='$room'"; 
			$sql_jumlah   	="SELECT room, status, (count(room)) AS jumlah From matrix where room ='$room' and status NOT LIKE 'Cancel' and status Like 'Fix' GROUP BY room";			
            $query_jumlah 	= mysql_query( $sql_jumlah ) or die(mysql_error());
            while( $data 	= mysql_fetch_array( $query_jumlah ) ){
            $jumlah 		= $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $room; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container1'></div>		
	</body>
</html>