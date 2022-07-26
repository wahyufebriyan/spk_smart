<?php 

include('../fungsi.php');

// menjalankan perintah edit
if (isset($_POST['up'])) {
    $id 	= $_POST['id'];
    $soal = $_POST['soal'];
    $a = $_POST['jwb_a'];
    $b = $_POST['jwb_b'];
    $c = $_POST['jwb_c'];
    $d = $_POST['jwb_d'];
    $kunci = $_POST['kunci_jwb'];
    editDataSoal('soal_kuis',$id,$soal,$a,$b,$c,$d,$kunci);
}

// menjalankan perintah delete
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteSoal('soal_kuis',$id);
}

// menjalankan perintah tambah
if(isset($_POST['tambah'])) {
    $soal = $_POST['soal'];
    $a = $_POST['jwb_a'];
    $b = $_POST['jwb_b'];
    $c = $_POST['jwb_c'];
    $d = $_POST['jwb_d'];
    $kunci = $_POST['kunci_jwb'];
    tambahDataSoal('soal_kuis',$soal,$a,$b,$c,$d,$kunci);
}

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Data Soal Total: <?= getJumlahsoal(); ?></h1>
<div class="col-md-14 text-right">
    <!-- button tambah data Example -->
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
        <h6 class="m-0 font-weight-bold text-primary">Data Soal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Soal</th>
                        <th scope="col">Jawaban A</th>
                        <th scope="col">Jawaban B</th>
                        <th scope="col">Jawaban C</th>
                        <th scope="col">Jawaban D</th>
                        <th scope="col">Kunci Jawaban</th>
                        <th scope="col">Aksi</th>
            		</tr>
        		</thead>
        		<tbody>
					<?php
					// Menampilkan list soal
					$query = "SELECT * FROM soal_kuis ORDER BY no";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                		<td scope="row"><?= $row['soal'] ?></td>
                        <td scope="row"><?= $row['jwb_a'] ?></td>
                        <td scope="row"><?= $row['jwb_b'] ?></td>
                        <td scope="row"><?= $row['jwb_c'] ?></td>
                        <td scope="row"><?= $row['jwb_d'] ?></td>
                        <td scope="row"><?= $row['kunci_jwb'] ?></td>
						<td scope="row">
                            <form>
                                <a href="" type="button" class="btn btn-warning btn-circle" 
                                data-toggle="modal" data-target="#editModal<?= $row['no']; ?>">
                                <i class="fas fa-edit"></i></a>
                                <a href="" type="button" class="btn btn-danger btn-circle" 
                                data-toggle="modal" data-target="#hapusModal<?= $row['no']; ?>">
                                <i class="fas fa-trash"></i></a>
							</form>

                            <!-- edit database Modal-->
                            <form class="user" method="post" action="soal_kuis.php">
                                <div class="modal fade" id="editModal<?= $row['no']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control form-control-user" value="<?= $row['no']; ?>" required="required"><br>
                                                    <input type="text" name="soal" class="form-control form-control-user" value="<?= $row['soal']; ?>" required="required"><br>
                                                    <input type="text" name="jwb_a" class="form-control form-control-user" value="<?= $row['jwb_a']; ?>" required="required"><br>
                                                    <input type="text" name="jwb_b" class="form-control form-control-user" value="<?= $row['jwb_b']; ?>" required="required"><br>
                                                    <input type="text" name="jwb_c" class="form-control form-control-user" value="<?= $row['jwb_c']; ?>" required="required"><br>
                                                    <input type="text" name="jwb_d" class="form-control form-control-user" value="<?= $row['jwb_d']; ?>" required="required">
                                                    <input type="text" name="kunci_jwb" class="form-control form-control-user" value="<?= $row['kunci_jwb']; ?>" required="required">
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
                            <form class="user" method="post" action="soal_kuis.php">
                                <div class="modal fade" id="hapusModal<?= $row['no']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Soal "<?= $row['soal'] ?>"</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Tekan "Delete" Untuk Hapus Soal "<?= $row['soal'] ?>"
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control form-control-user" value="<?= $row['no']; ?>">
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
<form class="user" method="post" action="soal_kuis.php">
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data Soal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
			            <input type="text" name="soal" class="form-control form-control-user"
                            placeholder="Soal baru"><br>
			            <input type="text" name="jwb_a" class="form-control form-control-user"
                            placeholder="Jawaban A baru"><br>
			            <input type="text" name="jwb_b" class="form-control form-control-user"
                            placeholder="Jawaban B baru"><br>
			            <input type="text" name="jwb_c" class="form-control form-control-user"
                            placeholder="Jawaban C baru"><br>
			            <input type="text" name="jwb_d" class="form-control form-control-user"
                            placeholder="Jawaban D baru"><br>
                        <input type="text" name="kunci_jwb" class="form-control form-control-user"
                            placeholder="Kunci Jawaban input: 'A', 'B', 'C', 'D'">
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