  <?php   
      if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) { 
        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: http://localhost/dokter/pages-404.html' ) );
    } ;
require_once('include/koneksi.php'); 

$connection= new Connection();
$conn=$connection->getConnection();
 $output =""; 
 $user=$_POST['user'];
 //$email="";

   $sql23=$conn->query("SELECT COUNT(*) FROM siswa WHERE nis='$user' ");
  $jmluser=$sql23->fetchColumn(); 
 
 if($jmluser==1){
 	$output.="<span class='text-danger'>Mohon maaf, NIS sudah terpakai!</span><input type='hidden' value='1' id='nisval'>";
 }
 else {
 	$output.="<input type='hidden' value='0' id='nisval'>";

 }
 
echo $output;
 ?>