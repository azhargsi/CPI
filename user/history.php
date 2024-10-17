<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus'){

        mysqli_query($conn,"DELETE FROM tb_hasil WHERE no_regidentifikasi='$_GET[no_regidentifikasi]'");
        mysqli_query($conn,"DELETE FROM tb_identifikasi WHERE no_regidentifikasi='$_GET[no_regidentifikasi]'");
        header("location:history.php");
    }
}
        
include 'header.php';?>

<div class="container">

<?php 
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan']=='berhasil') {
            echo "<div class='alert alert-primary'><span class='fa fa-check'></span>&nbsp; Data Berhasil Tersimpan !!</div>";
        }
                                        
    }
?>

	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">History</h5>
        </div>
        <hr>
        
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">User</th>
                            <th class="text-center">No Reg Identifikasi</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Penyakit</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        <?php
                        $gejala =mysqli_query($conn, "SELECT * FROM tb_hasil h, tb_akun a WHERE h.id_akun=a.id_akun ORDER BY h.id_hasil");
                        $no=1;
                        while($a=mysqli_fetch_array($gejala)){?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $a['nama_lengkap']?></td>
                            <td class="text-center"><?= $a['no_regidentifikasi'] ?></td>
                            <td class="text-center"><?= $a['tgl_identifikasi']?></td>
                            <td class="text-center"><?= $a['penyakit_cf']?></td>
                            <td class="text-center"><?= $a['nilai_cf']?></td>
                            <td class="text-center">
                                <a href="history_det.php?no_regidentifikasi=<?= $a['no_regidentifikasi'] ?>&id_akun=<?= $a['id_akun']?>" 
                                class="btn btn-secondary"><span class="fa fa-eye"></span></a>
                                <a href="history.php?no_regidentifikasi=<?= $a['no_regidentifikasi'] ?>&aksi=hapus" class="btn btn-danger"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
        </div>
    </div>

<?php
include 'footer.php';
?>
