    <div class="container" >

<div class="page-header">
<h1 style="color: #fff;" align="center"><b>Bidang Ekstrakurikuler</b></h1>
</div> 
     
<div class="panel panel-default">
<div class="panel-heading"  style="color:#000000 !important" > 
                  <form method="post" action="?p=question_save"> 
                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label">Pertanyaan*</label>
                      <div class="col-md-10">
                          <textarea class="form-control"  placeholder="Masukan Pertanyaan"   name="pertanyaan" required=""></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label">Kriteria*</label>
                      <div class="col-md-10">
                          <textarea class="form-control"  placeholder="Masukan Kriteria"   name="kriteria" required=""></textarea>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label" >Tipe Ekskul*</label>
                      <div class="col-md-10">
                          <select class="form-control" name="je" required="" id="je" onchange="pilihcheck(this.value)">
                            <option value="">Pilih Jenis*</option>
                            <option value="Wajib">Wajib</option>
                            <option value="Tidak Wajib">Tidak Wajib</option>
                          </select>
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label" >Jawab Iya*</label>
                      <div class="col-md-10" id="listcheck">

                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label" >Status*</label>
                      <div class="col-md-10">
                          <select class="form-control" name="status" required="" id="status" > 
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                      </div>
                  </div>



 

                  <div class="form-group row"> 
                    <div class="col-md-10">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  </div>
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
        function pilihcheck(id){ 
  var idp = id;

  $.ajax({
          url : "pages/get_be.php",
          type :"POST",
          data : {id:idp}, 
          success:function(data){
  
            $("#listcheck").html(data); 

          }
        });
 

        }
        function tescek(idnya){
          var id=idnya;
          $.ajax({
          url : "pages/tmp_change.php",
          type :"POST",
          data : {id:id}, 
          success:function(data){ 
   

          }
        });
        }
      </script>