<?php
$name_room		= $_POST ['name_room'];
$location		= $_POST ['location'];

 //koneksi database
 include "koneksi.php";
 mysql_select_db("room");
 
 $query = "insert into room set
			 name_room 	='$name_room',
			 location	= '$location'" ;
 
 	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data room berhasil disimpan !!');
				document.location='room.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data room gagal disimpan !!');
				</script><?php
			 }
			 ?>
 

