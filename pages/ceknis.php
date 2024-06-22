  <?php    
require_once('../include/koneksi.php'); 

$connection= new Connection();
$conn=$connection->getConnection();
 $output =""; 
 $user=$_POST['nis'];
 //$email="";

   $sql23=$conn->query("SELECT COUNT(*) FROM biodata WHERE nis='$user' ");
  $jmluser=$sql23->fetchColumn(); 
 
 if($jmluser==1){
 	$output.="<span class='text-danger'>Mohon maaf, NIS sudah terpakai, silahkan hubungi admin untuk mereset!</span><input type='hidden' value='1' id='nisval'>";
 }
 else {
 	$output.="<input type='hidden' value='0' id='nisval' name='nisval'>";

 }
 
echo $output;
 ?>