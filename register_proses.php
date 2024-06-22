
<html>
<head>
<title>Verifikasi Pendaftaran</title>
</head>
<body>
<?php    /* at the top of 'check.php' */
 

include('include/koneksi.php');
 session_start();
 date_default_timezone_set("Asia/Jakarta");
 

	$connection = new Connection();
	$conn=$connection->getConnection(); 
 

   $tanggal=date("Y-m-d H:i:s");
 
$jk=$_POST['jk']; 
$nis=$_POST['nis']; 
$tempat=$_POST['tempat']; 
$tanggal=$_POST['tanggal'];   
$kelas=$_POST['kelas']; 

   $email=$_POST['email']; 
   $user=addslashes($_POST['user']);  
   $nama=addslashes($_POST['nama']);     
   $password=md5($_POST['password']);  
   $pin=str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
			//$tanggal="2022-06-01";   
 
 

 

$sql="INSERT INTO siswa VALUES('$nis','$nama','$jk', '$tempat','$tanggal','$kelas','$password','$email')";
$insert=$conn->exec($sql);


$sql2="INSERT INTO user_siswa VALUES('','$nis','$user')";
$insert2=$conn->exec($sql2);

$sql3="INSERT INTO user VALUES('','$user','$password','$nama','$email','siswa')";
$insert3=$conn->exec($sql3);



      if ($sqInsert2){
         echo "Pendaftaran berhasil!";
      }
 else {

					echo "Pendaftaran gagal!";

         }  
					
					?>

</body>
</html>