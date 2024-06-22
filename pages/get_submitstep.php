<?php


include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 

    $sql78=$conn->prepare("SELECT * FROM  user LEFT JOIN user_siswa ON user.username=user_siswa.username INNER JOIN siswa ON user_siswa.nis=siswa.nis WHERE user.username='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);


   $sql23=$conn->query("SELECT COUNT(*) FROM answer_question  ");
  $jmlans=$sql23->fetchColumn(); 
  $tp=$jmlans+1;

$output="";

									$output .="<h3 class='main_question'><strong> $tp/$tp </strong>Rangkuman</h3>
									<div class='summary'>
										<ul>"; 
											$noo=0 ;
											 $sqlget31=$conn->prepare("SELECT * FROM answer_question WHERE nis='$hasil78[nis]'  ");
                              $sqlget31->execute(); 

        while($data31=$sqlget31->fetch(PDO::FETCH_ASSOC)){  
        	$noo++;

        	$output.= "<li><strong>1</strong>
												<h5>$data31[pertanyaan]</h5>
												<p>$data31[jawaban]</p>
											</li>";
        } 
											 
									$output .="</ul>
									</div>";

echo $output;

?>