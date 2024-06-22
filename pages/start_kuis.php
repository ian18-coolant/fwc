  <?php     

include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 
 
$id=$_POST['id']; 



    $sql78=$conn->prepare("SELECT * FROM  user LEFT JOIN user_siswa ON user.username=user_siswa.username INNER JOIN siswa ON user_siswa.nis=siswa.nis WHERE user.username='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);




   $sql23=$conn->query("SELECT COUNT(*) FROM user_answer WHERE nis='$hasil78[nis]'  ");
  $jmlsiswa=$sql23->fetchColumn(); 

  if($jmlsiswa==0){


$sql3="INSERT INTO user_answer VALUES('','$hasil78[nis]','$id')";
$insert3=$conn->exec($sql3);





  }
  else {

$sqlinsert25="DELETE FROM user_answer  WHERE nis='$hasil78[nis]' ";
$conn->exec($sqlinsert25);

$sql3="INSERT INTO user_answer VALUES('','$hasil78[nis]','$id')";
$insert3=$conn->exec($sql3);

  }



$sqlinsert2="DELETE FROM answer_question  WHERE nis='$hasil78[nis]' ";
$conn->exec($sqlinsert2);
 

    $sql781=$conn->prepare("SELECT * FROM question WHERE ques_type='$id' AND ques_status='Aktif'");
        $sql781->execute();

        $no=0;
    while($hasil781=$sql781->fetch(PDO::FETCH_ASSOC)) {
      $idn=uniqid();
      
      $no++;

$sql="INSERT INTO answer_question VALUES('$idn','$hasil78[nis]','$hasil78[nama_siswa]','','$hasil781[ques_id]','$hasil781[ques_desc]','$no')";
$insert=$conn->exec($sql);




    } 
  

 
 
 

?>