<?php
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");
?>
<div class="container">
  <div class="page-header">
<br>
<br>
    <h1 style="color: #fff;" align="center"><b>Isi Data Konsultasi</b></h1>
  </div>
  <form action="pages/daftar.php" method="post">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama" style="color: #fff;"><b>Nama</b> <span class="text-danger">*</span></label>
          <input id="nama" class="form-control" type="text" placeholder="Masukkan Nama..." name="nama" required>
        </div>
        <div class="form-group">
          <p style="color: #fff;"><b>NIS/NISN</b> <span class="text-danger">*</span></p>
          <input style="color: #000;" class="form-control" type="text" name="nis" id="nis" required placeholder="Masukkan NIS/NISN" onkeyup="ceknis()">
          <div class="text-danger m-b-16" id="hasilnis"><input type="hidden" id="nisval" name="nisval" value="0"></div>
        </div>
        <div class="form-group">
          <p style="color: #fff;"><b>Jenis Kelamin</b> <span class="text-danger">*</span></p>
          <p><input type="radio" name="jk" value="Laki-Laki" required><b> Laki - Laki </b><input type="radio" name="jk" value="Perempuan" required><b> Perempuan</b></p>
        </div>
        <div class="form-group">
          <p style="color: #fff;"><b>Angkatan</b> <span class="text-danger">*</span></p>
          <input type="text" class="form-control" name="angkatan" required placeholder="Masukkan Angkatan">
        </div>
        <div class="form-group">
          <p style="color: #fff;"><b>Tanggal Konsultasi</b> <span class="text-danger">*</span></p>
          <input type="datetime" class="form-control" readonly name="tgl" value="<?php echo $tanggal; ?>" id="jam" />
        </div>
       <div class="form-group text-center">
    <button class="btn tombol btn-md btn-lg" type="submit" name="simpan" style="background-color: #007F5F; border-color: #007F5F;">
        Lanjutkan 
        <span class="glyphicon glyphicon-arrow-right"></span>
    </button>
</div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  function ceknis() {
    var nis = $("#nis").val();
    $.ajax({
      url: "pages/ceknis.php",
      type: "POST",
      data: { nis: nis },
      success: function (response) {
        $("#hasilnis").html(response);
      }
    });
  }
</script>
