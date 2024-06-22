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

    $sql333=$conn->prepare("SELECT * FROM hasil_record WHERE record_id='$id'");
    $sql333->execute();
    $hasil333=$sql333->fetch(PDO::FETCH_ASSOC);


$sqlinsert3="DELETE FROM hasil_record_detail WHERE record_id='$id' ";
$conn->exec($sqlinsert3);

$sqlinsert2="DELETE FROM answer_question_detail WHERE nis='$hasil333[nis]'  ";
$conn->exec($sqlinsert2);

$sqlinsert4="DELETE FROM answer_question WHERE nis='$hasil333[nis]' ";
$conn->exec($sqlinsert4);



$sqlinsert5="DELETE FROM user_answer WHERE nis='$hasil333[nis]'  ";
$conn->exec($sqlinsert5);

 
 
$sqlinsert6="DELETE FROM hasil_record WHERE record_id='$hasil333[record_id]' ";
$conn->exec($sqlinsert6);


$sqlinsert99="DELETE FROM biodata WHERE nis='$hasil333[nis]' ";
$conn->exec($sqlinsert699;
 


				?>