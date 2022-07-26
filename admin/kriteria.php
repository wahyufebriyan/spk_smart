<?php 

include('../fungsi.php');

// menjalankan perintah tambah
if(isset($_POST['tambah'])) {
    $nk = $_POST['nk'];
    tambahData('kriteria',$nk);
}

// menjalankan perintah edit
if (isset($_POST['up'])) {
    $id 	= $_POST['id'];
    $nama 	= $_POST['nama'];

    editData('kriteria',$nama,$id);
}

// menjalankan perintah delete
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteKriteria('kriteria',$id);
}

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Kriteria</h1>
<div class="col-md-14 text-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
            <span class="icon text-white-50">
                <i class="fas fa-clone"></i></span>
            <span class="text">Tambah Data</span>
        </button>
    </div>
</div>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
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
						<td scope="row">
                            <form>
                                <a href="" type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                <a href="" type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal<?= $row['id']; ?>"><i class="fas fa-trash"></i></a>
							</form>

                            <!-- edit database Modal-->
                            <form class="user" method="post" action="kriteria.php">
                                <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data kriteria</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control form-control-user" value="<?= $row['nama'] ?>" required="required"><br>
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
                            <!-- hapus database Modal-->
                            <form class="user" method="post" action="kriteria.php">
                                <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Kriteria "<?= $row['nama'] ?>"</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Tekan "Delete" Untuk Hapus Kriteria "<?= $row['nama'] ?>"
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control form-control-user" value="<?= $row['id'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit" name="delete">Delete</button>
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