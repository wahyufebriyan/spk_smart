<?php
include('../config.php');
include('../fungsi.php');
include("header.php"); 

if(isset($_POST['simpan_header'])) {
    updateHeader('settings', $_POST['title_header'], $_POST['lead_header']);
}

if(isset($_POST['simpan_tentang'])) {
    updateTentang('settings', $_POST['title_1'], $_POST['deskripsi_1'], $_POST['title_2'], $_POST['deskripsi_2'], $_POST['title_3'], $_POST['deskripsi_3']);
}

if(isset($_POST['simpan_informasi'])) {
    updateInformasi('settings', $_POST['title_informasi'], $_POST['lead_informasi']);
}

if(isset($_POST['simpan_sosial_media'])) {
    updateSosialMedia('settings', $_POST['facebook'], $_POST['twitter'], $_POST['linkedin'], $_POST['instagram']);
}

if(isset($_POST['tambah'])) {
    tambahKegiatan('kegiatan', $_FILES['gambar'], $_POST['deskripsi']);
}

if(isset($_POST['edit'])) {
    updateKegiatan('kegiatan', $_FILES['gambar'], $_POST['deskripsi'], $_POST['id']);
}

if(isset($_POST['delete'])) {
    deleteKegiatan('kegiatan', $_POST['id']);
}

$header = mysqli_query($koneksi,"SELECT title_header, lead_header FROM settings");
$tentang = mysqli_query($koneksi,"SELECT title_tentang_1, desk_tentang_1, title_tentang_2, desk_tentang_2, title_tentang_3, desk_tentang_3 FROM settings");
$informasi = mysqli_query($koneksi,"SELECT title_informasi, lead_informasi FROM settings");
$sosial_media = mysqli_query($koneksi,"SELECT facebook, twitter, linkedin, instagram FROM settings");
$kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY id");
$no = 0;

?>

