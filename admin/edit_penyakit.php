<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah'){
        $id_penyakit = $_POST['id_penyakit'];
        $nama_penyakit = $_POST['nama_penyakit'];
        $keterangan = $_POST['keterangan'];
        $pengendalian = $_POST['pengendalian'];

        mysqli_query($conn,"UPDATE tb_penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan', pengendalian='$pengendalian' WHERE id_penyakit='$id_penyakit'");
        header("location:penyakit.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-4 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Edit Penyakit</h5>
        </div>
        <hr>
        <?php
        $data = mysqli_query($conn,"SELECT * FROM tb_penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
        $a = mysqli_fetch_array($data)
        ?>
            <form action="edit_penyakit.php?aksi=ubah" method="POST">
            <input type="hidden" name="id_penyakit" class="form-control" value="<?=$a['id_penyakit']?>">
                <div class="form-group">
                    <label>Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control" value="<?=$a['nama_penyakit']?>">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3"><?=$a['keterangan']?></textarea>
                </div>
                <div class="form-group">
                    <label>Pengendalian</label>
                    <textarea class="form-control" name="pengendalian" rows="3"><?=$a['pengendalian']?></textarea>
                </div>
                <hr>
                <a href="penyakit.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </form>
    </div>
</div>

<?php
include 'footer.php';
?>
