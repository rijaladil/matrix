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
			 
						

<fieldset>
<legend>FORM MARKETING
</legend>
<p>&nbsp;</p>
<form id="formmarketing" name="formmarketing" onSubmit="return marketing()" method="post" action="marketing_save.php">
  <table width="100%" border="0">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%" align="right">MARKETING NAME :</td>
    <td width="80%"><input name="name_marketing" type="text" id="name_marketing" size="50" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">TLP :</td>
    <td><label><input name="no_tlp_mark" type="text" id="no_tlp_mark" size="20" /></label></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">EMAIL :</td>
    <td><input name="email_mark" type="text" id="email_mark" size="30" />
    </tr>
  <tr>
    <td>&nbsp;</td>
     <td align="right">STATUS :</td>
    <td><select name="status" id="status" onchange="MM_jumpMenu('parent',this,0)">
      <option selected="selected">-Pilih-</option>
      <option>Aktive</option>
	  <option>Off</option>
      </select>
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
			function marketing()
				{
				//validasri nama_marketing
					var name_marketing=document.forms["formmarketing"]["name_marketing"].value;
					if (name_marketing==null || name_marketing=="")
					  {
					  alert("marketing name  tidak boleh kosong !");
					  return false;
					  };
				}
			</script>

			
<!-- TABEL DATA marketing -->

<?php
 include "koneksi.php";
 mysql_select_db("marketing");
	$idmarketing		= @$_GET ['idmarketing'];
	$name_marketing		= @$_GET ['name_marketing'];
	$no_tlp_mark		= @$_GET ['no_tlp_mark'];
	$email_mark			= @$_GET ['email_mark'];
	$status				= @$_GET ['status'];
	
	$sql = "select * from marketing where idmarketing not like '0'";
	$result = mysql_query($sql);


 echo '<br>';
 echo '<table width="100%"  border="0">'; 
 echo '<h1 align="center">LIST ALL MARKETING </h1>';
 echo '<tr>';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ID MARK</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>NAMA</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>NO TLP.</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>EMAIL</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>STATUS</b></div></td> ';
 echo '</td>';
	while($marketing = mysql_fetch_array($result)){
 echo '<tr>';
 echo '<td height="30" bgcolor="#FFFFCC"><div align="center">'.$marketing['idmarketing'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$marketing['name_marketing'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$marketing['no_tlp_mark'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$marketing['email_mark'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$marketing['status'].'</div></td> ';
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