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
<title>client</title>
</head>

<body>

<div class="outer-container">
<div class="inner-container">
<div class="header">
<div class="title">

<span class="name"><a href="index.html">client</a></span>
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
        $("#visit1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
	
	<script type="text/javascript"> 
      $(document).ready(function(){
        $("#visit2").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
	<!-- 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" 
			type="text/javascript"></script>
			<script type="text/javascript">
			
			$(function(){
			   $('#room').change(function(){
					$('#room').after('<span class="loading">..room loading..</span>');
					$('#room').load('cariroom.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
					{
					  if(statusTxt=="success")
						$('.loading').remove();
					
					});
					return false;
			   });

			});

			</script>
-->	
<fieldset><legend><b>REPORT CLIENT</b></legend>
<br>
<br>
<div class="main">
<form name="formsearchclient" method="get" action="">
<div><table width="100%" border="0">
  <tr>
    <td> VISIT FROM: </td>
	 <td> VISIT TO: </td>
	 <td> CATEGORY: </td>
    </tr>
	
	<tr>
     <td><input type="text" name="visit1" id="visit1" size="15" /></td>
	 <td><input type="text" name="visit2" id="visit2" size="15" /></td>
	<td><input type="text" name="id_category" id="id_category" size="30" /></td>
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
	mysql_select_db("client");
	$idclient			=@$_GET ['idclient'];
	$name_client  		=@$_GET ['name_client'];
	$no_telp_client  	=@$_GET ['no_telp_client'];
	$email_client  		=@$_GET ['email_client'];
	$tgl_visit	  		=@$_GET ['tgl_visit'];
	$visit1  			=@$_GET ['visit1'];
	$visit2  			=@$_GET ['visit2'];
	$id_category  		=@$_GET ['id_category'];
	$id_marketing  		=@$_GET ['id_marketing'];
	$sqlclient ="SELECT * FROM client WHERE tgl_visit BETWEEN '$visit1' AND '$visit2' AND  id_category LIKE '%$id_category%' ";
	$resultclient = mysql_query($sqlclient);
	if(mysql_num_rows($resultclient) > 0){
?>
		<table width="100%" border="0">
			<tr align="center"> 
		 	  <td height="38" valign="middle" bgcolor="#ffcc00">ID CLIENT</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">NAMA CLIENT</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">NO TLP</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">EMAIL</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">TGL VISIT</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">CATEGORY</td>
			  <td height="38" valign="middle" bgcolor="#ffcc00">MARKETING</td>
			  
			 </tr>
			<?php while($client = mysql_fetch_array($resultclient)) {?> 
            
		  <tr bgcolor="#FFFFCC">
			<td height="65" align="center" valign="middle" > 
			  <?php echo $client['idclient'];?>
			</td>
			  <td align="center" valign="middle" >
              <?php echo $client['name_client'];?>
            </td>
			<td align="center" valign="middle" >
			  <?php echo $client['no_telp_client']; ?>
			</td>
            <td align="center" valign="middle" >
              <?php echo $client['email_client'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $client['tgl_visit'];?>
            </td>
			<td align="center" valign="middle" >
              <?php echo $client['id_category'];?>
            </td>
			  </td>
			<td align="center" valign="middle" >
              <?php echo $client['id_marketing'];?>
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