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
 
 
  #ambil catagory category
$query_category = "SELECT idcategory, name_category FROM category ORDER BY name_category";
$sql_category = mysqli_query($conn, $query_category);
$arr_category = array();
while ($row = mysqli_fetch_assoc($sql_category)) {
	$arr_category [ $row['idcategory'] ] = $row['name_category'];
	
	}
  
 #ambil data room
$query = "SELECT idroom, name_room FROM room ORDER BY name_room";
$sql = mysqli_query($conn, $query);
$arr_room = array();
while ($row = mysqli_fetch_assoc($sql)) {
	$arr_room [ $row['idroom'] ] = $row['name_room'];
	
	}

#ambil data lokasi
$query_location = "SELECT  DISTINCT location FROM room ORDER BY location";
$sql_location = mysqli_query($conn, $query_location);
$arr_location = array();
while ($row = mysqli_fetch_assoc($sql_location)) {
	$arr_location [ $row['location'] ] = $row['location'];
	
	}
	
	
	#ambil data marketing
$query_marketing = "SELECT  idmarketing, name_marketing FROM marketing WHERE status not like 'Off' ORDER BY name_marketing ";
$sql_marketing = mysqli_query($conn, $query_marketing);
$arr_marketing = array();
while ($row = mysqli_fetch_assoc($sql_marketing)) {
	$arr_marketing [ $row['idmarketing'] ] = $row['name_marketing'];
	
	}
	
	
	#ambil data status
