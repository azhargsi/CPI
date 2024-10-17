<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah'){
        $id_gejala = $_POST['id_gejala'];
        $nama_gejala = $_POST['nama_gejala'];
        $nilai_gejala = $_POST['nilai_gejala'];
        
        mysqli_query($conn,"UPDATE tb_gejala SET nama_gejala='$nama_gejala', nilai_gejala='$nilai_gejala' WHERE id_gejala='$id_gejala'");
        header("location:gejala.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-4 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Edit Gejala</h5>
        </div>
        <hr>
        <?php
        $data = mysqli_query($conn,"SELECT * FROM tb_gejala WHERE id_gejala='$_GET[id_gejala]'");
        $a = mysqli_fetch_array($data)
        ?>

        <div class="card-body">
            
            <form action="edit_gejala.php?aksi=ubah" method="POST">
            <input type="hidden" name="id_gejala" class="form-control" value="<?=$a['id_gejala']?>">
                <div class="form-group">
                    <label>Nama Gejala</label>
                    <input type="text" name="nama_gejala" class="form-control" value="<?=$a['nama_gejala']?>">
                </div>
                <div class="form-group">
                    <label>Nilai Gejala</label>
                    <select name="nilai_gejala" class="form-control">
                        <option selected><?=$a['nilai_gejala']?></option>
                        <option>0.1</option>
                        <option>0.2</option>
                        <option>0.4</option>
                        <option>0.6</option>
                        <option>0.8</option>
                        <option>1</option>
                    </select>
                </div>
                <hr>
                <a href="gejala.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="ubah" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
