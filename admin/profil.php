<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah'){
        $id_akun = $_POST['id_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        mysqli_query($conn,"UPDATE tb_akun SET nama_lengkap='$nama_lengkap', username='$username', password='$password' WHERE id_akun='$id_akun'");
        header("location:index.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Profil</h5>
        </div>

        <div class="card-body">
            <?php
            $username = $_SESSION['username'];
            $data = mysqli_query($conn,"SELECT * FROM tb_akun WHERE username='$username'");
            $a = mysqli_fetch_array($data);
            ?>
            <form action="profil.php?aksi=ubah" method="POST">
                <input type="hidden" name="id_akun" class="form-control" value="<?=$a['id_akun']?>">
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?=$a['nama_lengkap']?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$a['username']?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?=$a['password']?>">
                </div>
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="ubah" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
