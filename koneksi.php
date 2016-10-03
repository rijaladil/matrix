<?php
$server ="localhost";
$username ="root";
$password ="123asd456";
$database ="db_matrix";
mysql_connect("$server","$username","$password")or die("Gagalx");
mysql_select_db("$database")or die("Database tidak ditemukan");
?>
