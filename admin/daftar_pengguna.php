<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus'){
        $id_akun = $_GET['id_akun'];
        //$nama_lengkap = $_POST['nama_lengkap'];
        //$jenis_kelamin = $_POST['jenis_kelamin'];
        //$umur = $_POST['umur'];

        //mysqli_query($conn,"UPDATE tb_admin SET nama_lengkap='$nama_lengkap', username='$username', password='$password' WHERE id_admin='$id_admin'");
        mysqli_query($conn,"DELETE FROM tb_user WHERE id_akun='$id_akun'");
        mysqli_query($conn,"DELETE FROM tb_akun WHERE id_akun='$id_akun'");

        header("location:daftar_pengguna.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Daftar Pengguna</h5>
        </div>

        <div class="card-body">
            <a href="tambah_pengguna.php" class="btn btn-primary"><span class="fa fa-plus">
                </span>&nbsp; Tambah Data</a>
                <br>
                <br>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        <?php
                        $data =mysqli_query($conn, "SELECT * FROM tb_user u, tb_akun a WHERE a.id_akun=u.id_akun ORDER BY u.id_user");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $a['nama_lengkap']?></td>
                            <td class="text-center"><?= $a['jenis_kelamin'] ?></td>
                            <td class="text-center"><?= $a['umur']?></td>
                            <td class="text-center"><?= $a['username']?></td>
                            <td class="text-center"><?= $a['password']?></td>
                            <td class="text-center">
                                <a href="edit_pengguna.php?id_akun=<?= $a['id_akun'] ?>" 
                                class="btn btn-secondary"><span class="fa fa-pen"></span></a>
                                <a href="daftar_pengguna.php?id_akun=<?= $a['id_akun'] ?>&aksi=hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
