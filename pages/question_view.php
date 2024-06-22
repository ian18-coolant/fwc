 <?php 
 
include('../include/koneksi.php');
session_start();
 

        $connection= new Connection();
        $conn=$connection->getConnection(); 
        $id=$_POST['id'];

        $output="<table class='table table-hover table-bordered' style='color:#000000 !important'>";

                              $sqlget3=$conn->prepare("SELECT * FROM question  WHERE ques_id='$id'  ");
                              $sqlget3->execute(); 

         $data3=$sqlget3->fetch(PDO::FETCH_ASSOC) ;
           
//get comment  
          $id=$data3['ques_id'];  
  

                $output.= "  
             
                <tr>
                    <td>Question ID</td>
                    <td>$data3[ques_id]</td>

                </tr> 
                <tr>
                    <td>Deskripsi</td>
                    <td>$data3[ques_desc]</td>

                </tr> 
                <tr> 
                <tr>
                    <td>Tipe</td>
                    <td>$data3[ques_type]</td>

                </tr> 
                <tr>
                    <td>Status</td>
                    <td>$data3[ques_status]</td>

                </tr>  
            
        "; 
                      $output .="</table>
                      <table class='table table-hover table-bordered' style='color:#000000 !important'>
                      <tr align='center'><td>No</td><td>Jawaban Iya</td></tr>" ;
                      $no=0;

$sqlget35=$conn->prepare("SELECT * FROM qa_y LEFT JOIN bidang_ekskul ON qa_y.be_id=bidang_ekskul.be_id  WHERE ques_id='$id'  ");
                              $sqlget35->execute(); 

        while($data35=$sqlget35->fetch(PDO::FETCH_ASSOC)){ 
            $no++;
            $output .="<tr><td>$no</td><td>$data35[be_nama]</td></tr>" ;


        }
        $output .="</table><table class='table table-hover table-bordered' style='color:#000000 !important'>
                      <tr align='center'><td>No</td><td>Jawaban Tidak</td></tr>" ;
                      $non=0;

$sqlget36=$conn->prepare("SELECT * FROM qa_t LEFT JOIN bidang_ekskul ON qa_t.be_id=bidang_ekskul.be_id  WHERE ques_id='$id'  ");
                              $sqlget36->execute(); 

        while($data36=$sqlget36->fetch(PDO::FETCH_ASSOC)){ 
            $non++;
            $output .="<tr><td>$non</td><td>$data36[be_nama]</td></tr>" ;


        }
        $output .="</table>"; 


                      echo $output;
                      ?>

