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
<form name="formdata" method="get" action="">
</form>
<?php
 include "koneksi.php";
 mysql_select_db("matrix");
	$idmatrix		=@$_GET ['idmatrix'];
	$event  		=@$_GET ['event'];
	$date  			=@$_GET ['date'];
	$company  	=@$_GET ['company'];
	$room  			=@$_GET ['room'];
	$location  		=@$_GET ['location'];
 $sql = "select * from matrix where idmatrix not like '0'";
 $result = mysql_query($sql);


 echo '<br>';
 echo '<table width="100%"  border="0">'; 
 echo '<h1 align="center">LIST ALL EVENT </h1>';
 echo '<tr>';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ID MATRIX</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>NAMA EVENT</b></div></td> ';
  echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>HARI</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>COMPANY</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ROOM</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>LOCATION</b></div></td> ';
 echo '</td>';
while($matrixdata = mysql_fetch_array($result)){
 echo '<tr>';
 echo '<td height="30" bgcolor="#FFFFCC"><div align="center">'.$matrixdata['idmatrix'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixdata['event'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixdata['date'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixdata['company'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixdata['room'].'</div></td> ';
echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixdata['location'].'</div></td> ';
 echo '</div></td> ';
 echo '</tr>';
 }
 echo '</table>';
 ?>

</div>


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