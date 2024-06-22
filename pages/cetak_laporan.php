 <?php 
 
include('../include/koneksi.php');
session_start();
 

        $connection= new Connection();
        $conn=$connection->getConnection(); 
        $id=$_POST['id'];
        $no=0;

        $output="
        <h1 class='text-center'>LAPORAN HASIL KUISONER REKOMENDASI EKSTRAKULIKULER</h1></table><table class='table table-hover table-bordered'>
        <tr>  <th>Record ID</th> 
                                                        <th>NIS</th> 
                                                        <th>Nama</th> 
                                                        <th>J. Kelamin</th>
                                                        <th>Angkatan</th> 
                                                        <th>Tanggal</th> 
                                                        <th>Rekomendasi</th>     
        </tr>

        

        ";

  
        $sql2=$conn->query("SELECT hasil_record.*,biodata.jk,biodata.nis,biodata.jk,biodata.angkatan FROM hasil_record LEFT JOIN biodata ON hasil_record.nis=biodata.nis   ORDER BY biodata.tanggal DESC  ");

        $total=$sql2->rowCount(); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT hasil_record.*,biodata.jk,biodata.nis,biodata.jk,biodata.angkatan FROM hasil_record LEFT JOIN biodata ON hasil_record.nis=biodata.nis ORDER BY biodata.tanggal DESC ");
                              $sqlget3->execute(); 

        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
            $id=$data3['record_id'];
			$no++;
           
//get comment 
  
 
 


                        $output.= "   <tr> 
                                                        <td>
                                                             $no 
                                                        </td>
                                                        <td>
                                                            $data3[nis]  
                                                        </td>
                                                        <td>
                                                            $data3[nama_siswa]
                                                        </td> 
                                                        <td>
                                                            
                                                             $data3[jk] 
                                                        </td>
 
                                                        <td>
                                                            $data3[angkatan]  
                                                        </td> 
                                                        <td>
                                                            $data3[tanggal]  
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                           $data3[kesimpulan]   </td>

                </tr> 
            
        ";

                      }
                      $output .="</table>" ;

                      echo $output;
                      ?>

