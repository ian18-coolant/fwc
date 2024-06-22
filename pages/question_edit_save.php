<?php
if(isset($_POST['simpan'])){
 
   
$ida=$_POST['ida']; 
$je=$_POST['je']; 
$pertanyaan=addslashes($_POST['pertanyaan']);  
$kriteria=addslashes($_POST['kriteria']);  
$status=$_POST['status'];  

 

//$tglconvert = date("dm",strtotime($tanggal));

//$buatuser =  preg_replace('/\s+/', '', $nama);
//$username = strtolower($buatuser).$tglconvert;
$sql="UPDATE question SET ques_desc='$pertanyaan' ,ques_type='$je',ques_status='$status',ques_kriteria='$kriteria' WHERE ques_id='$ida'";
$insert=$conn->exec($sql);

 
 

if(!$sql) {
	echo "<script>alert(\"Data gagal disimpan!, silahkan ulangi\"); </script>";
}
else {

	echo "<script>alert(\"Data berhasil disimpan!\"); window.location.href='?p=question'</script>";
}

}

?>