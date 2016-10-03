<?php
$idmatrix  		= $_POST ['idmatrix'];
$event  		= $_POST ['event'];
$date  			= $_POST ['date'];
$category		= $_POST ['category'];
$company  		= $_POST ['company'];
$room  			= $_POST ['room'];
$location  		= $_POST ['location'];
$jml_pax  		= $_POST ['jml_pax'];
$setup  		= $_POST ['setup'];
$nama_marketing = $_POST ['nama_marketing'];
$nama_booking  	= $_POST ['nama_booking'];
$tlp_booking  	= $_POST ['tlp_booking'];
$tgl_booking  	= $_POST ['tgl_booking'];
$tgl_dp  		= $_POST ['tgl_dp'];
$status			= $_POST ['status'];
$comment 		= $_POST ['comment'];
$editdate		= gmdate("Y-m-d H:i:s", time()+60*60*7);

 //koneksi database
 include "koneksi.php";
 mysql_select_db("matrix");
 
 $query = "update matrix set
			 event ='$event', 
			 date ='$date', 
			 category = '$category',
			 company ='$company', 
			 room ='$room', 
			 location ='$location', 
			 jml_pax ='$jml_pax', 
			 setup ='$setup', 
			 nama_marketing ='$nama_marketing', 
			 nama_booking ='$nama_booking', 
			 tlp_booking ='$tlp_booking', 
			 tgl_booking='$tgl_booking', 
			 tgl_dp ='$tgl_dp', 
			 status ='$status', 
			 comment ='$comment',
			 editdate ='$editdate'
			 where idmatrix = '$idmatrix'"
			 ;
 
 
  	 $hasil = mysql_query($query);
			 if($hasil){?>
			 <script language="JavaScript">
				alert('Data event berhasil diedit !!');
				document.location='search.php';
			</script>
			<?php
			 }else{?>
			 <script language="JavaScript">
				alert('Data event gagal diedit !!');
				</script><?php
			 }
			 ?>
			 
