<?php
session_start();
require_once('include/koneksi.php'); 
require_once('include/setting.php'); 
require_once('include/function.php'); 

$connection= new Connection();
$conn=$connection->getConnection();

if (empty($_SESSION['username'])) {
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Program Sistem Pakar Rekomendasi Ekstrakurikuler</title>

<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/general.css" rel="stylesheet" />
<link href="assets/css/select2.min.css" rel="stylesheet" /> 
<link href="assets/css/sweetalert2.min.css" rel="stylesheet" />

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script> 
<script src="assets/js/jQuery.print.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script src="js/Chart.js"></script>
<script src="js/canvasjs.min.js"></script>

<script type="text/javascript">
$(function(){
    $("select:not(.default)").select2();
})         

var xValues = [];
var yValues = [];
var color = '#';
var barColors = [];

jQuery().ready(function (){
    $.ajax({
        type: 'get',
        dataType: 'JSON',
        url: 'pages/get_chart.php',
        success: function(response) {
            var len = response.length;
            for(var i=0; i<len; i++){
                var nama = response[i].nama;
                var jumlah = response[i].jumlah;
                color += Math.floor(Math.random()*16777215).toString(16);
                xValues.push(nama);
                yValues.push(jumlah);
                barColors.push(color);
                color = '#';
            }
            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Persentase Ekskul Rekomendasi"
                    }
                }
            });
        }
    });
}); 
</script>
<style type="text/css">
    .coeg{
        border-radius: 15px;
        border: 2px solid #000;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .refresh{
        background-color: #55efc4;
        color: #fff;
    }
    .refresh:hover{
        color: #fff;
        background-color: #00b894;
    }
    .tambah{
        background-color: #e67e22;
        color: #fff;
    }
    .tambah:hover{
        color: #fff;
        background-color: #d35400;
    }
    .edit{
        background-color: #3498db;
        color: #fff;
    }
    .edit:hover{
        color: #fff;
        background-color: #2980b9;
    }
    .hapus{
        background-color: #f0ad4e;
        color: #555555;
    }
    .hapus:hover{
        color: #555555;
        background-color: #d9534f; 
    }
    .t{
        font-size: 15px;
        font-family: unset; 
    }
    .latar{
        background-color: #636e72;
    }
    .tambah{
        background-color:   #353b48;
    }
    .tambah:hover{
        background-color:   #718093;
        color: #fff;
    }
    .edit{
        background-color: #2f3640;
    }
    .edit:hover{
        background-color:   #718093;
        color: #fff;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .c{
        font-size: 50px;
        font-family: unset;
    }
    .d{
        font-size: 30px;
        font-family: unset; 
    }
    .tombol{
        background-color: #2d3436;
        color: #fff;
        border-radius: 8px;
    }
    .tombol:hover{
        background-color: #fff;
        color: #2d3436;
        border-radius: 8px;
    }
    /* CSS untuk membuat menu tetap saat di-scroll */
    .navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000; /* Pastikan z-index cukup besar agar menu tetap di atas konten lain */
    }
    #tablenya{
        color:#000000 !important;
    }
    @media print {
        body{ 
            margin: 0px;
            padding:0px;
        }
        body.printing * { display: none; }
        .tab-content{ display: none; }
        body.printing #printarea { display: block; }
        @page {  
            margin-left: 10px;
            margin-top: 10px;  
            margin-right: 10px;
        } 
    }
    @media screen {
        #printarea { display: none; }
        body {
            margin : 0px;
            padding: 0px; 
        }
        @page { 
            size: auto;   
            margin: 0px;  
        } 
        #printarea {
            margin:0px;
            font-size: 20px;
            font-family: "Courier New";
        }
    }
</style>
</head>

<body class="dark hi">
<div id="printarea"></div>
<nav class="navbar navbar-default navbar-static-top navbar-fixed">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?" class="d"><b>Home</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="?p=artikel" class="t"><b>Artikel</b></a></li>
                <li><a href="login.php" class="t"><b>Login</b></a></li>
                <li><a href="?p=tentang" class="t"><b>Tentang</b></a></li>
            </ul>
        </div>
    </div>
</nav> 

<?php include('isi.php'); ?>
<br>
<br>
</body>
</html>

