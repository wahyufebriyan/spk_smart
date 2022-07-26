<?php 

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Kriteria</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					// Menampilkan list kriteria
					$query = "SELECT * FROM kriteria ORDER BY id";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                		<td scope="row"><?= $row['nama'] ?></td>
					</tr>

					<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>