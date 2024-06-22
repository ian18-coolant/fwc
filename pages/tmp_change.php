  <?php     

include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 
 
$id=$_POST['id']; 
 

    $sql781=$conn->prepare("SELECT * FROM tmp_qa WHERE be_id='$id'");
        $sql781->execute();
    $hasil781=$sql781->fetch(PDO::FETCH_ASSOC);
    if($hasil781['checked']=="Tidak"){
    	$up="Iya";
    }
    else {
    	$up="Tidak";
    }


$sql="UPDATE tmp_qa SET checked='$up' WHERE be_id='$id'";
$insert=$conn->exec($sql);
 

 
 
 

?>