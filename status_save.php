<?php
$name_status		= $_POST ['name_status'];

 //koneksi database
 include "koneksi.php";
 mysql_select_db("status");
 
 $query = "insert into status set
			 name_status 	='$name_status'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data status berhasil disimpan !!');
				document.location='status.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data status gagal disimpan !!');
				</script><?php
			 }
			 ?>
 

