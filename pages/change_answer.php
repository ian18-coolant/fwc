  <?php     

include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 

  
    $sql78=$conn->prepare("SELECT * FROM  biodata   WHERE nis='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);
 
$id=$_POST['id']; 
$vals=$_POST['vals'];


      //pertama

            $sql1="UPDATE answer_question SET jawaban='$vals' WHERE aq_id='$id'";
            $insert1=$conn->exec($sql1);



        $sql7=$conn->prepare("SELECT * FROM  answer_question WHERE aq_id='$id'");
        $sql7->execute();
         $hasil7=$sql7->fetch(PDO::FETCH_ASSOC);


   $sql23=$conn->query("SELECT COUNT(*) FROM answer_question_detail WHERE aq_id='$id' ");
  $jmlsiswa=$sql23->fetchColumn(); 

  if($jmlsiswa==0){
    if($vals=="Iya"){



            //

        $sql781=$conn->prepare("SELECT * FROM qa_y WHERE ques_id='$hasil7[ques_id]'");
        $sql781->execute();
        while($hasil781=$sql781->fetch(PDO::FETCH_ASSOC)){


            $sql="INSERT INTO answer_question_detail VALUES('','$id','$hasil781[be_id]','$_SESSION[username]')";
            $insert=$conn->exec($sql);



        }


    }
    else {

 

          $sqlinsert2="DELETE FROM answer_question_detail  WHERE aq_id='$id' ";
          $conn->exec($sqlinsert2);

            //

        $sql781=$conn->prepare("SELECT * FROM qa_t WHERE ques_id='$hasil7[ques_id]'");
       $sql781->execute();
       while($hasil781=$sql781->fetch(PDO::FETCH_ASSOC)){


            $sql="INSERT INTO answer_question_detail VALUES('','$id','$hasil781[be_id]','$hasil78[nis]')";
            $insert=$conn->exec($sql);



        }



    }


  }
 
 
 

 
 
 

?>