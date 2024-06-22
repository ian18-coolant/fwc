  <?php 


        $connection= new Connection();
        $conn=$connection->getConnection(); 
        $id=$_GET['id'];
 

                              $sqlget3=$conn->prepare("SELECT * FROM question   WHERE ques_id='$id'  ");
                              $sqlget3->execute(); 

        $data3=$sqlget3->fetch(PDO::FETCH_ASSOC); 

 ?>  

    <div class="container" >

<div class="page-header">
<h1 style="color: #fff;" align="center"><b>Edit Bidang Ekstrakurikuler</b></h1>
</div> 
     
<div class="panel panel-default">
<div class="panel-heading"  style="color:#000000 !important" > 
                  <form method="post" action="?p=question_edit_save"> 
                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label">Pertanyaan*</label>
                      <div class="col-md-10">
                        <input type="hidden" name="ida" value="<?php echo $data3['ques_id'] ?>">
                          <textarea class="form-control"  placeholder="Masukan Pertanyaan"   name="pertanyaan" required=""><?php echo $data3['ques_desc'] ?></textarea>
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label">Kriteria*</label>
                      <div class="col-md-10"> 
                          <textarea class="form-control"  placeholder="Masukan Kriteria"   name="kriteria" required=""><?php echo $data3['ques_kriteria'] ?></textarea>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="example-text-input" class="col-md-2 col-form-label" >Tipe Ekskul*</label>
                      <div class="col-md-10">
                          <select class="form-control" name="je" required="" id="je" onchange="pilihcheck(this.value)">
                            <option value="<?php echo $data3['ques_type'] ?>"><?php echo $data3['ques_type'] ?></option>
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
                            <option value="<?php echo $data3['ques_status'] ?>"><?php echo $data3['ques_status'] ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                      </div>
                  </div>



 

                  <div class="form-group row"> 
                    <div class="col-md-1">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  </div>

                    <div class="col-md-1">

                    <button type="button" name="batalin" class="btn btn-warning" onclick="batal()">Batal</button>
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
        function batal(){ 
          window.location.href="?p=question";
        }
      </script>