<?php
include('../include/koneksi.php');
session_start();
 
  $connection = new Connection();
  $conn=$connection->getConnection(); 
 
        $sqlget35=$conn->prepare("SELECT * FROM hasil_record  WHERE nis='$_SESSION[username]' ");
                              $sqlget35->execute(); 
                              $data35=$sqlget35->fetch(PDO::FETCH_ASSOC);






   $sql23=$conn->query("SELECT SUM(poin) FROM hasil_record_detail WHERE record_id='$data35[record_id]'   ");
  $jmlpoin=$sql23->fetchColumn(); 

$sqlget380=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE  record_id='$data35[record_id]'");
                              $sqlget380->execute(); 


        while($data380=$sqlget380->fetch(PDO::FETCH_ASSOC)){ 
            $ekskul=$data380['nama_ekskul'];
            $poin2 =$data380['poin']*100;
            $poin=$poin2/$jmlpoin;

    $return_arr[] = array("label" => $ekskul,"symbol"=>$ekskul,
                    "y" => $poin
                    );




            }    



?>
<!doctype html>
<html>
<head>
<title>Laporan Hasil Konsultasi</title>
<script src="../assets/js/jquery.min.js"></script> 
  <script src="../js/Chart.js"></script>
  <script src="../js/canvasjs.min.js"></script>
  <script type="text/javascript">
     var xValues = [];
  var yValues = [];
  var color = '#';
  var barColors = [];


  jQuery().ready(function (){

                  
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: "Persentase Rekomendasi Ekstrakurikuler"
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0.0\"%\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($return_arr, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

                     setTimeout(function (){ 
               window.print();
    }, 2000);
                    
                }); 
  </script>

<style>
body{
    font-family: Verdana;
    font-size: 13px;
}
h1{
    font-size: 14px;
    border-bottom: 4px double #000;
    padding:3px 0;
}
table{
    border-collapse: collapse;   
    margin-bottom: 10px; 
}
td, th{
    border: 1px solid #000;
    padding: 3px;
}
.wrapper{
    margin: 0 auto;
    width: 980px;
}
</style>
</head>
<body>
<div class="wrapper">
<h1 align="center" style="font-size: 30px"><p>HASIL ANALISA<br>SISTEM PAKAR REKOMENDASI EKSTRAKURIKULER</p></h1>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><b>Biodata Konsultasi</b></h3>
</div>
<table class="table table-bordered table-hover">
<thead>
<tr style="color: #000000;">
<th>NIS</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Angkatan</th>
<th>Tanggal</th>
</tr></thead>
<?php
        $sqlget356=$conn->prepare("SELECT * FROM biodata  WHERE nis='$_SESSION[username]' ");
                              $sqlget356->execute(); 
                              $data356=$sqlget356->fetch(PDO::FETCH_ASSOC);


                              echo "<tr><td>$data356[nis]</td><td>$data356[nama]</td><td>$data356[jk]</td><td>$data356[angkatan]</td><td>$data356[tanggal]</td></tr>" ;
 
?> 
</table>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><b>Kriteria Terpilih</b></h3>
<table class="table table-bordered table-hover">
<thead>
<tr style="color: #000000;">
<th>No</th>
<th>Nama Kriteria</th>
</tr>
</thead>

<?php
$noo=0;
 $sqlget38=$conn->prepare("SELECT * FROM answer_question  WHERE  nis='$_SESSION[username]' AND jawaban='Iya' ");
                              $sqlget38->execute(); 


        while($data38=$sqlget38->fetch(PDO::FETCH_ASSOC)){ 
        $noo++; 

        echo  "<tr>
<td>$noo</td>
<td>$data38[kriteria]</td>
</tr>";
}
        ?> 
</table>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Hasil Analisa</h3>

<div class="panel-body">
<table class="table table-bordered">
<tr>
<td>Ekskul Rekomendasi</td>
<td><b><?php echo $data35['kesimpulan'] ;?></b></td>
</tr> 
<tr>
<td>Urutan Ekskul Rekomendasi</td>
<td><?php 
$ni=0;
$sqlget380=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE  record_id='$data35[record_id]' ORDER BY poin DESC ");
                              $sqlget380->execute(); 


        while($data380=$sqlget380->fetch(PDO::FETCH_ASSOC)){ 
          $ni++;

echo "$ni.$data380[nama_ekskul] <br>";
        } 
        ?>
</td>
</tr>
</table>

<div  style="text-align: center">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>


</div>
</body>
</html>