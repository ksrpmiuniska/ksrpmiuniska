<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT tbl_jurusan.id AS id, tbl_jurusan.nama_jurusan, tbl_jurusan.ka_prodi, tbl_guru.nama, tbl_guru.id AS id_guru FROM tbl_jurusan LEFT JOIN tbl_guru on tbl_jurusan.ka_prodi = tbl_guru.id");
$aktif = 'jurusan';
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Jurusan -  UKM KSR PMI Unit UNIKSA MAB</title>
	<link rel="stylesheet" href="resources/datatables/datatables.min.css">
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<img src="resources/images/logo.png" alt="Logo Sekolah" width="70px" class="float-left mr-3">
				<div class="text float-right">
					<span class="smk"> UKM KSR PMI Unit UNIKSA MAB</span><br>
					<span class="visi">Menyatu Dalam Rasa, Bersatu Untuk Sesama</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Daftar Anggota
				</div>
				<table id="table_id" class="dataTable table table-bordered">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>Nama Jurusan</th>
				            <th>Nama Kaprodi</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php while($row = mysqli_fetch_assoc($query)) : ?>
				        	<tr>
				        		<td><?= $no++ ?></td>
				        		<td><?= $row['nama_jurusan'] ?></td>
				        		<td><a href="detail_guru.php?id=<?= $row['id_guru'] ?>" target="_blank"><?= isset($row['nama']) ? $row['nama'] : '-' ?></a></td>
				        	</tr>
						<?php endwhile; ?>
				    </tbody>
				</table>
			</div>
			<?php require 'sidebar.php'; ?>
		</div>
		<div class="text-white footer">
			2021 © Copyright by UKM KSR PMI Unit UNIKSA MAB.
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/datatables/datatables.min.js"></script>
	<script src="resources/datatables/datatable.js"></script>
</body>
</html>