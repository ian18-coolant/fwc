<?php  
require_once('../include/koneksi.php');  

session_start();

  $connection = new Connection();
  $conn=$connection->getConnection(); 

$sqlget38=$conn->prepare("SELECT * FROM hasil_record WHERE  nis='$_SESSION[username]'");
                              $sqlget38->execute(); 


      $data38=$sqlget38->fetch(PDO::FETCH_ASSOC);


   $sql23=$conn->query("SELECT SUM(poin) FROM hasil_record_detail WHERE record_id='$data38[record_id]'   ");
  $jmlpoin=$sql23->fetchColumn(); 

$sqlget380=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE  record_id='$data38[record_id]'");
                              $sqlget380->execute(); 


        while($data380=$sqlget380->fetch(PDO::FETCH_ASSOC)){ 
            $ekskul=$data380['nama_ekskul'];
            $poin2 =$data380['poin']*100;
            $poin=round($poin2/$jmlpoin);

    $return_arr[] = array("nama" => $ekskul,
                    "jumlah" => $poin
                    );




            }    
 echo json_encode($return_arr);

?>