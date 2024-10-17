<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='simpan'){
        $nama_penyakit = $_POST['nama_penyakit'];
        $keterangan = $_POST['keterangan'];
        $pengendalian = $_POST['pengendalian'];

        mysqli_query($conn,"INSERT INTO tb_penyakit (nama_penyakit,keterangan,pengendalian)VALUES('$nama_penyakit','$keterangan','$pengendalian')");
        header("location:penyakit.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-4 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Tambah Penyakit</h5>
        </div>

        <div class="card-body">
            
            <form action="tambah_penyakit.php?aksi=simpan" method="POST">
                
                <div class="form-group">
                    <label>Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Pengendalian</label>
                    <textarea class="form-control" name="pengendalian" rows="3"></textarea>
                </div>
                <hr>
                <a href="penyakit.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
