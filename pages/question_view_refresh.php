 <?php 
 
include('../include/koneksi.php');
session_start();

	$connection= new Connection();
	$conn=$connection->getConnection();
 
       $baris  = 100;
        $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $sql2=$conn->query("SELECT * FROM question   ORDER BY ques_id DESC  ");

        $total=$sql2->rowCount();
        $maks = ceil($total/$baris);
        $mulai  = $baris * ($hal-1); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT * FROM question  ORDER BY ques_id DESC   LIMIT $mulai,$baris ");
                              $sqlget3->execute(); 

        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
            $id=$data3['ques_id'];
            $no++;

                                       echo             "<tr> 
                                                        <td>
                                                            $no
                                                        </td>
                                                        <td>
                                                            
                                                             $data3[ques_desc] 
                                                        </td>
                                                        <td>
                                                            
                                                          $data3[ques_kriteria] 
                                                        </td>
  
                                                        
                                                        <td>
                                                            $data3[ques_type]
                                                        </td> 
                                                        <td>
                                                            $data3[ques_status]
                                                        </td>   
                                                        <td>  
                                                            <button type='button' class='btn btn-xs' title='Lihat Question' data-toggle='modal' data-target='#viewSiswa'  onclick='viewSiswa(\"$id\")'><i class='glyphicon glyphicon-file'></i></button>
                                                            <button type='button' class='btn btn-outline-primary btn-xs' title='Edit'  onclick='editSiswa(\"$id\")'><i class='glyphicon glyphicon-pencil'></i></button>
                                                            <button type='button' class='btn btn-outline-danger btn-xs' title='Hapus' onclick='deleteSiswa(\"$id\")'><i class='glyphicon glyphicon-trash'></i></button>
                                                        </td>
                                                    </tr>";



        }
        ?>
 