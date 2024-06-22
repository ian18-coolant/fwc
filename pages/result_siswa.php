<?php

    $sql78=$conn->prepare("SELECT * FROM  user LEFT JOIN user_siswa ON user.username=user_siswa.username INNER JOIN siswa ON user_siswa.nis=siswa.nis WHERE user.username='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);

$pencarianSQL = "WHERE nis='$hasil78[nis]'";

        # PENCARIAN DATA 
        if(isset($_POST['btnCari'])) {
        $txtKataKunci = trim($_POST['txtKataKunci']);

        // Menyusun sub query pencarian
        $pencarianSQL = "WHERE record_id='$txtKataKunci' AND nis='$hasil78[nis]'  OR nis='$txtKataKunci' AND nis='$hasil78[nis]' OR nama_siswa LIKE '%$txtKataKunci%' AND nis='$hasil78[nis]'";
          } 

        # Teks pada form
        $dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';
?>
   <div class="row">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-body"> 
                   <div class="row">
                       <div class="col-12">
                           <div class="page-title-box d-flex align-items-center justify-content-between"> 
                           <div class="page-title-right">
                            <button class="btn btn-success" type="button" onclick="cetak()"><i class="mdi mdi-printer"></i> Cetak</button>
 
                           </div>
                           
                           </div>
                       </div>
                   
                   <div class="table-responsive" id="tablecetak">
                    <?php
                         echo "<table class='table table-hover table-bordered'>";


        $sqlget35=$conn->prepare("SELECT * FROM hasil_record WHERE nis='$hasil78[nis]' ");
                              $sqlget35->execute(); 
                              $data35=$sqlget35->fetch(PDO::FETCH_ASSOC);



                        echo "  
             
                <tr>
                    <td>Record ID</td>
                    <td>$data35[record_id]</td>

                </tr> 
                <tr>
                    <td>NIS</td>
                    <td>$data35[nis]</td>

                </tr> 
                <tr> 
                <tr>
                    <td>Nama Siswa</td>
                    <td>$data35[nama_siswa]</td>

                </tr>

                <tr>
                    <td>Jenis Ekskul</td>
                    <td>$data35[hr_tipe]</td>

                </tr>
                <tr>
                    <td>Kesimpulan</td>
                    <td>$data35[kesimpulan]</td>

                </tr> </table><table class='table table-hover table-bordered'>
                <tr><td>No</td><td>Nama Ekskul</td><td>Poin</td></tr>";
$no=0;
                              $sqlget3=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE record_id='$data35[record_id]'  ");
                              $sqlget3->execute(); 


        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
        $no++; 
           
//get comment 
  
 
 


                        echo "  
             
                <tr> 
                    <td>$no</td> 
                    <td>$data3[nama_ekskul]</td>
                    <td>$data3[poin]</td>

                </tr> 
            
        ";

                      }
                      echo "</table> Rincian Kuisoner <table class='table table-hover table-bordered'>
                <tr><td>No</td><td>Pertanyaan</td><td>Jawaban</td></tr>";
$no=0;
                              $sqlget38=$conn->prepare("SELECT * FROM answer_question  WHERE nis='$data35[nis]'  ");
                              $sqlget38->execute(); 


        while($data38=$sqlget38->fetch(PDO::FETCH_ASSOC)){ 
        $no++; 
           
//get comment 
  
 
 


                        echo "  
             
                <tr> 
                    <td>$no</td> 
                    <td>$data38[pertanyaan]</td>
                    <td>$data38[jawaban]</td>

                </tr> 
            
        ";

                      }
                      echo "</table>" ; 


                      ?>
                                        </div>
                                    </div>
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
              url:"pages/siswa_delete.php",
              type:"POST",
              data:{id:c}, 
              success:function(data){
                $("#listSiswa").load("pages/siswa_view_refresh.php");
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
          url : "pages/siswa_view.php",
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

function cetak(){
  $.print("#tablecetak"); 

}

                       function tambahSiswa(){
                        window.location.href="?p=siswa_add";
                       }
                       function editSiswa(ida){
                        window.location.href="?p=siswa_edit&&id="+ida ;
                       }
                   </script>