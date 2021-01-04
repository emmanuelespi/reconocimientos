<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link, "reconocimiento");
if(mysqli_connect_errno()){
	printf("Conexión no establecida %s\n", mysqli_connect_errno());
	exit();
}
?>