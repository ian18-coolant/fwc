<?php 


        $connection= new Connection();
        $conn=$connection->getConnection(); 
        $id=$_GET['id'];
 

                              $sqlget3=$conn->prepare("SELECT * FROM  bidang_ekskul WHERE be_id='$id'  ");
                              $sqlget3->execute(); 

        $data3=$sqlget3->fetch(PDO::FETCH_ASSOC); 

 ?>
 




<div class="container"> 
<div class="page-header">
<h1 style="color: #fff;" align="center"><b>Edit Bidang Ekstrakurikuler</b></h1>
</div>
<div class="panel panel-default">
<div class="panel-heading"  style="color:#000000 !important" >
<form  method="post" action="?p=be_edit_save">

 <div class="form-group">
                      <label for="example-text-input" class="control-label">Nama Ekskul*</label>
                      <input type="hidden" name="ida" value="<?php echo $id ;?>">
                          <input class="form-control" type="text" placeholder="Masukan Nama Ekskul" id="example-text-input" name="nama" value="<?php echo $data3['be_nama'] ;?>" required="">
                     
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Jenis Ekskul*</label>
                      
                          <select class="form-control" name="je" required=""  >
                            <option value="<?php echo $data3['be_jenis'] ;?>"><?php echo $data3['be_jenis'] ;?></option>
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