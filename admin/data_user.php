<?php

include("header.php"); 

?>
<h1 class="h3 mb-2 text-gray-800">Data User</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nisn</th>
						<th scope="col">Username</th>
						<th scope="col">Kelas</th>
						<th scope="col">Role</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// Menampilkan list kriteria
					$query = "SELECT * FROM user,raport_siswa WHERE role='user' AND user.nisn=raport_siswa.nisn";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                		<td scope="row"><?= $row['nisn'] ?></td>
                		<td scope="row"><?= $row['username'] ?></td>
                		<td scope="row"><?= $row['kelas'] ?></td>
                		<td scope="row"><?= $row['role'] ?></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>