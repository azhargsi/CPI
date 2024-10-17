<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus'){

        mysqli_query($conn,"DELETE FROM tb_gejala WHERE id_gejala='$_GET[id_gejala]'");
        
        header("location:gejala.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Gejala</h5>
        </div>

        <div class="card-body">
            <a href="tambah_gejala.php" class="btn btn-primary"><span class="fa fa-plus">
                </span>&nbsp; Tambah Data</a>
                <br>
                <br>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Gejala</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        <?php
                        $gejala =mysqli_query($conn, "SELECT * FROM tb_gejala ORDER BY id_gejala");
                        $no=1;
                        while($a=mysqli_fetch_array($gejala)){?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $a['nama_gejala']?></td>
                            <td class="text-center"><?= $a['nilai_gejala'] ?></td>
                            <td class="text-center">
                                <a href="edit_gejala.php?id_gejala=<?= $a['id_gejala'] ?>" 
                                class="btn btn-secondary"><span class="fa fa-pen"></span></a>
                                <a href="gejala.php?id_gejala=<?= $a['id_gejala'] ?>&aksi=hapus" class="btn btn-danger"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fa fa-trash"></span></a>
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
