<?php  
date_default_timezone_set('Asia/Jakarta');
$tanggal=date('d-M-Y');
$today=date('Y-m-d');
 
$passl=md5($_POST['passl']);
$passb=$_POST['passb']; 
$passk=$_POST['passk']; 
$passbc=md5($passb);


                $connection= new Connection();
                $conn=$connection->getConnection();
    $sql79=$conn->prepare("SELECT * FROM user WHERE username='$_SESSION[username]'");
        $sql79->execute();
    $admin=$sql79->fetch(PDO::FETCH_ASSOC);



 
$pass = $admin['password'];
$username= $admin['username'];

// 
if ( $passl == $pass AND $passb==$passk){
	$sqInsert="UPDATE user SET password='$passbc'  WHERE username='$_SESSION[username]'";
				$conn->exec($sqInsert);
	
	?>
	<script>
		alert("Perubahan Berhasil");
		window.location.href="?p=password";
</script>
<?php }
else {
	?>
	<script>
alert("Password Lama / Konfirmasi Password Salah ! Silahkan Coba Lagi !");
window.location.href="?p=password";
</script>
<?php } ?>
