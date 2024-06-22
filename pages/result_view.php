 <?php 
 
include('../include/koneksi.php');
session_start();
 

        $connection= new Connection();
        $conn=$connection->getConnection(); 
        $id=$_POST['id'];




        $sqlget359=$conn->prepare("SELECT * FROM hasil_record  WHERE record_id='$id' ");
                              $sqlget359->execute(); 
                              $data359=$sqlget359->fetch(PDO::FETCH_ASSOC);




   $sql23=$conn->query("SELECT SUM(poin) FROM hasil_record_detail WHERE record_id='$data359[record_id]'   ");
  $jmlpoin=$sql23->fetchColumn(); 

$sqlget380=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE  record_id='$data359[record_id]'");
                              $sqlget380->execute(); 


        while($data380=$sqlget380->fetch(PDO::FETCH_ASSOC)){ 
            $ekskul=$data380['nama_ekskul'];
            $poin2 =$data380['poin']*100;
            $poin=$poin2/$jmlpoin;

    $return_arr[] = array("label" => $ekskul,"symbol"=>$ekskul,
                    "y" => $poin
                    );




            }    

            $datapoin=json_encode($return_arr, JSON_NUMERIC_CHECK);

        $output="
        <script>
         jQuery().ready(function (){

                  
var chart = new CanvasJS.Chart('chartContainer', {
  theme: 'light2',
  animationEnabled: true,
  title: {
    text: 'Persentase Rekomendasi Ekstrakurikuler'
  },
  data: [{
    type: 'doughnut',
    indexLabel: '{symbol} - {y}',
    yValueFormatString: '#,##0.0\"%\"',
    showInLegend: true,
    legendText: '{label} : {y}',
    dataPoints: ".$datapoin."
  }]
});
chart.render();
 
                    
                }); 
            </script>
            <table class='table table-hover table-bordered' style='color:#000000'>";


        $sqlget35=$conn->prepare("SELECT * FROM hasil_record  WHERE record_id='$id' ");
                              $sqlget35->execute(); 
                              $data35=$sqlget35->fetch(PDO::FETCH_ASSOC);

 

                        $output.= "  
             
                <tr>
                    <td style='background-color: #535c68; color: #fff;'>Record ID</td>
                    <td>$data35[record_id]</td>

                </tr> 
                <tr>
                    <td style='background-color: #535c68; color: #fff;'>NIS</td>
                    <td>$data35[nis]</td>

                </tr> 
                <tr> 
                <tr>
                    <td style='background-color: #535c68; color: #fff;'>Nama Siswa</td>
                    <td>$data35[nama_siswa]</td>

                </tr>

                <tr>
                    <td style='background-color: #535c68; color: #fff;'>Jenis Ekskul</td>
                    <td>$data35[hr_tipe]</td>

                </tr>
                <tr>
                    <td style='background-color: #535c68; color: #fff;'>Kesimpulan</td>
                    <td>$data35[kesimpulan]</td>

                </tr> </table><table class='table table-hover table-bordered' style='color:#000000'>
                <tr style='background-color: #535c68; color: #fff;'><td>No</td><td>Nama Ekskul</td><td>Poin</td></tr>";
                $no=0;
                   $sqlget3=$conn->prepare("SELECT * FROM hasil_record_detail  WHERE record_id='$id' ");
                              $sqlget3->execute(); 


        while($data3=$sqlget3->fetch(PDO::FETCH_ASSOC)){ 
        $no++; 
           
//get comment 
   

                        $output.= "  
             
                <tr> 
                    <td>$no</td> 
                    <td>$data3[nama_ekskul]</td>
                    <td>$data3[poin]</td>

                </tr> ";

            }
            $output.="</table> 
<div class='panel panel-default'>
<div class='panel-heading'>
<h3 class='panel-title'><b>Kriteria terpilih Terpilih</b></h3>
</div>
<table class='table table-bordered table-hover' style='color:#000000'>
<thead>
<tr style='background-color: #535c68; color: #fff;'>
<th>No</th>
<th>Kriteria</th>
</tr>
</thead><tbody>";

$noo=0;
 $sqlget38=$conn->prepare("SELECT * FROM answer_question  WHERE  nis='$data35[nis]' AND jawaban='Iya' ");
                              $sqlget38->execute(); 


        while($data38=$sqlget38->fetch(PDO::FETCH_ASSOC)){ 
        $noo++; 

        $output .=  "<tr>
<td>$noo</td>
<td>$data38[kriteria]</td>
</tr>";
}
        
 
                      $output .="</tbody></table> 
<div  style='text-align: center'>
<div id='chartContainer' style='height: 370px; width: 100%;'></div>
</div></div>  " ;

                      echo $output;
                      ?>

