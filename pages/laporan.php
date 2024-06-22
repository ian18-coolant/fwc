    <div class="row">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-body"> 
                  <div class="row">
                       <div class="col-12">
                           <div class="page-title-box d-flex align-items-center ">
                           <a href="?p=dashboard"><i class="mdi mdi-arrow-left"></i></a> &nbsp; <h4 class="mb-0 font-size-18">Laporan</h4>
                            
                           
                           </div>
                       </div>
                  </div>
                  <form method="post" action="?p=cetak_laporan">  
  
                  <div class="form-group row"> 
                    <button type="button" name="simpan" onclick="cetaklaporan()" class="btn btn-primary"><i class="mdi mdi-printer"></i> Cetak Laporan</button>
                  </div>
                  </form>


            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        function cetaklaporan(){
          $.ajax({
            url:"pages/cetak_laporan.php",
            type:"POST",
            data:{id:"id"},
            success:function(data){
              $("#printarea").html(data);

        $.print("#printarea"); 
          }

          });
        }
        function bpjs(that){
        if (that.value == "BPJS") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
        }
      </script>