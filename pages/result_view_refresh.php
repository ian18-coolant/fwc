<?php
  
include('../include/koneksi.php');
session_start();

  $connection= new Connection();
  $conn=$connection->getConnection();
 
                                                  
         $baris  = 100;
        $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $sql2=$conn->query("SELECT * FROM hasil_record   ORDER BY tanggal DESC  ");

        $total=$sql2->rowCount();
        $maks = ceil($total/$baris);
        $mulai  = $baris * ($hal-1); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT * FROM hasil_record   ORDER BY tanggal DESC   LIMIT $mulai,$baris ");
                              $sqlget3->execute(); 

        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
            $id=$data3['record_id'];

                                       echo             "<tr> 
                                                        <td>
                                                             $data3[record_id] 
                                                        </td>
                                                        <td>
                                                            
                                                             $data3[tanggal] 
                                                        </td>
 
                                                        <td>
                                                            $data3[nis]  
                                                            </td>
                                                        
                                                        
                                                        <td>
                                                            $data3[nama_siswa]
                                                        </td> 
                                                        <td>
                                                           $data3[kesimpulan]   </td>
                                                       
                                                          
                                                        
                                                        
                                                        <td>
                                                            <button type='button' class='btn btn-outline-success btn-sm' title='Lihat Data' data-toggle='modal' data-target='#viewSiswa'  onclick='viewSiswa(\"$id\")'><i class='mdi mdi-file'></i></button>
  
                                                            <button type='button' class='btn btn-outline-danger btn-sm' title='Hapus' onclick='deleteSiswa(\"$id\")'><i class='mdi mdi-delete'></i></button>
                                                        </td>
                                                    </tr>";


        }
        ?>
                                                     
                                             