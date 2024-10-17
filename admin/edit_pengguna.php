<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah'){
        $id_akun = $_POST['id_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $umur = $_POST['umur'];

        $username = $_POST['username'];
        $password = $_POST['password'];

        mysqli_query($conn,"UPDATE tb_akun SET nama_lengkap='$nama_lengkap', username='$username', password='$password' WHERE id_akun='$id_akun'");
        mysqli_query($conn,"UPDATE tb_user SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', umur='$umur' WHERE id_akun='$id_akun'");
        header("location:daftar_pengguna.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Edit Data Pengguna</h5>
        </div>

        <div class="card-body">
            <?php
            $data = mysqli_query($conn,"SELECT * FROM tb_akun WHERE id_akun='$_GET[id_akun]'");
            $a = mysqli_fetch_array($data);

            $dat = mysqli_query($conn,"SELECT * FROM tb_user WHERE id_akun='$a[id_akun]'");
            $aa = mysqli_fetch_array($dat);
            ?>
            <form action="edit_pengguna.php?aksi=ubah" method="POST">
                <input type="hidden" name="id_akun" class="form-control" value="<?=$a['id_akun']?>">
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?=$aa['nama_lengkap']?>">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option selected><?=$aa['jenis_kelamin']?></option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="text" name="umur" class="form-control" value="<?=$aa['umur']?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$a['username']?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?=$a['password']?>">
                </div>
                <a href="daftar_pengguna.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
