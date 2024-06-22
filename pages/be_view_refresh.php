 <?php 
 
include('../include/koneksi.php');
session_start();

	$connection= new Connection();
	$conn=$connection->getConnection();
 
         $baris  = 100;
        $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $sql2=$conn->query("SELECT * FROM bidang_ekskul ORDER BY be_nama ASC  ");

        $total=$sql2->rowCount();
        $maks = ceil($total/$baris);
        $mulai  = $baris * ($hal-1); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT * FROM bidang_ekskul  ORDER BY be_nama ASC   LIMIT $mulai,$baris ");
                              $sqlget3->execute(); 

        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
            $id=$data3['be_id'];
            $no++;

                                       echo             "<tr> 
                                                        <td>
                                                            $no
                                                        </td>
                                                        <td>
                                                            
                                                           $data3[be_nama] 
                                                        </td>
  
                                                        
                                                        <td>
                                                            $data3[be_jenis]
                                                        </td>  
                                                        <td>  
                                                            <button type='button' class='btn btn-outline-primary btn-sm' title='Edit'  onclick='editSiswa(\"$id\")'><i class='glyphicon glyphicon-pencil'></i></button>
                                                            <button type='button' class='btn btn-outline-danger btn-sm' title='Hapus' onclick='deleteSiswa(\"$id\")'><i class='glyphicon glyphicon-trash'></i></button>
                                                        </td>
                                                    </tr>";


        }
        ?>
 