<?php
include('../fungsi.php');
include("header.php"); 

?>
<h1 class="h3 mb-2 text-gray-800">LAPORAN</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">LAPORAN</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="example" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nisn</th>
						<th scope="col">Nama</th>
						<th scope="col">Kelas</th>
						<th scope="col">Hasil</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// Menampilkan list laporan siswa
					$query = "SELECT * FROM raport_siswa ORDER BY id ";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                		<td scope="row"><?= $row['nisn'] ?></td>
                		<td scope="row"><?= $row['nama'] ?></td>
                		<td scope="row"><?= $row['kelas'] ?></td>
                        <td>
                            <?php 
                                $nilai = $row['laporan'];
                                $null = null($nilai);
                                echo $null;
                            ?>
                        </td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>
<?php include("footer.php"); ?>