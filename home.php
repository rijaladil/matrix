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
				  
			<!--link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
			<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
			<script type="text/javascript" src="js/ui.core.js"></script>
			<script type="text/javascript" src="js/ui.datepicker.js"></script>
			-->
			 		
			<!-- <script type="text/javascript">
								$(document).ready(function(){
								$("#adate").datepicker
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


			</script> -->
<!-- -->      
<fieldset>
<legend>
</legend>
<p>&nbsp;</p>
<h1 align="center">SELAMAT DATANG DI SISTEM MATRIX MICE</h1>
<h2 align="center">Saat ini, sistem masih dalam proses pengembangan !<br />

  <br />
    <br />
</h2>
<div>
<?php include ("grafik.php");?>
<br>
<?php include ("grafik1.php");?>
</div>
</fieldset>

<!-- COPY SAMPAI SINI YA -->
</div>
<div class="navigation"><?php include("menu.php"); ?> <p> <hr>
<?php include("view.php");?>
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