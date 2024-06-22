<?php

$ri=uniqid();


 $sql791=$conn->prepare("SELECT * FROM  biodata   WHERE nis='$_SESSION[username]' ");
        $sql791->execute();
         $hasil791=$sql791->fetch(PDO::FETCH_ASSOC);

 $sql72=$conn->prepare("SELECT * FROM  answer_question WHERE nis='$_SESSION[username]'");
        $sql72->execute();
         $hasil72=$sql72->fetch(PDO::FETCH_ASSOC);



 $sql75=$conn->prepare("SELECT * FROM  user_answer WHERE nis='$_SESSION[username]'");
        $sql75->execute();
         $hasil75=$sql75->fetch(PDO::FETCH_ASSOC);
         $tipe=$hasil75['tipe'];

 $sql7=$conn->prepare("SELECT * FROM  bidang_ekskul WHERE be_jenis='$tipe'");
        $sql7->execute();
         while($hasil7=$sql7->fetch(PDO::FETCH_ASSOC)){


   $sql24=$conn->query("SELECT COUNT(*) FROM answer_question_detail WHERE be_id='$hasil7[be_id]' AND nis='$_SESSION[username]'  ");
  $jmlbe=$sql24->fetchColumn(); 



$sql="INSERT INTO hasil_record_detail VALUES('','$ri','$hasil7[be_id]','$hasil7[be_nama]','$jmlbe')";
$insert=$conn->exec($sql);



         }

 
 


 $sql79=$conn->prepare("SELECT * FROM  hasil_record_detail   WHERE record_id='$ri' ORDER BY poin DESC");
        $sql79->execute();
         $hasil79=$sql79->fetch(PDO::FETCH_ASSOC);



$sql="INSERT INTO hasil_record VALUES('$ri','$hasil791[tanggal]','$_SESSION[username]','$hasil791[nama]','$hasil79[nama_ekskul]','$tipe')";
$insert=$conn->exec($sql);

echo "
<script>
window.location.replace('?p=hasil');
</script>
"


				 
	
?>