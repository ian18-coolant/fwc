  <?php    /* at the top of 'check.php' */
 

include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 


$sqlinsert2="DELETE FROM tmp_qa ";
$conn->exec($sqlinsert2);


  $id=$_POST['id']; 
    $sql781=$conn->prepare("SELECT * FROM bidang_ekskul WHERE be_jenis='$id'");
        $sql781->execute();
    while($hasil781=$sql781->fetch(PDO::FETCH_ASSOC)) {


$sql2="INSERT INTO tmp_qa VALUES('','$hasil781[be_id]','$hasil781[be_nama]','Tidak')";
$insert2=$conn->exec($sql2);


 
 
  
            echo " <input type='checkbox' name='iya[]' id='iyadeh$hasil781[be_id]' value='$hasil781[be_id]' onclick='tescek(\"$hasil781[be_id]\")'> $hasil781[be_nama] <br> " ;
          }
 

?>