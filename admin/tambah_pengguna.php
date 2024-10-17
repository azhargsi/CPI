<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='simpan'){
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

        
        header("location:daftar_pengguna.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Tambah Pengguna</h5>
        </div>

        <div class="card-body">
            
            <form action="tambah_pengguna.php?aksi=simpan" method="POST">
                <!--<input type="hidden" name="id_admin" class="form-control" value="<?=$a['id_user']?>">-->
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option selected disabled>Pilih</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <a href="daftar_pengguna.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
