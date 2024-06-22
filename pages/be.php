<?php

$pencarianSQL = "";

        # PENCARIAN DATA 
        if(isset($_POST['btnCari'])) {
        $txtKataKunci = trim($_POST['txtKataKunci']);

        // Menyusun sub query pencarian
        $pencarianSQL = "WHERE  be_nama LIKE '%$txtKataKunci%'";
          } 

        # Teks pada form
        $dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';
?>


<div class="container">
<body class="latar">
<div class="page-header">
<br>
<br>
<h1 style="color: #fff;" align="center"><b>Bidang Ekstrakurikuler</b></h1>
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
<a class="btn tambah" href="#" onclick="tambahSiswa()"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
</div></span>
</form>
</div>

<div class="table-responsive" id="tablenya">
<table class="table table-bordered table-hover" style="color:#000000 !important">
  <thead>
    <tr > 
        <th>No</th>
        <th>Nama Ekstrakulikuler</th>
        <th>Jenis</th>    
        <th>Action</th>
      </tr>
   </thead>
   <tbody id="listSiswa">
                                                     <?php 
         $baris  = 100;
        $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
        $sql2=$conn->query("SELECT * FROM bidang_ekskul $pencarianSQL ORDER BY be_nama ASC  ");

        $total=$sql2->rowCount();
        $maks = ceil($total/$baris);
        $mulai  = $baris * ($hal-1); 
        $no=0;

                              $sqlget3=$conn->prepare("SELECT * FROM bidang_ekskul $pencarianSQL ORDER BY be_nama ASC   LIMIT $mulai,$baris ");
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
                                                     
                                                     
                                                </tbody>

</table>
</div>




</div>
</body>
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
              url:"pages/be_delete.php",
              type:"POST",
              data:{id:c}, 
              success:function(data){
                $("#listSiswa").load("pages/be_view_refresh.php");
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

 
 

                       function tambahSiswa(){
                        window.location.href="?p=be_add";
                       }
                       function editSiswa(ida){
                        window.location.href="?p=be_edit&&id="+ida ;
                       }
                   </script>