  <?php    /* at the top of 'check.php' */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) { 
        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: https://strokerecovery.vision/pages-404.html' ) );

    } 
    
include('../include/koneksi.php');
include('../include/setting.php');
 session_start();
	$connection= new Connection();
	$conn=$connection->getConnection();
				
	$id=$_POST['id'];  
 
$sqlinsert2="DELETE FROM bidang_ekskul WHERE be_id='$id' ";
$conn->exec($sqlinsert2);
 
 
 
 


				?>