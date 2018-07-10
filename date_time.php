<?php 
date_default_timezone_set("Asia/Jakarta");
	echo date("H m i s d m y");
	$hr	= ["Minggu","Senen","Selasa","Rabu","Kamis","Jumat","Sabtu"];
	echo $hr[(int)date("w")];
?>