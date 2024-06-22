<?php 
 
?>
<div class="container"> 
<div class="page-header">
<h1 align="center"><b>Konsultasi</b></h1> 
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title" align="center"><b>Jawablah pertanyaan berikut ini!  </b></h3></div>
<div class="panel-body" style="background-color: #535c68; color: #fff;">
<h3 align="center"><b>Silahkan Pilih Untuk Konsultasi Ekskul Wajib / Tidak Wajib</b></h3>
<form action="aksi.php?m=konsultasi" method="post">
<input type="hidden" name="kode_gejala" value="G002" />
<p align="center"><strong>Wajib</strong> (Pramuka, Paskibra, PMR, Rohis)<br>
	<strong>Tidak Wajib</strong> (Volly, Silat, English Club, Desain Grafis, Seni Tari)<br></p>
<p align="center">
	<br>
<button name="yes" class="btn tambah" value="1" type="button" onclick="wajib()"><span class="glyphicon glyphicon-ok-sign"></span> Wajib</button>
<button name="no" class="btn tambah" value="1" type="button" onclick="twajib()" ><span class="glyphicon glyphicon-ok-sign"></span> Tidak Wajib</button> 
<a class="btn edit" href="logout_new.php"><span class="glyphicon glyphicon-ban-circle"></span> Batal</a>
</p>
</form>
</div>
</div>
</div>  
<script type="text/javascript">
	
		function wajib(){

			var ida="Wajib" ;


  $.ajax({
          url : "pages/start_kuis2.php",
          type :"POST",
          data : {id:ida}, 
          success:function(data){

	window.location.replace("?p=ongoing_konsultasi&hal=1");
   
 
          }
        });


		}


		function twajib(){

			var ida="Tidak Wajib" ;


  $.ajax({
          url : "pages/start_kuis2.php",
          type :"POST",
          data : {id:ida}, 
          success:function(data){
          	
	window.location.replace("?p=ongoing_konsultasi&hal=1");
   
 
          }
        });


		}
</script>