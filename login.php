<?php session_start(); 
include "koneksi.php"; 
$email=$_POST['email']; 
$pass_user=$_POST['pass_user']; 
//$category=$_POST['category']; 


//$queryadministrator=mysql_query("select * from user where email='$email' and pass_user=md5('$pass_user') and category='ADMINISTRATOR' and status='ACTIVE'");
//$cek1=mysql_num_rows($queryadministrator); 

//$queryuser=mysql_query("select * from user where email='$email' and pass_user=md5('$pass_user') and category='USER' and status='ACTIVE'");
//$cek2=mysql_num_rows($queryuser); 



$queryadministrator=mysql_query("select * from user where email='$email' and pass_user='$pass_user'");
$cek1=mysql_num_rows($queryadministrator); 

$queryuser=mysql_query("select * from user where email='$email' and pass_user='$pass_user'");
$cek2=mysql_num_rows($queryuser); 

if($cek1){ 
$_SESSION['email']=$email; 
header("Location: home.php"); //katagori administrator
}
if($cek2){ 
$_SESSION['email']=$email; 
header("Location: home.php"); //kategory user

?>
<?php 
}
else{ 
?><script language="JavaScript">
	alert('Username, Password dan category tidak sesuai atau tidak aktive!');
	document.location='index.php';
</script>
<?php 
echo mysql_error(); 
} 
?> 