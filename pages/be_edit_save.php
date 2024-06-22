<?php
if(isset($_POST['simpan'])){
 
$id=$_POST['ida'];
$nama=addslashes($_POST['nama']); 
$je=$_POST['je'];  

//$tglconvert = date("dm",strtotime($tanggal));

//$buatuser =  preg_replace('/\s+/', '', $nama);
//$username = strtolower($buatuser).$tglconvert;
$sql="UPDATE bidang_ekskul SET be_nama='$nama', be_jenis='$je' WHERE be_id='$id'";
$insert=$conn->exec($sql);

 

if(!$sql) {
	echo "<script>alert(\"Data gagal disimpan!, silahkan ulangi\"); </script>";
}
else {

	echo "<script>alert(\"Data berhasil disimpan!\"); window.location.href='?p=be'</script>";
}

}

?>