<?php

$pencarianSQL = "";

        # PENCARIAN DATA 
        if(isset($_POST['btnCari'])) {
        $txtKataKunci = trim($_POST['txtKataKunci']);

        // Menyusun sub query pencarian
        $pencarianSQL = "WHERE record_id='$txtKataKunci' OR nis='$txtKataKunci' OR nama_siswa LIKE '%$txtKataKunci%'";
          } 

        # Teks pada form
        $dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';
?>
<div class="container">
<body class="latar">
<div class="page-header">
<br>
<br>
<h1 style="color: #fff;" align="center"><b>Laporan Konsultasi</b></h1>
</div>
<div class="panel panel-default">
<div class="panel-heading" align="right">
<form class="form-inline"  method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
 
<div class="form-group">
<input class="form-control" type="text" placeholder="Pencarian. . ." name="txtKataKunci" value />
</div>
<div class="form-group">
<button class="btn tambah" name="btnCari"><span class="glyphicon glyphicon-search"></span></button>
</div>
<span class="pull-left">
<div class="form-group"> 
  <a class="btn tambah" href="#" onclick="cetaklaporan()"><span class="glyphicon glyphicon-printer"></span> Cetak</a>
</div></span>
</form>
</div>
                   
                   <div class="table-responsive">
                          <table class="table table-centered table-nowrap table-hover mb-0" style="color:#000000 !important">
                           <thead>
                               <tr>  
                                                        <th scope="col">Record ID</th>
                                                        <th scope="col">NIS</th> 
                                                        <th scope="col">Nama</th> 
                                                        <th scope="col">J. Kelamin</th> 
                                                        <th scope="col">Angkatan</th> 
                                                        <th scope="col">Tanggal</th> 
                                                        <th scope="col">Rekomendasi</th>      
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="listSiswa">
                                                     <?php 
         $baris  = 1000;
        $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $sql2=$conn->query("SELECT hasil_record.*,biodata.jk,biodata.nis,biodata.jk,biodata.angkatan FROM hasil_record LEFT JOIN biodata ON hasil_record.nis=biodata.nis  $pencarianSQL ORDER BY biodata.tanggal DESC  ");

        $total=$sql2->rowCount();
        $maks = ceil($total/$baris);
        $mulai  = $baris * ($hal-1); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT hasil_record.*,biodata.jk,biodata.nis,biodata.jk,biodata.angkatan FROM hasil_record LEFT JOIN biodata ON hasil_record.nis=biodata.nis $pencarianSQL ORDER BY biodata.tanggal DESC   LIMIT $mulai,$baris ");
                              $sqlget3->execute(); 

        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
            $id=$data3['record_id'];
            $no++;

                                       echo             "<tr> 
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
                                                       
                                                          
                                                        
                                                        
                                                        <td>
                                                            <button type='button' class='btn btn-outline-success btn-xs' title='Lihat Data' data-toggle='modal' data-target='#viewSiswa'  onclick='viewSiswa(\"$id\")'><i class='glyphicon glyphicon-file'></i></button>
  
                                                            <button type='button' class='btn btn-outline-danger btn-xs' title='Hapus' onclick='deleteSiswa(\"$id\")'><i class='glyphicon glyphicon-trash'></i></button>
                                                        </td>
                                                    </tr>";


        }
        ?>
                                                     
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> 

                        <div class="modal fade" id="viewSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                           <div class="modal-content" >
                       
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body" id="siswaContent"> 


                             </div> 
                           </div>
                         </div>
                       </div>

                            <div class="modal fade" id="viewRiwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content" >
                       
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Data History Kuisoner</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body" id="riwayatContent"> 


                             </div> 
                           </div>
                         </div>
                       </div>
                        <!-- end row -->
                        
                   <script type="text/javascript">
                    function deleteSiswa(as){
    var c = as;
     swal.fire({
  title: "Apakah anda yakin?",
  text: "Jika dihapus, data tidak bisa dikembalikan!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Tidak',
  confirmButtonText: 'Ya, Hapus!'
})
.then((result) => {
  if (result.isConfirmed) {
    $.ajax({
              url:"pages/result_delete.php",
              type:"POST",
              data:{id:c}, 
              success:function(data){
                $("#listSiswa").load("pages/result_view_refresh.php");
               let timerInterval
Swal.fire({
  title: 'Data berhasil dihapus!', 
  timer: 1000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
 /*   console.log('I was closed by the timer') */
  }
})
              }
            });



  } else { 

  }
}); 
  }


function viewSiswa(id){
  var idp = id;

  $.ajax({
          url : "pages/result_view.php",
          type :"POST",
          data : {id:idp}, 
          success:function(data){
  
            $("#siswaContent").html(data); 

          }
        });

}


function viewRiwayat(id){
  var idp = id;

  $.ajax({
          url : "pages/riwayat_view.php",
          type :"POST",
          data : {id:idp}, 
          success:function(data){
  
            $("#riwayatContent").html(data); 

          }
        });

}

function cetaklaporan(){
          $.ajax({
            url:"pages/cetak_laporan.php",
            type:"POST",
            data:{id:"id"},
            success:function(data){
              $("#printarea").html(data);

        $.print("#printarea"); 
          }

          });
        }

                       function tambahSiswa(){
                        window.location.href="?p=siswa_add";
                       }
                       function editSiswa(ida){
                        window.location.href="?p=siswa_edit&&id="+ida ;
                       }




                   </script>