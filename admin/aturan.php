<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus'){

        mysqli_query($conn,"DELETE FROM tb_aturan WHERE id_aturan='$_GET[id_aturan]'");
        header("location:aturan.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Aturan</h5>
        </div>

        <div class="card-body">
            <a href="tambah_aturan.php" class="btn btn-primary"><span class="fa fa-plus">
                </span>&nbsp; Tambah Data</a>
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Gejala</th>
                            <th class="text-center">Penyakit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        <?php
                        $aturan = mysqli_query($conn, "SELECT * FROM tb_aturan a, tb_gejala g, tb_penyakit p WHERE a.id_gejala=g.id_gejala AND a.id_penyakit=p.id_penyakit ORDER BY a.id_aturan");
                        $no=1;
                        while($a = mysqli_fetch_array($aturan)){ ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-justify">G<?= $a['id_gejala']?> - <?= $a['nama_gejala']?></td>
                            <td class="text-center">P<?= $a['id_penyakit'] ?> - <?= $a['nama_penyakit']?></td>
                            <td class="text-center">
                                <a href="edit_aturan.php?id_aturan=<?= $a['id_aturan'] ?>" 
                                class="btn btn-secondary"><span class="fa fa-pen"></span></a>
                                <a href="aturan.php?id_aturan=<?= $a['id_aturan'] ?>&aksi=hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fa fa-trash"></span></a>
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
