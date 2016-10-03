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


<!-- javascript untuk tanggal -->
			  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			  <script   src="//code.jquery.com/jquery-1.10.2.js"></script>
			  <script   src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			  <link rel="stylesheet" href="/resources/demos/style.css"> 
			 
				  <script>
				  $(function() {
					$( "#tgl_visit" ).datepicker({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
				  });
				  </script>
				   
				 
<!-- -->      
<fieldset>
<legend>FORM CLIENT
</legend>
<p>&nbsp;</p>
<form id="formclient" name="formclient" onSubmit="return client()" method="post" action="client_save.php">
  <table width="100%" border="0">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%" align="right">NAMA CLIENT :</td>
    <td width="80%"><input name="name_client" type="text" id="name_client" size="50" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">TLP CLIENT :</td>
    <td><label><input name="no_telp_client" type="text" id="no_telp_client" size="20" /></label></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">EMAIL :</td>
    <td><input name="email_client" type="text" id="email_client" size="50" />
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">TGL VISIT :</td>
    <td><input name="tgl_visit" type="text" id="tgl_visit" size="20" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">CATEGORY :</td>
    <td><input type="text" name="category" id="category" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">MARKETING :</td>
    <td><input type="text" name="marketing" id="marketing" /></td>
  </tr>
     <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="save" id="save" value="SUBMIT" />
      <input type="reset" name="Reset" id="reset" value="RESET" /></td>
  </tr>
</table>
</form>
<p align="center"><!--&copy; Copyright 2016 Ahmad Rijal Adil--></p>
</fieldset>


<script type="text/javascript">
			function client()
				{
				//validasri nama_client
					var name_client=document.forms["formclient"]["name_client"].value;
					if (name_client==null || name_client=="")
					  {
					  alert("client name  tidak boleh kosong !");
					  return false;
					  };
				//validasri tgl_visit  
					var tgl_visit=document.forms["formclient"]["tgl_visit"].value;
					if (tgl_visit==null || tgl_visit=="")
					  {
					  alert("tgl visit tidak boleh kosong !");
					  return false;
					  };

				}
			</script>

			
<!-- TABEL DATA CLIENT -->

<?php
 include "koneksi.php";
 mysql_select_db("client");
	$idclient			= @$_GET ['idclient'];
	$name_client		= @$_GET ['name_client'];
	$no_telp_client		= @$_GET ['no_telp_client'];
	$email_client		= @$_GET ['email_client'];
	$tgl_visit			= @$_GET ['tgl_visit'];
	$id_category		= @$_GET ['category'];
	$id_marketing		= @$_GET ['marketing'];
	
	$sql = "select * from client where idclient not like '0'";
	$result = mysql_query($sql);


 echo '<br>';
 echo '<table width="100%"  border="0">'; 
 echo '<h1 align="center">LIST ALL CLIENT </h1>';
 echo '<tr>';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ID CLIENT</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>NAMA CLIENT</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>NO TLP.</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>EMAIL</b></div></td> ';
  echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>TGL VISIT</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>CATEGORY</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>MARKETING</b></div></td> ';
 echo '</td>';
	while($matrixclient = mysql_fetch_array($result)){
 echo '<tr>';
 echo '<td height="30" bgcolor="#FFFFCC"><div align="center"><a href="client_edit.php?id='.$matrixclient['idclient'].'">'.$matrixclient['idclient'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['name_client'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['no_telp_client'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['email_client'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['tgl_visit'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['id_category'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$matrixclient['id_marketing'].'</div></td> ';
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