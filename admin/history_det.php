<?php
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
		<div class = "card-header">
            <h5 class= "m-0 font-weight-bold text-primary">Detail Identifikasi</h5>
        </div>
        <br>
        <br>

        <center>
            <h2 class="m-0 font-weight-bold text-primary"> Hasil Analisa Metode Certainty Factor</h2>
        </center>
        <hr class="font-weight-bold text-primary">Rules</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Penyakit</th>
                    <th class="text-center">Gejala</th>
                    <th class="text-center">CF Pakar</th>
                    <th class="text-center">CF User</th>
                    <th class="text-center">Nilai CF</th>
                    
                </tr>
                <?php
                $sql = mysqli_query($conn,"SELECT * FROM tb_penyakit p, tb_gejala g, tb_identifikasi i, 
                tb_aturan a WHERE g.id_gejala=i.id_gejala AND g.id_gejala=a.id_gejala AND 
                p.id_penyakit=a.id_penyakit AND i.id_akun='$_GET[id_akun]' AND i.no_regidentifikasi='$_GET[no_regidentifikasi]' 
                ORDER BY p.id_penyakit");
                $i=0;
                while($r = mysqli_fetch_array($sql)){
                    // cf = h * e
                    $nilai_cf = $r['nilai_gejala']*$r['nilai_user'];
                    $i++;
                    echo "
                    <tr>
                    <td class='text-center'>$i</td>
                    <td class='text-center'>$r[nama_penyakit]</td>
                    <td class='text-center'>$r[nama_gejala]</td>
                    <td class='text-center'>$r[nilai_gejala]</td>
                    <td class='text-center'>$r[nilai_user]</td>
                    <td class='text-center'>$nilai_cf</td>
                    </tr>
                    ";
                }
                ?>

            </table> 
        </div>
        <br>
        <br>

        <div class="border p-3">
            <h5 class="font-weight-bold text primary">Detail Perhitungan </h5>
            <h6>
                <?php
                $highestPersentage = 0;
                $penyakitTerbesar = "";
                $data = mysqli_query($conn,"SELECT * FROM tb_penyakit ORDER BY id_penyakit");
                while($a=mysqli_fetch_array($data)){

                    $sql1 = mysqli_query($conn,"SELECT * FROM tb_penyakit p, 
                        tb_gejala g, tb_identifikasi i, tb_aturan a WHERE g.id_gejala=i.id_gejala 
                        AND g.id_gejala=a.id_gejala AND p.id_penyakit='$a[id_penyakit]' AND i.id_akun='$_GET[id_akun]' 
                        AND i.no_regidentifikasi='$_GET[no_regidentifikasi]'");

                $jml_data = mysqli_num_rows($sql1);

                $cflama = 0;
                $no=1;
                $lastPercentage = 0;
                while ($result=mysqli_fetch_array($sql1)){
                    $cf_he = $result['nilai_gejala']*$result['nilai_user'];

                    if($jml_data>0){
                        $cf1 = $cflama ;
                        $cf2 = $cf_he;

                        $cfcombine = $cf1+$cf2 * (1-$cf1);
                        $cflama = $cfcombine;

                        echo "<div class='text-justify'>
                        CFcombine = ".$cf1."+".$cf2."x(1-".$cf1.")=".$cfcombine."<br></div>
                        ";
                        
                        if($result['id_penyakit'] == $a['id_penyakit']) {
                            $persentage = $cfcombine * 100;
                            $lastPercentage = number_format($persentage,2);

                        }
                        $no++;
                    }
                }
                if($no>1) {
                    echo "<p>Persentage combine pada penyakit< (" . $a['nama_penyakit'] .") : " . $lastPercentage . "%</b></p>";
                    if($lastPercentage > $highestPersentage){
                        $highestPersentage = $lastPercentage;
                        $penyakitTerbesar = $a['nama_penyakit'];

                    }
                }

            }
            echo "
            <b class='text-primary'>Nilai Terbesar " . $highestPersentage . "
            %<br></b>
            <b class='text-primary'> Penyakit dengan nilai terbesar : " . $penyakitTerbesar . "<br></b>";
            //$pembulatan = number_format($highestPersentage,2);
            
                ?>
            </h6>
        </div>

        <br>
        <div class="border p-3">
            <h5 class="font-weight-bold text primary">Keterangan</h5>
            <h6>
            <?php
            $data = mysqli_query($conn,"SELECT * FROM tb_penyakit WHERE nama_penyakit='$penyakitTerbesar'");
            $a=mysqli_fetch_array($data);
            echo "
            <div class='text-justify'>
            $a[keterangan];
            </div>
            ";
                ?>
            </h6>
        </div>
  
        <br>
        <div class="border p-3">
            <h5 class="font-weight-bold text primary">Pengendalian</h5>
            <h6>
            <?php
            $data = mysqli_query($conn,"SELECT * FROM tb_penyakit WHERE nama_penyakit='$penyakitTerbesar'");
            $a=mysqli_fetch_array($data);
            echo "
            <div class='text-justify'>
            $a[pengendalian];
            </div>
            ";
                ?>
            </h6>
    </div>
    <br>

    <div class="border p-3">
            <h5 class="font-weight-bold text primary">Kesimpulan</h5>
            <h6>
            <?php
            
            echo "
            <div class='text-justify'>
            Berdasarkan hasil perhitungan metode <b>Certainty Factor</b> diatas, dapat disimpulkan bahwa udang anda kemungkinan besar terjangkit penyakit <b class='text-primary' style='font-size:25px;'>$penyakitTerbesar</b> dengan tingkat kepercayaan <b class='text-primary' style='font-size:25px;'>$highestPersentage</b>
            $a[pengendalian];
            </div>
            ";
                ?>
            </h6>
    </div>
    <br>
    
</div>
</div>

<?php
include 'footer.php';
?>
