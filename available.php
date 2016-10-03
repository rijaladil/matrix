<?php 
	session_start();
	if(!isset($_SESSION['email'])){
		include("index.php");
	}
	else{
	?>

<?php
#koneksi database
$conn = mysqli_connect("localhost", "root", "123asd456", "db_matrix");
#akhiri koneksi

 #ambil data room
$query = "SELECT idroom, name_room FROM room ORDER BY name_room";
$sql = mysqli_query($conn, $query);
$arr_room = array();
while ($row = mysqli_fetch_assoc($sql)) {
	$arr_room [ $row['idroom'] ] = $row['name_room'];
	
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<link rel="stylesheet" type="text/css" href="style.css" />
<title>MATRIX</title>
</head>

<body>

<div class="outer-container">
<div class="inner-container">
<div class="header">
<div class="title">

<span class="name"><a href="index.html">MATRIX</a></span>
</div></div>
<div class="main">
<div class="content">



<!-- COPY DARI SINI YA -->

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
			  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			  <link rel="stylesheet" href="/resources/demos/style.css"> 


				<script type="text/javascript"> 
				  $(document).ready(function(){
					$("#date1").datepicker({
					dateFormat  : "yy-mm-dd", 
					  changeMonth : true,
					  changeYear  : true
					  
					});
				  });
				  
				 </script>
				 
				 <script type="text/javascript"> 
				  $(document).ready(function(){
					$("#date2").datepicker({
					dateFormat  : "yy-mm-dd", 
					  changeMonth : true,
					  changeYear  : true
					  
					});
				  });
				  
				 </script>
	
	
				<!--javascript untuk select -->
				<script   src="libs/jquery.min.js"></script>
				<script   src="libs/jquery.multiple.select.js"></script>
				<link rel="stylesheet" href="libs/multiple-select.css"/>
				  
				  
				<script>
						var $sel = jQuery.noConflict();
						$sel(document).ready(function(){
							$sel('#room').multipleSelect({
								placeholder: "Pilih Room",
								filter:true
							});
						});
					</script>
					
<fieldset><legend><b>CARI MATRIX</b></legend>
<br>
<br>
<div class="main">
<form name="formsearchmatrix" method="get" action="">
<div><table width="100%" border="0">
  <tr>
     <td> EVENT FROM: </td>
	 <td> EVENT TO: </td>
	 <td> ROOM: </td>
    </tr>
	
	<tr>
     <td><input type="text" name="date1" id="date1" size="15" /></td>
	 <td><input type="text" name="date2" id="date2" size="15" /></td>
	 <td><select id="room" name="room" multiple="multiple" style="width:200px">
			<?php
			foreach($arr_room as $idroom=>$name_room) {
				echo "<option value='$name_room'>$name_room</option>";
			}
			
			?>
		</select></td>
    <td><input type="submit" value="SEARCH" name="search"/></td>
	</tr>

</table>
<br/>
</form>
</div>

<!-- menampilkan hasil pencarian -->
<?php
if(isset($_GET['search'])){
	include "koneksi.php";
	mysql_select_db("matrix");
	$idmatrix		=@$_GET ['idmatrix'];
	$event  		=@$_GET ['event'];
	$date  			=@$_GET ['date'];
	$date1  		=@$_GET ['date1'];
	$date2  		=@$_GET ['date2'];
	$company  		=@$_GET ['company'];
	$room  			=@$_GET ['room'];
	$location  		=@$_GET ['location'];
	$status			=@$_GET ['status'];
	$jml_pax		=@$_GET ['jml_pax'];
	$sql = "select * from matrix where date BETWEEN '$date1' AND '$date2' and status not like 'Cancel' and room like '%$room%'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
?>
<br>
<?

rewind($date1);
rewind($date2);
echo 'data yang dicari 'stream_get_contents($data1)'sampai'stream_get_contents($data2)'adalah';

?>


		<table width="100%" border="0">
			<tr align="center"> 
		 	  <td height="38" valign="middle" bgcolor="#ffcc00">ID MATRIX</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">DATE</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">EVENT NAME</td>
              <td height="38" valign="middle" bgcolor="#ffcc00">COMPANY</td>
              <td height="38" valign="middle" bgcolor="#ffcc00">ROOM</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">LOCATION</td>			  
			  <td height="38" valign="middle" bgcolor="#ffcc00">JML PAX</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">STATUS</td>
			  
			 </tr>
			<?php while($matrix = mysql_fetch_array($result)) {?> 
            
		  <tr bgcolor="#FFFFCC">
			<td height="65" align="center" valign="middle" > 
			  <?php echo '<a href="edit.php?id='.$matrix['idmatrix'].'"   target="_blank">'. $matrix['idmatrix'];?>
			</td>
			  <td align="center" valign="middle" >
              <?php echo $matrix['date'];?>
            </td>
			<td align="center" valign="middle" >
			  <?php echo $matrix['event']; ?>
			</td>
            <td align="center" valign="middle" >
              <?php echo $matrix['company'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $matrix['room'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $matrix['location'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $matrix['jml_pax'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $matrix['status'];?>
            </td>
 			</tr>
			<?php }?>
	  	</table>
		<p>
		  <?php
	}else{
		echo '<center>RUANGAN YANG ADA CARI AVAILABLE<BR>SILAHKAN KLIK LINK DI BAWAH INI UNTUK BOOKING ROOM<BR>
				 <a href="event.php">BOOKING </center>'; 
	}
}
?>
<br>
</fieldset>

</div>
<div class="navigation"><?php include("menu.php"); ?> 
</div>
<div class="clearer"></div>
<!-- Please dont remove the link -->
</div>
<div class="footer">
<?php include ("footer.php");?>
<div class="clearer"></div>
</div>
</div>
</body>
</html>

		<?php
	}
?>