<?php
} else {
    if ($_SESSION['level'] == "admin") {
        // admin
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Program Sistem Pakar Penentuan Ekstrakurikuler</title>

<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/general.css" rel="stylesheet" />
<link href="assets/css/select2.min.css" rel="stylesheet" /> 
<link href="assets/css/sweetalert2.min.css" rel="stylesheet" />

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script> 
<script src="assets/js/jQuery.print.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script src="js/Chart.js"></script>
<script src="js/canvasjs.min.js"></script>

<script type="text/javascript">
 // JavaScript untuk mengaktifkan plugin Select2
    $(function(){
        $("select:not(.default)").select2();
    })         

var xValues = [];
var yValues = [];
var color = '#';
var barColors = [];

jQuery().ready(function (){
    $.ajax({
        type: 'get',
        dataType: 'JSON',
        url: 'pages/get_chart.php',
        success: function(response) {
            var len = response.length;
            for(var i=0; i<len; i++){
                var nama = response[i].nama;
                var jumlah = response[i].jumlah;
                color += Math.floor(Math.random()*16777215).toString(16);
                xValues.push(nama);
                yValues.push(jumlah);
                barColors.push(color);
                color = '#';
            }
            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Persentase Ekskul Rekomendasi"
                    }
                }
            });
        }
    });
}); 
</script>
<style type="text/css">
    .coeg{
        border-radius: 15px;
        border: 2px solid #000;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .refresh{
        background-color: #55efc4;
        color: #fff;
    }
    .refresh:hover{
        color: #fff;
        background-color: #00b894;
    }
    .tambah{
        background-color: #e67e22;
        color: #fff;
    }
    .tambah:hover{
        color: #fff;
        background-color: #d35400;
    }
    .edit{
        background-color: #3498db;
        color: #fff;
    }
    .edit:hover{
        color: #fff;
        background-color: #2980b9;
    }
    .hapus{
        background-color: #f0ad4e;
        color: #555555;
    }
    .hapus:hover{
        color: #555555;
        background-color: #d9534f; 
    }
    .t{
        font-size: 15px;
        font-family: unset; 
    }
    .latar{
        background-color: #636e72;
    }
    .tambah{
        background-color:   #353b48;
    }
    .tambah:hover{
        background-color:   #718093;
        color: #fff;
    }
    .edit{
        background-color: #2f3640;
    }
    .edit:hover{
        background-color:   #718093;
        color: #fff;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .c{
        font-size: 50px;
        font-family: unset;
    }
    .d{
        font-size: 30px;
        font-family: unset; 
    }
    .tombol{
        background-color: #2d3436;
        color: #fff;
        border-radius: 8px;
    }
    .tombol:hover{
        background-color: #fff;
        color: #2d3436;
        border-radius: 8px;
    }
    /* CSS untuk membuat menu tetap saat di-scroll */
    .navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000; /* Pastikan z-index cukup besar agar menu tetap di atas konten lain */
    }
    #tablenya{
        color:#000000 !important;
    }
    @media print {
        body{ 
            margin: 0px;
            padding:0px;
        }
        body.printing * { display: none; }
        .tab-content{ display: none; }
        body.printing #printarea { display: block; }
        @page {  
            margin-left: 10px;
            margin-top: 10px;  
            margin-right: 10px;
        } 
    }
    @media screen {
        #printarea { display: none; }
        body {
            margin : 0px;
            padding: 0px; 
        }
        @page { 
            size: auto;   
            margin: 0px;  
        } 
        #printarea {
            margin:0px;
            font-size: 20px;
            font-family: "Courier New";
        }
    }
</style>
</head>

<body class="dark hi">
<div id="printarea"></div>
<nav class="navbar navbar-default navbar-static-top navbar-fixed">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?" class="d"><b>Home</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="?p=be" class="t"><b>Bidang Ekstrakurikuler</b></a></li>
                <li><a href="?p=question" class="t"><b>Question</b></a></li>
                <li><a href="?p=result" class="t"><b>Laporan Konsultasi</b></a></li>
                <li><a href="?p=password" class="t"><b>Password</b></a></li>
                <li><a href="logout.php" class="t"><b>Logout</b></a></li>
            </ul>
        </div>
    </div>
</nav> 

<?php include('isi.php'); ?>
<br>
<br>
</body>
</html>

