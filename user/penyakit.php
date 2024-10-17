<?php
include 'header.php';
include '../assets/conn/config.php';

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'read' && isset($_GET['id_penyakit'])) {
        // Query untuk mendapatkan data penyakit berdasarkan ID
        $result = mysqli_query($conn, "SELECT * FROM tb_penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
        if ($result) {
            $penyakit = mysqli_fetch_assoc($result);
            // Jika data ditemukan, arahkan ke halaman detail atau tampilkan detail penyakit
            // Anda bisa menambahkan logika lebih lanjut di sini jika diperlukan
            header("location:penyakit.php");
        }
    }
}
?>

<div class="container">
    <div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Penyakit Pada Pembesaran Udang Vanname</h5>
        </div>

        <div class="card-body">
            <?php
            // Query untuk mendapatkan semua data penyakit
            $data = mysqli_query($conn, "SELECT * FROM tb_penyakit ORDER BY id_penyakit");

            // Tampilkan data penyakit jika tersedia
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<h6 class='m-0 font-weight-bold text-dark'>" . $row['nama_penyakit'] . "</h6>";
                    echo "<p><strong>Keterangan:</strong> " . $row['keterangan'] . "</p>";
                    echo "<p><strong>Pengendalian:</strong> " . $row['pengendalian'] . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p>Tidak ada data penyakit yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
