<html>
	<head>
	<style>
	th {
		color : #fff;
		background-color :#00215e
	}
	tr {
		
	}
	td{
		text-align: center;
		border-top: 1px solid #000;
	}
	</style>
	</head>
    <body>
        <table border='0' align='center' class="view_tb">
				<tr><th colspan="2">TODAY EVENT </th></tr>
				
				<div class="view">
                <?php
       
                    include 'koneksi.php';
                   
                    $query = "SELECT * FROM matrix where DATE(date) = DATE(NOW()) and status NOT LIKE 'cancel'";
                    $exe = mysql_query($query);
                    $room = "SELECT * FROM matrix ORDER BY room";
					$event = "SELECT * FROM matrix ORDER BY event";
                    while($row = mysql_fetch_assoc($exe)){
                        $event = $row['event'];
                        $room = $row['room'];
						
                       
                    echo "<tr> 	
								<td>$event - $room</td>
						</tr>";
                    }
				   
               ?>
				<tr><th colspan="2">TOMORROW EVENT</th></tr>
				
				<div class="besok">
                <?php
       
                    include 'koneksi.php';
                   
                    $query = "SELECT * FROM matrix where DATE(date) = DATE(NOW()) +1 and status NOT LIKE 'cancel'";
                    $exe = mysql_query($query);
                    $room = "SELECT * FROM matrix ORDER BY room";
					$event = "SELECT * FROM matrix ORDER BY event";
                    while($row = mysql_fetch_assoc($exe)){
                        $event = $row['event'];
                        $room = $row['room'];
						
                   
                    echo "<tr> 	
								<td>$event - $room</td>
						</tr>";
                    }
				
				
               
               ?>
			   
       
        </table>
   
    </body>

</html>