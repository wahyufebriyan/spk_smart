<?php 
include('../fungsi.php');

// menjalankan perintah edit
if (isset($_POST['up'])) {
    $id 	= $_POST['id'];
    $bobot 	= $_POST['bobot'];
    editbobotData('kriteria',$bobot,$id);
}

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Bobot Kriteria</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Normalisasi Bobot</th>
                        <th scope="col">Aksi</th>
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
                        <td scope="row"><?= $row['bobot'] ?></td>
                        <td scope="row"><?= $row['bobot']/100 ?></td>
						<td scope="row">
                            <form>
                                <a href="" type="button" class="btn btn-warning btn-circle" 
                                data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                                <i class="fas fa-edit"></i></a>
							</form>

                            <!-- edit database Modal-->
                            <form class="user" method="post" action="bobot_kriteria.php">
                                <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data Bobot kriteria</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" name="bobot" class="form-control form-control-user" value="<?= $row['bobot'] ?>" placeholder="Input Bobot" required="required"><br>
                                                    <input type="hidden" name="id" class="form-control form-control-user" value="<?= $row['id'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit" name="up">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
						</td>
					</tr>

					<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambah database Modal-->
<form class="user" method="post" action="kriteria.php">
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data kriteria</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
			            <input type="text" name="nk" class="form-control form-control-user"
                            placeholder="Kriteria baru" required="required">
		            </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="tambah">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>