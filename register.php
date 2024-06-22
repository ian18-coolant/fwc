<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Registrasi | Sistem Ekstrakulikuler</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/sweetalert2.min.css" rel="stylesheet" />

    </head>

    <body class="bg-primary bg-pattern"> 

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5"> 
                            <h5 class="font-size-16 text-white-50 mb-4">SISTEM EKSTRAKULIKULER</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Registrasi Akun Baru.</h5>
                                    <form class="form-horizontal" action="index.html">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="nama">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="password">Jenis Kelamin</label>
                                                    <select class="form-control" id="jk" >
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="nama">NIS</label>
                                                    <input type="text" class="form-control" id="nis" placeholder="Masukan NIS" maxlength="12"onkeyup="ceknis()">
                        <div class="text-danger m-b-16" id="hasilnis"></div>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Masukan Username" onkeyup="cekuser()">

                        <div class="text-danger m-b-16" id="hasiluser"></div>
                                                </div> 
                                                <div class="form-group mb-4">
                                                    <label for="useremail">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Masukan Email" onkeyup="cekemail()">  

                        <div class="text-danger m-b-16" id="hasilemail"></div>      
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" id="password" placeholder="Masukan password">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="tempat">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat" placeholder="Masukan Tempat Lahir">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="tanggal">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal" placeholder="Enter password">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="kelas">Kelas</label>
                                                    <select class="form-control" id="kelas" >
                                                        <option value="">Pilih Kelas</option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="agree" id="term-conditionCheck" >
                                                    <label class="custom-control-label font-weight-normal" for="term-conditionCheck" >Saya Setuju dengan <a href="#" class="text-primary"> Syarat & Kebijakan</a></label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light"  type="button" name="daftar" id="daftar" onclick="simpandaftar()">Register</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="login.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Sudah punya akun?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>


    <script src="assets/js/sweetalert2.js"></script>

        <script src="assets/js/app.js"></script>
        <script type="text/javascript">

             function simpandaftar(){
            var user=$("#username").val();
            var email=$("#email").val(); 
            var nama=$("#nama").val(); 
            var nis=$("#nis").val(); 
            var jk=$("#jk").val(); 
            var tempat=$("#tempat").val(); 
            var tanggal=$("#tanggal").val(); 
            var kelas=$("#kelas").val();  
            var userval=$("#userval").val();
            var nisval=$("#nisval").val(); 
            var emailval=$("#emailval").val(); 
            var password=$("#password").val();
 

            if($('input#term-conditionCheck').is(':checked')){
                
                if(nama==""){
                    swal.fire("Nama kosong, silahkan isi!");

                }
                else if(nis==""){
                    swal.fire("NIS kosong, silahkan isi dulu!");
                }
                else if(nisval==1){
                    swal.fire("NIS tidak tersedia, silahkan rubah!");

                }
                else if(user==""){
                    swal.fire("Username kosong, silahkan isi dulu!");
                }
                else if(userval==1){
                    swal.fire("Username tidak tersedia, silahkan rubah!");

                }
                else if(email==""){
                    swal.fire("Email kosong, silahkan isi!");

                }
                else if(emailval==1){
                    swal.fire("Username tidak tersedia, silahkan rubah!");

                }
                else if(jk==""){
                    swal.fire("Jenis Kelamin belum dipilih!");

                }
                else if(tempat==""){
                    swal.fire("Tempat lahir kosong, silahkan isi!");

                }
                else if(tanggal==""){
                    swal.fire("Tanggal lahir kosong, silahkan isi!");

                } 

                else if(kelas==""){
                    swal.fire("Kelas belum dipilih!");

                } 
                else if(password==""){
                    swal.fire("Password kosong, silahkan isi!");

                }
                else {
                     $.ajax({
                        url:"register_proses.php",
                        type:"POST", 
                        data:{email:email,user:user,nis:nis,nama:nama,password:password,jk:jk,tempat:tempat,tanggal:tanggal,kelas:kelas},
                        success:function(response){ 


    setTimeout(function (){
               window.location.href='login.php';
    }, 1100);

                            let timerInterval
Swal.fire({
  title: 'Pendaftaran berhasil, silahkan login!', 
  timer: 1000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
 /*   console.log('I was closed by the timer') */
  }
})

 





              
                            }

                        });



                }
            }
            else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan centang persetujuan daftar!' 
                })
            }







        }
               function cekemail(){

            var email=$("#email").val();

            $.ajax({
            url:"cekemail.php",
            type:"POST", 
            data:{email:email},
            success:function(response){ 
               $("#hasilemail").html(response);

              
            }

          });

        }

        function cekuser(){

            var user=$("#username").val();

            $.ajax({
            url:"cekuser.php",
            type:"POST", 
            data:{user:user},
            success:function(response){ 
               $("#hasiluser").html(response);

              
            }

          });

        } 


        function ceknis(){

            var user=$("#nis").val();

            $.ajax({
            url:"ceknis.php",
            type:"POST", 
            data:{user:user},
            success:function(response){ 
               $("#hasilnis").html(response);

              
            }

          });

        } 

        </script>

    </body>
</html>
