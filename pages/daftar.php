<?php

require_once('../include/koneksi.php');  

                $connection= new Connection();
                $conn=$connection->getConnection();
if(isset($_POST['simpan'])){

	if($_POST['nisval']=="0" ){
 

$nama=addslashes($_POST['nama']); 
$jk=$_POST['jk']; 
$nis=$_POST['nis']; 
$angkatan=$_POST['angkatan'];
$tgl=$_POST['tgl']; 


//$tglconvert = date("dm",strtotime($tanggal));

//$buatuser =  preg_replace('/\s+/', '', $nama);
//$username = strtolower($buatuser).$tglconvert;
$sql="INSERT INTO biodata VALUES('$nis','$nama','$angkatan', '$jk','$tgl')";
$insert=$conn->exec($sql);
 
session_start();
		$_SESSION['username']=$nis; 
		$_SESSION['level']="siswa";
header("location:../index.php?p=mulai_konsultasi");

}

else {

header("location:../index.php?p=biodata");

}

}
?>



 