<h1 class="h3 mb-2 text-gray-800">PENGATURAN</h1>
<!-- DataTales Example -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Sistem Informasi</h6>
	</div>
	<div class="card-body">

        <!-- Start Section Tab Bar -->

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="header-tab" data-toggle="tab" href="#header" role="tab" aria-controls="header" aria-selected="true">Header</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tentang-tab" data-toggle="tab" href="#tentang" role="tab" aria-controls="tentang" aria-selected="false">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="informasi-tab" data-toggle="tab" href="#informasi" role="tab" aria-controls="informasi" aria-selected="false">Informasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="kegiatan-tab" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="kegiatan" aria-selected="false">Kegiatan</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="sosmed-tab" data-toggle="tab" href="#sosmed" role="tab" aria-controls="sosmed" aria-selected="false">Sosial Media</a>
            </li>
        </ul>

        <!-- End Section Tab Bar -->
        
        <!-- Start Form Tab Bar -->
        
            <div class="tab-content" id="myTabContent">

            <!-- Start Section Menu 1 -->
            
            <?php while ($row_header = mysqli_fetch_assoc($header)) { ?>
            <div class="tab-pane fade show active" id="header" role="tabpanel" aria-labelledby="header-tab">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title_header">Title</label>
                            <input type="text" value="<?= $row_header['title_header']?>" name="title_header" class="form-control" id="title_header" placeholder="title_header">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lead_header">Lead</label>
                            <textarea class="form-control" name="lead_header" id="lead_header" rows="3"><?= $row_header['lead_header']?></textarea>
                        </div>
                        <button type="submit" name="simpan_header" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <?php } ?>
            <!-- End Section Menu 1 -->

            <!-- Start Section Menu 2 -->
            <?php while ($row_tentang = mysqli_fetch_assoc($tentang)) { ?>
            <div class="tab-pane fade" id="tentang" role="tabpanel" aria-labelledby="tentang-tab">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title_1">Title</label>
                            <input type="text" name="title_1" value="<?= $row_tentang['title_tentang_1']?>" class="form-control" id="title_1" placeholder="Title_1">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="deskripsi_1">Deskripsi</label>
                            <textarea class="ckeditor" name="deskripsi_1" id="deskripsi_1" rows="3"><?= $row_tentang['desk_tentang_1']?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title_2">Title</label>
                            <input type="text" name="title_2" value="<?= $row_tentang['title_tentang_2']?>" class="form-control" id="title_2" placeholder="Title_2">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="deskripsi_2">Deskripsi</label>
                            <textarea class="ckeditor" name="deskripsi_2" id="deskripsi_2" rows="3"><?= $row_tentang['desk_tentang_2']?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title_3">Title</label>
                            <input type="text" name="title_3" value="<?= $row_tentang['title_tentang_3']?>" class="form-control" id="title_3" placeholder="Title">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="deskripsi_3">Deskripsi</label>
                            <textarea class="ckeditor" name="deskripsi_3" id="deskripsi_3" rows="3"><?= $row_tentang['desk_tentang_3']?></textarea>
                        </div>
                    </div>
                    <button type="submit" name="simpan_tentang" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <?php } ?>
            
            <!-- End Section Menu 2 -->

            <!-- Start Section Menu 3 -->
            <?php while ($row_informasi = mysqli_fetch_assoc($informasi)) { ?>
            <div class="tab-pane fade" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title_informasi">Title</label>
                            <input type="text" name="title_informasi" value="<?= $row_informasi['title_informasi'] ?>" class="form-control" id="title_informasi" placeholder="Title_informasi">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lead_informasi">Lead</label>
                            <textarea class="form-control" name="lead_informasi" id="lead_informasi" rows="3"><?= $row_informasi['lead_informasi'] ?></textarea>
                        </div>
                    </div>
                    <button type="submit" name="simpan_informasi" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <?php } ?>
            <!-- End Section Menu 3 -->

            <!-- Start Section Menu 4 -->
            <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($kegiatan)) { $no++; ?>
                            <tr>
                                <td scope="row" style="width: 10%;"><?= $no ?></td>
                                <td scope="row" style="width: 20%;"><a href="../upload/gambar/<?= $row['gambar']?>" target="_blank"><img src="../upload/gambar/<?= $row['gambar']?>" style="width: 20%;" alt="..." class="img-fluid"></a></td>
                                <td scope="row"><?= $row['deskripsi'] ?></td>
                                <td scope="row" style="width: 10%;">
                                    <form action="" method="POST">
                                        <a href="" type="button" class="btn btn-warning btn-circle" 
                                        data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                                        <i class="fas fa-edit"></i></a>
                                        <a href="" type="button" class="btn btn-danger btn-circle" 
                                        data-toggle="modal" data-target="#hapusModal<?= $row['id']; ?>">
                                        <i class="fas fa-trash"></i></a>
                                    </form>

                                    <!-- edit database Modal-->
                                    <form class="user" method="post" action="" enctype="multipart/form-data">
                                        <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kegiatan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="file" onchange="loadFile(event)" accept="image/*" name="gambar" class="form-control" placeholder="Pilih Gambar" required="required">
                                                            <span style="color: red;">Rekomendasi Gambar 350px x 161 px</span>
                                                            <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" placeholder="Pilih Gambar" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="deskripsi" class="ckeditor" placeholder="Masukkan Deskripsi" rows="10" required="required"><?= $row['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary" type="submit" name="edit">Update</button>
                                                    </div>
                                                    <div class="text-center">
                                                        <h2>Preview Gambar</h2>
                                                        <img src="../upload/gambar/<?= $row['gambar'] ?>" class="rounded" id="output" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- hapus database Modal-->
                                    <form method="post" action="">
                                        <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Kegiatan ?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tekan "Delete" Untuk Hapus Kegiatan
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
            
            <!-- End Section Menu 4 -->

            <!-- Start Section Menu 5 -->
            <?php while ($row_sosial_media = mysqli_fetch_assoc($sosial_media)) { ?>
            <div class="tab-pane fade" id="sosmed" role="tabpanel" aria-labelledby="sosmed-tab">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="facebook">Profil Facebook</label>
                            <input type="text" name="facebook" value="<?= $row_sosial_media['facebook'] ?>" class="form-control" id="facebook" placeholder="facebook">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="twitter">Profil Twitter</label>
                            <input type="text" name="twitter" value="<?= $row_sosial_media['twitter'] ?>" class="form-control" id="twitter" placeholder="twitter">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="linkedin">Profil Linkedin</label>
                            <input type="text" name="linkedin" value="<?= $row_sosial_media['linkedin'] ?>" class="form-control" id="linkedin" placeholder="linkedin">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instagram">Profil Instagram</label>
                            <input type="text" name="instagram" value="<?= $row_sosial_media['instagram'] ?>" class="form-control" id="instagram" placeholder="instagram">
                        </div>
                    </div>
                    <button type="submit" name="simpan_sosial_media" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <?php } ?>
            <!-- End Section Menu 5 -->
        </div>

        <!-- End Section Form Tab Bar -->

    </div>
</div>

<!-- Tambah database Modal-->
<form class="user" method="post" action="" enctype="multipart/form-data">
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
			            <input type="file" name="gambar" class="form-control" placeholder="Pilih Gambar" required="required">
                        <span style="color: red;">Rekomendasi Gambar 350px x 161 px</span>
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi" class="ckeditor" placeholder="Masukkan Deskripsi" rows="10" required="required"></textarea>
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
<?php include("footer.php"); ?>