<?php 
include 'header.php';
?>

<div class="container">
	<div class="row">

	<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> Identifikasi </div>
							<?php
							$identifikasi =mysqli_query($conn, "SELECT COUNT(*) as tidentifikasi FROM tb_identifikasi");
							$a=mysqli_fetch_array($identifikasi); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['tidentifikasi'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-list fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> History </div>
							<?php
							$hasil =mysqli_query($conn, "SELECT COUNT(*) as thasil FROM tb_hasil");
							$a=mysqli_fetch_array($hasil); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['thasil'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-list fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div>

<!-- 
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> Gejala </div>
							<?php
							$gejala =mysqli_query($conn, "SELECT COUNT(*) as tGejala FROM tb_gejala");
							$a=mysqli_fetch_array($gejala); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['tGejala'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-list fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> Penyakit </div>
							<?php
							$penyakit =mysqli_query($conn, "SELECT COUNT(*) as tpenyakit FROM tb_penyakit");
							$a=mysqli_fetch_array($penyakit); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['tpenyakit'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-folder fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> Aturan </div>
							<?php
							$aturan =mysqli_query($conn, "SELECT COUNT(*) as taturan FROM tb_aturan");
							$a=mysqli_fetch_array($aturan); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['taturan'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-cog fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-item-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text uppercase mb-1"> Daftar Pengguna </div>
							<?php
							$user =mysqli_query($conn, "SELECT COUNT(*) as tuser FROM tb_user");
							$a=mysqli_fetch_array($user); ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['tuser'] ?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-800"></i>
					</div>
					</div>
				</div>
			</div>
		</div> -->
		
		
	</div>
</div>
<!-- End of Page Wrapper -->
<div style="padding-bottom: 370px"></div>
<?php 
include 'footer.php';
?>


