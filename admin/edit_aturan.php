<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah'){
        $id_aturan = $_POST['id_aturan'];
        $id_gejala = $_POST['id_gejala'];
        $id_penyakit = $_POST['id_penyakit'];
        
        mysqli_query($conn,"UPDATE tb_aturan SET id_gejala='$id_gejala', id_penyakit='$id_penyakit' WHERE id_aturan='$id_aturan'");
        header("location:aturan.php");
    }
}
        
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-4 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Edit aturan</h5>
        </div>
        <hr>
        <?php
        $data = mysqli_query($conn,"SELECT * FROM tb_aturan WHERE id_aturan='$_GET[id_aturan]'");
        $a = mysqli_fetch_array($data)
        ?>
            
            <form action="edit_aturan.php?aksi=ubah" method="POST">
            <input type="hidden" name="id_aturan" class="form-control" value="<?=$a['id_aturan']?>">    
                <div class="form-group">
                    <label>Gejala</label>
                    <select name="id_gejala" class="form-control">
                        <?php
                        $gej = mysqli_query($conn,"SELECT * FROM tb_gejala WHERE id_gejala='$a[id_gejala]'");
                        $dG = mysqli_fetch_array($gej);
                            echo "<option selected value='".$dG['id_gejala']."'>".$dG['nama_gejala']." - ".$dG['nilai_gejala']."</option>";

                        $gejala = mysqli_query($conn,"SELECT * FROM tb_gejala ORDER BY id_gejala");
                        while($dtG = mysqli_fetch_array($gejala)){
                            echo "<option value='".$dtG['id_gejala']."'>".$dtG['nama_gejala']." - ".$dtG['nilai_gejala']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Penyakit</label>
                    <select name="id_penyakit" class="form-control">
                        <?php
                        $pen = mysqli_query($conn,"SELECT * FROM tb_penyakit WHERE id_penyakit='$a[id_penyakit]'");
                        $dP = mysqli_fetch_array($pen);
                        echo "<option selected value='".$dP['id_penyakit']."'>".$dP['nama_penyakit']."</option>";

                        $penyakit = mysqli_query($conn,"SELECT * FROM tb_penyakit ORDER BY id_penyakit");
                        while($dtP = mysqli_fetch_array($penyakit)){
                            echo "<option value='".$dtP['id_penyakit']."'>".$dtP['nama_penyakit']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <hr>
                <a href="aturan.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </form>
        </div>
    </div>


<?php
include 'footer.php';
?>




