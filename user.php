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
					$( "#tanggal" ).datepicker({
								dateFormat  : "yy-mm-dd", 
								  changeMonth : true,
								  changeYear  : true
								  
								});
				  });
				  </script>

<fieldset>
<legend>FORM USER
</legend>
<p>&nbsp;</p>
<form id="formuser" name="formuser" onSubmit="return user()" method="post" action="user_save.php">
  <table width="100%" border="0">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%" align="right">USER NAME :</td>
    <td width="80%"><input name="useradmin" type="text" id="useradmin" size="50" /></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
     <td align="right">JENIS KELAMIN :</td>
    <td><select name="sex" id="sex" onchange="MM_jumpMenu('parent',this,0)">
      <option selected="selected">-Pilih-</option>
      <option>Pria</option>
	  <option>Wanita</option>
      </select>
  <tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">NO ID :</td>
    <td><label><input name="noid" type="text" id="noid" size="30" /></label></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">ALAMAT :</td>
    <td><textarea name="alamat" cols="30" rows="3" id="alamat"></textarea>
    </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">EMAIL :</td>
    <td><input name="email" type="text" id="email" size="30" />
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">TLP / HP :</td>
    <td><input name="contact" type="text" id="contact" size="30" />
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="right">PASSWORD :</td>
    <td><input name="pass_user" type="password" id="pass_user" size="30" />
  </tr>
	<tr>
	<td>&nbsp;</td>
     <td align="right">CATEGORY :</td>
    <td><select name="category" id="category" onchange="MM_jumpMenu('parent',this,0)">
      <option selected="selected">-Pilih-</option>
      <option>Administrator</option>
	  <option>User</option>
      </select>
	<tr>  
     <td>&nbsp;</td>
    <td align="right">TANGGAL MASUK :</td>
    <td><input name="tanggal" type="text" id="tanggal" size="30" />
    </tr>
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
			function user()
				{
				//validasri nama_user
					var useradmin=document.forms["formuser"]["useradmin"].value;
					if (useradmin==null || useradmin=="")
					  {
					  alert("username  tidak boleh kosong !");
					  return false;
					  };
					  
					  //validasri password
					var pass_user=document.forms["formuser"]["pass_user"].value;
					if (pass_user==null || pass_user=="")
					  {
					  alert("password  tidak boleh kosong !");
					  return false;
					  };
				}
				
			</script>

			
<!-- TABEL DATA user -->

<?php
 include "koneksi.php";
 mysql_select_db("user");
	$id_user				= @$_GET ['id_user'];
	$useradmin				= @$_GET ['useradmin'];
	$sex					= @$_GET ['sex'];
	$noid					= @$_GET ['noid'];
	$alamat					= @$_GET ['alamat'];
	$contact				= @$_GET ['contact'];
	$email					= @$_GET ['email'];
	$pass_user				= @$_GET ['pass_user'];
	$category				= @$_GET ['category'];
	$tanggal				= @$_GET ['tanggal'];
	$status					= @$_GET ['status'];
	
	
	$sql = "select * from user where id_user not like '0'";
	$result = mysql_query($sql);


 echo '<br>';
 echo '<table width="100%"  border="0">'; 
 echo '<h1 align="center">LIST ALL USER </h1>';
 echo '<tr>';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ID USER</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>USERADMIN</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>SEX</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>ALAMAT</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>CONTACT</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>EMAIL</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>CATEGORY</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>TANGGAL</b></div></td> ';
 echo '<td height="38" valign="middle" bgcolor="#4BA5DA" align="center"><b>STATUS</b></div></td> ';
 echo '</td>';
	while($user = mysql_fetch_array($result)){
 echo '<tr>';
 echo '<td height="30" bgcolor="#FFFFCC"><div align="center">'.$user['id_user'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['useradmin'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['sex'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['alamat'].'</div></td> '; 
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['contact'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['email'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['category'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['tanggal'].'</div></td> ';
 echo '<td bgcolor="#FFFFCC"><div align="center">'.$user['status'].'</div></td> ';
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