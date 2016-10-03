<?php
$name_marketing		= $_POST ['name_marketing'];
$no_tlp_mark		= $_POST ['no_tlp_mark'];
$email_mark			= $_POST ['email_mark'];
$status				= $_POST ['status'];

 //koneksi database
 include "koneksi.php";
 mysql_select_db("marketing");
 
 $query = "insert into marketing set
			 name_marketing 	='$name_marketing',
			 no_tlp_mark 		='$no_tlp_mark',
			 email_mark			='$email_mark',
			 status				='$status'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data marketing berhasil disimpan !!');
				document.location='marketing.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data marketing gagal disimpan !!');
				document.location='marketing.php';
				</script><?php
			 }
			 ?>
 

