<?php 
require_once('include/koneksi.php'); 
require_once('include/setting.php'); 
require_once('include/function.php'); 
session_start();

                $connection= new Connection();
                $conn=$connection->getConnection();

                if (empty($_SESSION['username'])) {
 header("location:login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {


    $sql78=$conn->prepare("SELECT * FROM  user LEFT JOIN user_siswa ON user.username=user_siswa.username INNER JOIN siswa ON user_siswa.nis=siswa.nis WHERE user.username='$_SESSION[username]'");
        $sql78->execute();
     $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);

   $sql231=$conn->query("SELECT COUNT(*) FROM hasil_record WHERE nis='$hasil78[nis]'  ");
  $jmlans1=$sql231->fetchColumn(); 

 


   $sql23=$conn->query("SELECT COUNT(*) FROM answer_question  ");
  $jmlans=$sql23->fetchColumn(); 
  $tp=$jmlans+1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wilio Survey, Quotation, Review and Register form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Sistem Ekstrakulikuler | Question Wizard</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
	<nav>
		<ul class="cd-primary-nav">
			<li><a href="index.php" class="animated_link">Home</a></li> 
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="index.html" id="logo"><img src="assets/images/favicon.ico" alt="" width="49" height="35"></a>
					<div id="social"> 
					</div>
					<!-- /social -->
					<div>
						<figure><img src="img/info_graphic_1.svg" alt="" class="img-fluid"></figure>
						<h2>Ekstrakulikuler Sistem</h2> 
						<a href="index.php" class="btn_1 rounded">Kembali ke Dashboard</a>
						<a href="#start" class="btn_1 rounded mobile_btn">Mulai!</a>
					</div>
					<div class="copy">© 2024 Sistem Ekstrakulikuler</div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">

				<?php 
				if($jmlans1==0){

					?>

				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form id="wrapped" method="POST">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">


								<div class="submit step">
									<h3 class="main_question"><strong>Mulai</strong>Pilih Jenis Ekstrakulikuler!</h3>
									 
									<div class="form-group">
										<div class="styled-select clearfix">
											<select class="wide required" name="tipe" id="tipe" onchange="pilihtipe(this.value)">
												<option value="">Pilih Jenis Ekskul</option>
												<option value="Wajib">Wajib</option>
												<option value="Tidak Wajib">Tidak Wajib</option>                       
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-12"> 
												<label ><strong>Wajib</strong> (Pramuka, Paskibra, PMR, Rohis)
												</label>
										</div>
										<div class="col-12">
												<label ><strong>Tidak Wajib</strong> (Volly, Silat, English Club, Desain Grafis, Seni Tari)
												</label>
										</div>
									</div> 
								</div>

 
								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard"> 
								<button type="button" onclick="start()" class="submit">Mulai</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->

					
					<?php
				}
				else {
					?>

					<label > Anda sudah pernah mengisi kuisoner! silahkan lihat hasilnya <a href="?p=result_siswa">disini</a></label>

					<?php
				}
				?>
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	
	 
	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/survey_func.js"></script>
	<script type="text/javascript">
		function start(){
			var tipe=$("#tipe").val();
			if(tipe==""){
				alert ("Pilih dulu tipe ekskul nya ya!");
			}
			else {
			window.location.href="kuisoner_add_start.php#start" ;
		}
		}
		function pilihtipe(ida){


  $.ajax({
          url : "pages/start_kuis.php",
          type :"POST",
          data : {id:ida}, 
          success:function(data){
   
 
          }
        });


		}
	</script>

</body>
</html>
<?php

}
?>