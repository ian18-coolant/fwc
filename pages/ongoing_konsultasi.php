<?php  


 
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;


   $sql23=$conn->query("SELECT COUNT(*) FROM answer_question WHERE nis='$_SESSION[username]'  ");
  $jmlans=$sql23->fetchColumn(); 
  $endstep=$jmlans+1;

$sqlget3=$conn->prepare("SELECT * FROM answer_question WHERE nis='$_SESSION[username]' AND urut='$hal'    ");
                              $sqlget3->execute(); 

        $data3=$sqlget3->fetch(PDO::FETCH_ASSOC) ;  

        	$idnya=$data3['aq_id'];

        	if($hal>=$jmlans){

        		$step="akhir";

        	}
        	else {
        		$step="on";
        	}


?>
<div class="container"> 
<div class="page-header">
<h1 align="center"><b>Konsultasi</b></h1> 
</div>
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title" align="center"><b>Jawablah pertanyaan dibawah ini! [<?php echo $hal."/".$jmlans ; ?>]   </b></h3></div>
<div class="panel-body" style="background-color: #535c68; color: #fff;">
<h3 align="center"><b><?php echo $data3['pertanyaan'] ; ?> </b></h3>
<form action="aksi.php?m=konsultasi" method="post">
<input type="hidden" name="kode_gejala" value="G002" />
<p align="center"> </p>
<p align="center">
	<br>
<button name="yes" class="btn tambah" value="Iya" type="button" onclick="upthis(this.value,'<?php echo $idnya ;?>','<?php echo $hal ;?>','<?php echo $step ;?>')"><span class="glyphicon glyphicon-ok-sign"></span> Iya</button>
<button name="no" class="btn tambah" value="Tidak" type="button" onclick="upthis(this.value,'<?php echo $idnya ;?>','<?php echo $hal ;?>','<?php echo $step ;?>')" ><span class="glyphicon glyphicon-remove-sign"></span> Tidak</button> 
<a class="btn edit" href="logout_new.php"><span class="glyphicon glyphicon-ban-circle"></span> Batal</a>
</p>
</form>
</div>
</div>
</div>  
<script type="text/javascript">
	
		function upthis(vals,idnya,hal,step){ 
			var halaman=parseInt(hal);
			hb=halaman+1;


			if(step=="akhir"){
				link="?p=end_result";
			}
			else {
				link="?p=ongoing_konsultasi&hal="+hb;
			}



  $.ajax({
          url : "pages/change_answer.php",
          type :"POST",
          data : {id:idnya, vals:vals}, 
          success:function(data){
 

                window.location.replace(link);


   
 
          }
        });
		}
</script>