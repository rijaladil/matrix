<?php 
	session_start();
	if(!isset($_SESSION['email'])){
		include("index.php");
	}
	else{
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
        $("#date").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
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
    <td> EVENT DATE: </td>
	 <td> ROOM: </td>
	 <td> EVENT NAME: </td>
	 <td> COMPANY: </td>
    </tr>
	
	<tr>
     <td><input type="text" name="date" id="date" size="15" /></td>
	 <td><input type="text" name="room" id="room" size="20" /></td>
	 <td><input type="text" name="event" id="event" size="50" /></td>
	 <td><input type="text" name="company" id="company" size="30" /></td>
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
	$company  		=@$_GET ['company'];
	$room  			=@$_GET ['room'];
	$location  		=@$_GET ['location'];
	$status			=@$_GET ['status'];
	$jml_pax		=@$_GET ['jml_pax'];
	$sql_matrix = "select matrix where date like '$date' ";
	$sql = "select * from matrix where date like '$date' and room like '%$room%' and event like '%$event%' and company like '%$company%' and status not like 'Cancel' ORDER BY matrix . location DESC";
	$result = mysql_query($sql);
	$result_matrix = mysql_query ($sql_matrix);
	if(mysql_num_rows($result) > 0){
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
			  </td>
			  <td align="center" valign="middle" >
              <?php echo $matrix['jml_pax'];?>
            </td>
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
		echo '<center>MAAF !<BR>DATA YANG ANDA CARI TIDAK ADA<BR> <B>SILAHKAN CARI LAGI</B> </center>'; 
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