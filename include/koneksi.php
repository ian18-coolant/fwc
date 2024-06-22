<?php
class Connection  {
	function getConnection() {
		
$host="localhost";
$user="root";
$pass="";
$db="ian_db";
		try {
			$conn=new PDO ("mysql:host=$host;dbname=$db", $user, $pass);
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}
		catch(PDOException $e){
			echo "Gagal Koneksi : " .$e->getMessage();
		}
		
	}
	
}
?>