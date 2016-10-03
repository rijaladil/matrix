<?php
$name_client		= $_POST ['name_client'];
$no_telp_client		= $_POST ['no_telp_client'];
$email_client		= $_POST ['email_client'];
$tgl_visit			= $_POST ['tgl_visit'];
$id_category		= $_POST ['category'];
$id_marketing		= $_POST ['marketing'];


 //koneksi database
 include "koneksi.php";
 mysql_select_db("client");
 
 $query = "insert into client set
			 name_client 	='$name_client',
			 no_telp_client ='$no_telp_client',
			 email_client	='$email_client',
			 tgl_visit		='$tgl_visit',
			 id_category		='$id_category',
			 id_marketing		='$id_marketing'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data client berhasil disimpan !!');
				document.location='client.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data client gagal disimpan !!');
				</script><?php
			 }
			 ?>
 

