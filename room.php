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

<span class="name"></span>
</div></div>
<div class="main">
<div class="content">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			  <script   src="//code.jquery.com/jquery-1.10.2.js"></script>
			  <script   src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			  <link rel="stylesheet" href="/resources/demos/style.css"> 

<fieldset>
<legend>FORM ROOM
</legend>
<form id="formroom" name="formroom" method="post" action="room_save.php">
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="right">ROOM : </td>
    <td><input name="name_room" type="text" id="name_room" size="25" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">LOCATION : </td>
    <td><input name="location" type="text" id="location" size="15" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="save" id="save" value="SUBMIT" />
        <input type="reset" name="Reset" id="reset" value="RESET" /></td>
  </tr>
</table>
</form>
<h1 align="center"><br />
  <br />
    <br />
</h1>
</fieldset>


<?php
 include "koneksi.php";
 mysql_select_db("room");
	$idroom			= @$_GET ['idroom'];
	$name_room		= @$_GET ['name_room'];
	$location		= @$_GET ['location'];
	
	$sql = "select * from room where idroom not like '0'";
	$result = mysql_query($sql);


 echo '<br>';
 echo '<table width="100%"  border="0">'; 
 echo '<h1 align="center">LIST ALL ROOM </h1>';
 echo '<tr>';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ID ROOM</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ROOM</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>LOCATION</b></div></td> ';
 echo '</td>';
	while($location = mysql_fetch_array($result)){
 echo '<tr>';
 echo '<td height="30" bgcolor="#FFFFCC"><div align="center">'.$location['idroom'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$location['name_room'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$location['location'].'</div></td> ';
 echo '</div></td> ';
 echo '</tr>';
 }
 echo '</table>';
 ?>


<!-- COPY SAMPAI SINI YA -->
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