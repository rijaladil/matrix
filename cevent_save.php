<?php
$name_category		= $_POST ['name_category'];

 //koneksi database
 include "koneksi.php";
 mysql_select_db("category");
 
 $query = "insert into category set
			 name_category 	='$name_category'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data category berhasil disimpan !!');
				document.location='cevent.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data category gagal disimpan !!');
				</script><?php
			 }
			 ?>
 