<?php
    } else {
        // user
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Program Sistem Penentuan Ekstrakurikuler</title>

<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/general.css" rel="stylesheet" />
<link href="assets/css/select2.min.css" rel="stylesheet" /> 
<link href="assets/css/sweetalert2.min.css" rel="stylesheet" />

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script> 
<script src="assets/js/jQuery.print.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script src="js/Chart.js"></script>
<script src="js/canvasjs.min.js"></script>

<script type="text/javascript">
 // JavaScript untuk mengaktifkan plugin Select2
    $(function(){
        $("select:not(.default)").select2();
    })

var xValues = [];
var yValues = [];
var color = '#';
var barColors = [];

jQuery().ready(function (){
    $.ajax({
        type: 'get',
        dataType: 'JSON',
        url: 'pages/get_chart.php',
        success: function(response) {
            var len = response.length;
            for(var i=0; i<len; i++){
                var nama = response[i].nama;
                var jumlah = response[i].jumlah;
                color += Math.floor(Math.random()*16777215).toString(16);
                xValues.push(nama);
                yValues.push(jumlah);
                barColors.push(color);
                color = '#';
            }
            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Persentase Ekskul Rekomendasi"
                    }
                }
            });
        }
    });
}); 
</script>
<style type="text/css">
    .coeg{
        border-radius: 15px;
        border: 2px solid #000;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .refresh{
        background-color: #55efc4;
        color: #fff;
    }
    .refresh:hover{
        color: #fff;
        background-color: #00b894;
    }
    .tambah{
        background-color: #e67e22;
        color: #fff;
    }
    .tambah:hover{
        color: #fff;
        background-color: #d35400;
    }
    .edit{
        background-color: #3498db;
        color: #fff;
    }
    .edit:hover{
        color: #fff;
        background-color: #2980b9;
    }
    .hapus{
        background-color: #f0ad4e;
        color: #555555;
    }
    .hapus:hover{
        color: #555555;
        background-color: #d9534f; 
    }
    .t{
        font-size: 15px;
        font-family: unset; 
    }
    .latar{
        background-color: #636e72;
    }
    .tambah{
        background-color:   #353b48;
    }
    .tambah:hover{
        background-color:   #718093;
        color: #fff;
    }
    .edit{
        background-color: #2f3640;
    }
    .edit:hover{
        background-color:   #718093;
        color: #fff;
    }
    .hi{
        background-image: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('smk.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .dark{
        background-color: #000;
        color: #fff;
    }
    .c{
        font-size: 50px;
        font-family: unset;
    }
    .d{
        font-size: 30px;
        font-family: unset; 
    }
    .tombol{
        background-color: #2d3436;
        color: #fff;
        border-radius: 8px;
    }
    .tombol:hover{
        background-color: #fff;
        color: #2d3436;
        border-radius: 8px;
    } 
    /* CSS untuk membuat menu tetap saat di-scroll */
    .navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000; /* Pastikan z-index cukup besar agar menu tetap di atas konten lain */
    }
    #tablenya{
        color:#000000 !important;
    }
    @media print {
        body{ 
            margin: 0px;
            padding:0px;
        }
        body.printing * { display: none; }
        .tab-content{ display: none; }
        body.printing #printarea { display: block; }
        @page {  
            margin-left: 10px;
            margin-top: 10px;  
            margin-right: 10px;
        } 
    }
    @media screen {
        #printarea { display: none; }
        body {
            margin : 0px;
            padding: 0px; 
        }
        @page { 
            size: auto;   
            margin: 0px;  
        } 
        #printarea {
            margin:0px;
            font-size: 20px;
            font-family: "Courier New";
        }
    }
</style>
</head>

<body class="dark hi">
<div id="printarea"></div>
<nav class="navbar navbar-default navbar-static-top navbar-fixed">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?" class="d"><b>Home</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="?p=artikel" class="t"><b>Artikel</b></a></li>
                <li><a href="login.php" class="t"><b>Login</b></a></li>
                <li><a href="?p=tentang" class="t"><b>Tentang</b></a></li>
            </ul>
        </div>
    </div>
</nav> 

<?php include('isi.php'); ?>
<br>
<br>
</body>
</html>

<?php
    }
}
?>
