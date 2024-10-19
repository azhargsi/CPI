<?php 
include 'assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='daftar'){
        
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $umur = $_POST['umur'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // data akun
        mysqli_query($conn,"INSERT INTO tb_akun(nama_lengkap,username,password,level) VALUES ('$nama_lengkap','$username','$password','user')");

        // panggil id akun
        $data = mysqli_query($conn,"SELECT * FROM tb_akun ORDER BY id_akun DESC");
        $a = mysqli_fetch_array($data);

        //in data user
        mysqli_query($conn,"INSERT INTO tb_user(id_akun,nama_lengkap,jenis_kelamin,umur) VALUES ('$a[id_akun]','$nama_lengkap','$jenis_kelamin','$umur')");
       
        header("location:index.php?pesan=berhasil");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>



    <div class="container">
        

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Registration</h1>
                                    </div>


                                    <form class="user" action="register.php?aksi=daftar" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <select name="jenis_kelamin" class="form-control" placeholder="Nama Lengkap"> 
                                                <option selected disabled>Gender</option>
                                                <option>Pria</option>
                                                <option>Wanita</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="umur" class="form-control" placeholder="Umur">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        
                                              
                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Registration</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                    <a href="index.php">Login</a>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>
</html>




