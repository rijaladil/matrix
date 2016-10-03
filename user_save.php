<?php
$useradmin		= $_POST ['useradmin'];
$sex			= $_POST ['sex'];
$noid			= $_POST ['noid'];
$alamat			= $_POST ['alamat'];
$contact		= $_POST ['contact'];
$email			= $_POST ['email'];
$pass_user		= $_POST ['pass_user'];
$category		= $_POST ['category'];
$tanggal		= $_POST ['tanggal'];
$status			= $_POST ['status'];

 //koneksi database
 include "koneksi.php";
 mysql_select_db("user");
 
 $query = "insert into user set
			 useradmin 			='$useradmin',
			 sex 				='$sex',
			 noid				='$noid',
			 alamat				='$alamat',
			 contact			='$contact',
			 email				='$email',
			 pass_user			='$pass_user',
			 category			='$category',
			 tanggal			='$tanggal',				
			 status				='$status'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data user berhasil disimpan !!');
				document.location='user.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data user gagal disimpan !!');
				document.location='user.php';
				</script><?php
			 }
			 ?>
 