$query_status = "SELECT  idstatus, name_status FROM status ORDER BY name_status";
$sql_status = mysqli_query($conn, $query_status);
$arr_statusn = array();
while ($row = mysqli_fetch_assoc($sql_status)) {
	$arr_status [ $row['idstatus'] ] = $row['name_status'];
	
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


<span class="name"></span>
</div></div>
<div class="main">
<div class="content">




<!-- javascript untuk tanggal -->
			<!--<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
			<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
			<script type="text/javascript" src="js/ui.core.js"></script>
			<script type="text/javascript" src="js/ui.datepicker.js"></script>

			<script type="text/javascript">
								$(document).ready(function(){
								$("#date").datepicker
								({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
							  });
			</script>
			
			<script type="text/javascript">							  
							  	$(document).ready(function(){
								$("#tgl_booking").datepicker
								({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
							  });
			</script>
			
			<script type="text/javascript">							  
							  	$(document).ready(function(){
								$("#tgl_dp").datepicker
								({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
							  });


			</script>
			-->
			
			
			 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
			  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			  <link rel="stylesheet" href="/resources/demos/style.css"> 
			 
				  <script>
				  $(function() {
					$( "#date" ).datepicker({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
				  });
				  </script>
				   
				   <script>
				  $(function() {
					$( "#tgl_booking" ).datepicker({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
				  });
				  </script>
				  
				  <script>
				  $(function() {
					$( "#tgl_dp" ).datepicker({
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
					
					<script>
						var $sel1 = jQuery.noConflict();
						$sel1(document).ready(function(){
							$sel1('#location').multipleSelect({
								placeholder: "Pilih Location",
								filter:true
							});
						});
					</script>
				  
				  
				  <script>
						var $sel = jQuery.noConflict();
						$sel(document).ready(function(){
							$sel('#category').multipleSelect({
								placeholder: "Pilih Category",
								filter:true
							});
						});
					</script>
					
					<script>
						var $sel = jQuery.noConflict();
						$sel(document).ready(function(){
							$sel('#nama_marketing').multipleSelect({
								placeholder: "Pilih Marketing",
								filter:true
							});
						});
					</script>
					
					<script>
						var $sel = jQuery.noConflict();
						$sel(document).ready(function(){
							$sel('#status').multipleSelect({
								placeholder: "Pilih Status",
								filter:true
							});
						});
					</script>
<!-- -->      
<fieldset>
<legend>FORM SIGN IN EVENT HARIAN 
</legend>
<p>&nbsp;</p>
  <?php 
		 include "koneksi.php";
 		 mysql_select_db("db_matrix");
		 $query = "select * from matrix where idmatrix ='".mysql_real_escape_string($_GET['id'])."'";
		 $result = mysql_query($query);
		 $matrix = mysql_fetch_array($result);
	?>
<form id="formeditmatrix" name="formeditmatrix" method="post" action="edit_save.php">
  <table width="100%" border="0">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%" align="right">ID MATRIX : </td>
    <td width="80%"><input name="idmatrix" type="text" id="idmatrix" value="<?=$matrix['idmatrix'];?>" size="10" />
    </td>
    
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%" align="right">EVENT NAME : </td>
    <td width="80%"><input name="event" type="text" id="event" value="<?=$matrix['event'];?>"  size="50" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">DATE EVENT :</td>
    <td><label><input name="date" type="text" id="date" value="<?=$matrix['date'];?>"  /></label></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">CATEGORY EVENT :</td>
    <td><select id="category" name="category" multiple="multiple" style="width:200px">
			<option selected="selected"><?=$matrix['category'];?></option>
			<?php
			foreach($arr_category as $idcategory=>$name_category) {
				echo "<option value='$name_category'>$name_category</option>";
			}
			
			?>
	  </select>
	   
	   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">COMPANY :</td>
    <td><input name="company" type="text" id="company" value="<?=$matrix['company'];?>"  size="50" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">ROOM :</td>
    <td><select id="room" name="room" multiple="multiple" style="width:200px">
			<option selected="selected"><?=$matrix['room'];?></option>
			<?php
			foreach($arr_room as $idroom=>$name_room) {
				echo "<option value='$name_room'>$name_room</option>";
			}
			
			?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><p>LOCATION :</p></td>
    <td><select id="location" name="location" multiple="multiple" style="width:150px">
			<option selected="selected"><?=$matrix['location'];?></option>
			<?php
			foreach($arr_location as $idroom=>$location) {
				echo "<option value='$location'>$location</option>";
			}
			
			?>
    </select></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td align="right">JML PAX :</td>
    <td><input name="jml_pax" type="text" id="jml_pax" value="<?=$matrix['jml_pax'];?>"  /></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">SETUP :</td>
    <td><textarea name="setup" cols="48" rows="5" id="setup" /> <?=$matrix['setup'];?> </textarea></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">MARKETING :</td>
    <td><select id="nama_marketing" name="nama_marketing" multiple="multiple" style="width:150px">
			<option  selected="selected"><?=$matrix['nama_marketing'];?></option>
			<?php
			foreach($arr_marketing as $idmarketing=>$name_marketing) {
				echo "<option value='$name_marketing'>$name_marketing</option>";
			}
			
			?>
	    </select></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">PIC :</td>
    <td><input name="nama_booking" type="text" id="nama_booking" value="<?=$matrix['nama_booking'];?>"  size="50" /></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">TLP PIC :</td>
    <td><input name="tlp_booking" type="text" id="tlp_booking" value="<?=$matrix['tlp_booking'];?>"  size="20" /></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">BOOKING DATE :</td>
    <td><input name="tgl_booking" type="text" id="tgl_booking" value="<?=$matrix['tgl_booking'];?>"  /></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">DP DATE:</td>
    <td><input name="tgl_dp" type="text" id="tgl_dp" value="<?=$matrix['tgl_dp'];?>"  /></td>
   </tr>
   <tr>
  	<td>&nbsp;</td>
    <td align="right">STATUS :</td>
    <td><select id="status" name="status" multiple="multiple" style="width:150px">
			<option selected="selected"><?=$matrix['status'];?></option>
			<?php
			foreach($arr_status as $idstatus=>$name_status) {
				echo "<option value='$name_status'>$name_status</option>";
			}
			
			?>
        </select></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">COMMENT :</td>
    <td><textarea name="comment" cols="48" rows="5" id="comment"/><?=$matrix['comment'];?> </textarea></td>
   </tr>
     <tr>
  	<td>&nbsp;</td>
    <td align="right">Inputdate :<br>Editdate :</td>
    <td><?=$matrix['inputdate'];?> <br><?=$matrix['editdate'];?></td>
   </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="edit" id="edit" value="EDIT" />
      <input type="reset" name="delete" id="delete" value="DELETE" /></td>
  </tr>
</table>
</form>
<p align="center"><!--&copy; Copyright 2016 Ahmad Rijal Adil--></p>
</fieldset>


</div>
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