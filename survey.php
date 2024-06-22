<?php 
require_once('include/koneksi.php'); 
require_once('include/setting.php'); 
require_once('include/function.php'); 
session_start();
date_default_timezone_set("Asia/Jakarta");
$tanggal=date("Y-m-d H:i:s");

                $connection= new Connection();
                $conn=$connection->getConnection();
                if (empty($_SESSION['username'])) {
 header("location:login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {


    $sql78=$conn->prepare("SELECT * FROM  user LEFT JOIN user_siswa ON user.username=user_siswa.username INNER JOIN siswa ON user_siswa.nis=siswa.nis WHERE user.username='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);


   $sql23=$conn->query("SELECT COUNT(*) FROM answer_question  ");
  $jmlans=$sql23->fetchColumn(); 
  $tp=$jmlans+1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Hasil Kuisoner</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "index.php"
    }
    </script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 8000)" style="background-color:#fff;">
<?php

$ri=uniqid();




 $sql72=$conn->prepare("SELECT * FROM  answer_question WHERE nis='$hasil78[nis]'");
        $sql72->execute();
         $hasil72=$sql72->fetch(PDO::FETCH_ASSOC);



 $sql75=$conn->prepare("SELECT * FROM  user_answer WHERE nis='$hasil78[nis]'");
        $sql75->execute();
         $hasil75=$sql75->fetch(PDO::FETCH_ASSOC);
         $tipe=$hasil75['tipe'];

 $sql7=$conn->prepare("SELECT * FROM  bidang_ekskul WHERE be_jenis='$tipe'");
        $sql7->execute();
         while($hasil7=$sql7->fetch(PDO::FETCH_ASSOC)){


   $sql24=$conn->query("SELECT COUNT(*) FROM answer_question_detail WHERE be_id='$hasil7[be_id]' AND nis='$hasil78[nis]'  ");
  $jmlbe=$sql24->fetchColumn(); 



$sql="INSERT INTO hasil_record_detail VALUES('','$ri','$hasil7[be_id]','$hasil7[be_nama]','$jmlbe')";
$insert=$conn->exec($sql);



         }

 
 


 $sql79=$conn->prepare("SELECT * FROM  hasil_record_detail   WHERE record_id='$ri' ORDER BY poin DESC");
        $sql79->execute();
         $hasil79=$sql79->fetch(PDO::FETCH_ASSOC);



$sql="INSERT INTO hasil_record VALUES('$ri','$tanggal','$hasil78[nis]','$hasil78[nama_siswa]','$hasil79[nama_ekskul]','$tipe')";
$insert=$conn->exec($sql);


				 
	
?>
<!-- END SEND MAIL SCRIPT -->   

<div id="success">
    <div class="icon icon--order-success svg">
         <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
          <g fill="none" stroke="#8EC343" stroke-width="2">
             <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
             <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
          </g>
         </svg>
     </div>
	<h4><span>Jawaban sudah terkirim!</span>Terima kasih telah meluangkan waktu untuk mengisi</h4>
	<small>Kamu akan diarahkan ke beranda dalam 5 detik.</small>
</div>
</body>
</html>
<?php 
}
?>