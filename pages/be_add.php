<div class="container"> 
<div class="page-header">
<h1 style="color: #fff;" align="center"><b>Bidang Ekstrakurikuler</b></h1>
</div>
<div class="panel panel-default">
<div class="panel-heading"  style="color:#000000 !important" >
<form  method="post" action="?p=be_save">

 <div class="form-group">
                      <label for="example-text-input" class="control-label">Nama Ekskul*</label>
                      
                          <input class="form-control" type="text" placeholder="Masukan Nama Ekskul" id="example-text-input" name="nama" required="">
                     
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Jenis Ekskul*</label>
                      
                          <select class="form-control" name="je" required=""  >
                            <option value="">Pilih Jenis</option>
                            <option value="Wajib">Wajib</option>
                            <option value="Tidak Wajib">Tidak Wajib</option>
                          </select>
                  </div>

 

                  <div class="form-group"> 
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  </div>


</form>
</div>


     
          </div>
        </div> 

      <script type="text/javascript">
        function bpjs(that){
        if (that.value == "BPJS") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
        }
      </script>