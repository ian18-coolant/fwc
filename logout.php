<?php
 	session_start(); // memulai session
	session_unset();
 	session_destroy(); // menghapus session
 	header("location:index.php"); // mengambalikan ke form_login.php
?>