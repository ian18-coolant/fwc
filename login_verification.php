<?php
if(isset($_POST['login'])){
require_once('include/koneksi.php');

class ceklogin{
	function getceklogin(){
		$connection= new Connection();
		$conn=$connection->getConnection();
		$user=$_POST['username'];
		$pass=md5($_POST['password']);
		try{
			
$sa=$conn->query("SELECT COUNT(*) FROM user WHERE  email='$user' AND  password='$pass' AND  level='admin' OR username='$user' AND password='$pass' AND level='admin' ");
$admin=$sa->fetchColumn();


$sa1=$conn->query("SELECT COUNT(*) FROM user WHERE  email='$user' AND  password='$pass' AND  level='siswa' OR username='$user' AND password='$pass' AND level='siswa' ");
$pasien=$sa1->fetchColumn();

 
 
	if($admin==1){
		$sqlget3=$conn->prepare("SELECT * FROM user WHERE email='$user' OR username='$user' ");
                $sqlget3->execute(); 

                 $data3=$sqlget3->fetch(PDO::FETCH_ASSOC) ;
session_start();
		$_SESSION['username']=$data3['username']; 
		$_SESSION['level']="admin";
header("location:index.php");
}  
else if ($pasien==1){
		$sqlget3=$conn->prepare("SELECT * FROM user WHERE email='$user' OR username='$user' ");
                $sqlget3->execute(); 

                 $data3=$sqlget3->fetch(PDO::FETCH_ASSOC) ;
session_start();
		$_SESSION['username']=$data3['username']; 
		$_SESSION['level']="siswa";
header("location:index.php");

} 
	else{
		echo "<script>alert(\"Username atau Password tidak ada !\"); window.location.href='login.php';</script>)";
	}
		}
		catch (PDOException $e){
			echo "tidak ada : " .$e->getMessage();
			
		}
	}
}
$cek=new ceklogin();
$cek->getceklogin();
}
else {
	echo "<script>window.location.href='pages-404.html'</script>";
}
?>