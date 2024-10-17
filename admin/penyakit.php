<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus'){
        mysqli_query($conn,"DELETE FROM tb_penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
        header("location:penyakit.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Penyakit</h5>
        </div>

        <div class="card-body">
            <a href="tambah_penyakit.php" class="btn btn-primary"><span class="fa fa-plus">
                </span>&nbsp; Tambah Data</a>
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Penyakit</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Pengendalian</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        <?php
                        $penyakit =mysqli_query($conn,"SELECT * FROM tb_penyakit ORDER BY id_penyakit");
                        $no=1;
                        while($a=mysqli_fetch_array($penyakit)){?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $a['nama_penyakit']?></td>
                            <td class="text-justify"><?= $a['keterangan'] ?></td>
                            <td class="text-justify"><?= $a['pengendalian'] ?></td>
                            <td class="text-center">
                                <a href="edit_penyakit.php?id_penyakit=<?= $a['id_penyakit'] ?>" 
                                class="btn btn-secondary"><span class="fa fa-pen"></span></a>
                                <a href="penyakit.php?id_penyakit=<?= $a['id_penyakit'] ?>&aksi=hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fa fa-trash"></span></a>
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
