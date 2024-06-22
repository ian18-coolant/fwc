<?php
if(isset($_POST['simpan'])){
 
$id=uniqid(); 
$be=$_POST['iya']; 
$je=$_POST['je']; 
$pertanyaan=addslashes($_POST['pertanyaan']);  
$kriteria=addslashes($_POST['kriteria']);  
$status=$_POST['status'];  

 

//$tglconvert = date("dm",strtotime($tanggal));

//$buatuser =  preg_replace('/\s+/', '', $nama);
//$username = strtolower($buatuser).$tglconvert;
$sql="INSERT INTO question VALUES('$id','$pertanyaan','$kriteria','$je','$status')";
$insert=$conn->exec($sql);

 
    $sql781=$conn->prepare("SELECT * FROM tmp_qa");
        $sql781->execute();
    while($hasil781=$sql781->fetch(PDO::FETCH_ASSOC)) {

if($hasil781['checked']=="Iya"){
$sql2="INSERT INTO qa_y VALUES('','$id','$hasil781[be_id]')";
$insert2=$conn->exec($sql2);
}
else {

$sql2="INSERT INTO qa_t VALUES('','$id','$hasil781[be_id]')";
$insert2=$conn->exec($sql2);

}

}
 

if(!$sql) {
	echo "<script>alert(\"Data gagal disimpan!, silahkan ulangi\"); </script>";
}
else {

	echo "<script>alert(\"Data berhasil disimpan!\"); window.location.href='?p=question'</script>";
}

}

?>