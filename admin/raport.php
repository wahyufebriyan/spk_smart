<?php 

include('../fungsi.php');

// menjalankan perintah tambah
if(isset($_POST['tambah'])) {
    $nama = $_POST['nama'];$kelas= $_POST['kelas'];$nisn = $_POST['nisn'];$semester = $_POST['semester'];
    $tahun_pelajaran = $_POST['tahun_pelajaran'];

    $predikatS1 = $_POST['predikatS1'];$predikatS2 = $_POST['predikatS2'];

    $P1 = $_POST['P1'];$P2 = $_POST['P2'];$P3 = $_POST['P3'];$P4 = $_POST['P4'];
    $P5 = $_POST['P5'];$P6 = $_POST['P6'];$P7 = $_POST['P7'];$P8 = $_POST['P8'];
    $P9 = $_POST['P9'];$P10 = $_POST['P10'];$P11 = $_POST['P11'];

    $ids1 = $_POST['ids1'];$ids2 = $_POST['ids2'];
    $id1 = $_POST['id1'];$id2 = $_POST['id2'];$id3 = $_POST['id3'];$id4 = $_POST['id4'];
    $id5 = $_POST['id5'];$id6 = $_POST['id6'];$id7 = $_POST['id7'];$id8 = $_POST['id8'];
    $id9 = $_POST['id9'];$id10 = $_POST['id10'];$id11 = $_POST['id11'];

    tambahDataRaport($nama,$kelas,$nisn,$semester,$tahun_pelajaran,
    $predikatS1,$predikatS2,
    $P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,
    $ids1,$ids2,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$id10,$id11);
}

// menjalankan perintah edit
if (isset($_POST['up'])) {
    $id = $_POST['id'];$idP1 = $_POST['idP1'];$idP2 = $_POST['idP2'];
    $idN1 = $_POST['idN1'];$idN4 = $_POST['idN4'];$idN6 = $_POST['idN6'];$idN8 = $_POST['idN8'];$idN10 = $_POST['idN10'];
    $idN2 = $_POST['idN2'];$idN5 = $_POST['idN5'];$idN7 = $_POST['idN7'];$idN9 = $_POST['idN9'];$idN11 = $_POST['idN11'];
    $idN3 = $_POST['idN3'];

    $nama = $_POST['nama'];$kelas= $_POST['kelas'];$nisn = $_POST['nisn'];$semester = $_POST['semester'];
    $tahun_pelajaran = $_POST['tahun_pelajaran'];

    $predikatS1 = $_POST['predikatS1'];$predikatS2 = $_POST['predikatS2'];

    $P1 = $_POST['P1'];$P2 = $_POST['P2'];$P3 = $_POST['P3'];$P4 = $_POST['P4'];
    $P5 = $_POST['P5'];$P6 = $_POST['P6'];$P7 = $_POST['P7'];$P8 = $_POST['P8'];
    $P9 = $_POST['P9'];$P10 = $_POST['P10'];$P11 = $_POST['P11'];

    editDataRaport($id,$idP1,$idP2,
    $idN1,$idN2,$idN3,$idN4,$idN5,$idN6,$idN7,$idN8,$idN9,$idN10,$idN11,
    $nama,$kelas,$nisn,$semester,$tahun_pelajaran,
    $predikatS1,$predikatS2,
    $P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11);
}

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Raport Akademik</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Raport Akademik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    
                    $sql ="SELECT * FROM mata_pelajaran ORDER BY id ";
                    $data = mysqli_query($koneksi, $sql);
                    $pelajaran=[];$idpelajaran=[];
                    while ($baris= mysqli_fetch_array($data)) {
                        $pelajaran[]=$baris['pelajaran'];
                        $idpelajaran[]=$baris['id'];
                    }
					// Menampilkan list
					$query = "SELECT * FROM raport_siswa ORDER BY id";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
                    
                    $sql = mysqli_query($koneksi,"SELECT * FROM raport_sikap
                    WHERE nisn=$row[nisn] ORDER BY id");
                    $P=[];$idP=[];
                    while ($baris= mysqli_fetch_array($sql)) {
                        $P[]=$baris['predikat'];$idP[]=$baris['id'];
                    }

                    $sql = mysqli_query($koneksi,"SELECT * FROM raport_pengetahuan
                    WHERE nisn=$row[nisn] ORDER BY id");
                    $N=[];$idN=[];
                    while ($baris= mysqli_fetch_array($sql)) {
                        $N[]=$baris['nilai'];$idN[]=$baris['id'];
                    }
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                        <td scope="row"><?= $row['nisn'] ?></td>
                		<td scope="row"><?= $row['nama'] ?></td>
                        <td scope="row"><?= $row['kelas'] ?></td>
						<td scope="row">
                            <form>
                                <a href="" type="button" class="btn btn-warning btn-circle" 
                                data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                                <i class="fas fa-edit"></i></a>
                                <a href="" type="button" class="btn btn-info btn-circle" 
                                data-toggle="modal" data-target="#viewModal<?= $row['id']; ?>">
                                <i class="fas fa-eye"></i></a>
							</form>
                            <!-- edit database Modal-->
                            <form class="user" method="post" action="raport.php">
                                <div class="modal fade bd-example-modal-lg" id="editModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data Raport : </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                        <div class="form-group">
                                                            <input type="hidden" name="id" class="form-control form-control-user"
                                                            value="<?= $row['id'] ?>" required="required">
                                                            <input type="text" name="nama" class="form-control form-control-user"
                                                            value="<?= $row['nama'] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="kelas" class="form-control form-control-user" 
                                                            value="<?= $row['kelas'] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="nisn" class="form-control form-control-user" 
                                                            value="<?= $row['nisn'] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="semester" class="form-control form-control-user" 
                                                            value="<?= $row['semester'] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="tahun_pelajaran" class="form-control form-control-user"
                                                            value="<?= $row['tahun_pelajaran'] ?>" required="required">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Sikap Spiritual :</label>
                                                            <input type="hidden" name="idP1" class="form-control form-control-user"
                                                            value="<?= $idP[0] ?>" required="required">
                                                            <input type="text" name="predikatS1" class="form-control form-control-user"
                                                            value="<?= $P[0] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sikap Sosial :</label>
                                                            <input type="hidden" name="idP2" class="form-control form-control-user"
                                                            value="<?= $idP[1] ?>" required="required">
                                                            <input type="text" name="predikatS2" class="form-control form-control-user"
                                                            value="<?= $P[1] ?>" required="required">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN1" class="form-control form-control-user"
                                                            value="<?= $idN[0] ?>" required="required">
                                                            <label><?= $pelajaran[0] ?></label>
                                                            <input type="text" name="P1" class="form-control form-control-user"
                                                            value="<?= $N[0] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN2" class="form-control form-control-user"
                                                            value="<?= $idN[1] ?>" required="required">
                                                            <label><?= $pelajaran[1] ?></label>
                                                            <input type="text" name="P2" class="form-control form-control-user"
                                                            value="<?= $N[1] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN3" class="form-control form-control-user"
                                                            value="<?= $idN[2] ?>" required="required">
                                                            <label><?= $pelajaran[2] ?></label>
                                                            <input type="text" name="P3" class="form-control form-control-user"
                                                            value="<?= $N[2] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN4" class="form-control form-control-user"
                                                            value="<?= $idN[3] ?>" required="required">
                                                            <label><?= $pelajaran[3] ?></label>
                                                            <input type="text" name="P4" class="form-control form-control-user"
                                                            value="<?= $N[3] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN5" class="form-control form-control-user"
                                                            value="<?= $idN[4] ?>" required="required">
                                                            <label><?= $pelajaran[4] ?></label>
                                                            <input type="text" name="P5" class="form-control form-control-user"
                                                            value="<?= $N[4] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN6" class="form-control form-control-user"
                                                            value="<?= $idN[5] ?>" required="required">
                                                            <label><?= $pelajaran[5] ?></label>
                                                            <input type="text" name="P6" class="form-control form-control-user"
                                                            value="<?= $N[5] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN7" class="form-control form-control-user"
                                                            value="<?= $idN[6] ?>" required="required">
                                                            <label><?= $pelajaran[6] ?></label>
                                                            <input type="text" name="P7" class="form-control form-control-user"
                                                            value="<?= $N[6] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN8" class="form-control form-control-user"
                                                            value="<?= $idN[7] ?>" required="required">
                                                            <label><?= $pelajaran[7] ?></label>
                                                            <input type="text" name="P8" class="form-control form-control-user"
                                                            value="<?= $N[7] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN9" class="form-control form-control-user"
                                                            value="<?= $idN[8] ?>" required="required">
                                                            <label><?= $pelajaran[8] ?></label>
                                                            <input type="text" name="P9" class="form-control form-control-user"
                                                            value="<?= $N[8] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN10" class="form-control form-control-user"
                                                            value="<?= $idN[9] ?>" required="required">
                                                            <label><?= $pelajaran[9] ?></label>
                                                            <input type="text" name="P10" class="form-control form-control-user"
                                                            value="<?= $N[9] ?>" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="idN11" class="form-control form-control-user"
                                                            value="<?= $idN[10] ?>" required="required">
                                                            <label><?= $pelajaran[10] ?></label>
                                                            <input type="text" name="P11" class="form-control form-control-user"
                                                            value="<?= $N[10] ?>" required="required">
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
                            <!-- view database Modal-->
                            <form class="user">
                                <div class="modal fade bd-example-modal-xl" id="viewModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn btn-primary btn-icon-split" type="button" onclick="printJS('printJS-form', 'html')">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-print"></i></span>
                                                        <span class="text">Print
                                                    </span>
                                                </button>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div id="printJS-form" class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-borderless text-dark" width="100%" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Sekolah</td>
                                                                <td colspan="2">: SMP NEGERI 21 KOTA TANGERANG SELATAN </td>
                                                                <td colspan="1">Kelas</td>
                                                                <td colspan="1">: <?= $row['kelas'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Alamat</td>
                                                                <td colspan="2">: Jl. Angsana I Pamulang Timur</td>
                                                                <td colspan="1">Semester</td>
                                                                <td colspan="1">: <?= $row['semester'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Nama Peserta Didik</td>
                                                                <td colspan="2">: <?= $row['nama'] ?></td>
                                                                <td colspan="1">Tahun Pelajaran</td>
                                                                <td colspan="1">: <?= $row['tahun_pelajaran'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">No Induk/Nisn</td>
                                                                <td colspan="2">: <?= $row['nisn'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><hr>
                                                <H4 class="text-center text-dark font-weight-bold">PENCAPAIAN KOMPETENSI PESERTA DIDIK</H4><br><br>
                                                <p class="text-dark font-weight-bold">A. SIKAP
                                                <p class="text-dark font-weight-bold">1. Sikap Spiritual
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th collspan="2" class="text-center bg-gray-100">Predikat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><?= $P[0] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p class="text-dark font-weight-bold">2. Sikap Sosial
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th collspan="2" class="text-center bg-gray-100">Predikat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><?= $P[1] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br><br>
                                                <p class="text-dark font-weight-bold">B. PENGETAHUAN
                                                <p class="text-dark font-weight-bold">Kriteria Ketuntasan Minimal = 70
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="text-center bg-gray-100">No</th>
                                                                <th rowspan="2" class="text-center bg-gray-100">Mata Pelajaran</th>
                                                                <th colspan="5" class="text-center bg-gray-100">Pengetahuan</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center bg-gray-100">Nilai</th>
                                                                <th class="text-center bg-gray-100">Predikat</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="7">Kelompok A</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td><?= $pelajaran[0] ?></td>
                                                                <td><?= $N[0] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[0];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td><?= $pelajaran[1] ?></td>
                                                                <td><?= $N[1] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[1];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td><?= $pelajaran[2] ?></td>
                                                                <td><?= $N[2] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[2];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td><?= $pelajaran[3] ?></td>
                                                                <td><?= $N[3] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[3];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td><?= $pelajaran[4] ?></td>
                                                                <td><?= $N[4] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[4];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td><?= $pelajaran[5] ?></td>
                                                                <td><?= $N[5] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[5];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td><?= $pelajaran[6] ?></td>
                                                                <td><?= $N[6] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[6];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="7">Kelompok B</th>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td><?= $pelajaran[7] ?></td>
                                                                <td><?= $N[7] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[7];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td><?= $pelajaran[8] ?></td>
                                                                <td><?= $N[8] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[8];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td><?= $pelajaran[9] ?></td>
                                                                <td><?= $N[9] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[9];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td><?= $pelajaran[10] ?></td>
                                                                <td><?= $N[10] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[10];
                                                                        $grade = grade($nilai);
                                                                        echo $grade;  
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
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
<form class="user" method="post" action="raport.php">
    <div class="modal fade bd-example-modal-lg" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-success">Data Siswa</a>
                                <a href="#step-2" type="button" class="btn btn-default" disabled="disabled">Nilai Sikap</a>
                                <a href="#step-3" type="button" class="btn btn-default" disabled="disabled">Nilai Pengetahuan</a>
                            </div>
                        </div>
                    </div>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="panel panel-success setup-content" id="step-1">
                <div class="panel-body">
                    <div class="form-group">
			            <input type="text" name="nama" class="form-control form-control-user"
                            placeholder="Nama" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="kelas" class="form-control form-control-user"
                            placeholder="Kelas" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="nisn" class="form-control form-control-user"
                            placeholder="Nisn" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="semester" class="form-control form-control-user"
                            placeholder="Semester" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="tahun_pelajaran" class="form-control form-control-user"
                            placeholder="Tahun Pelajaran" required="required">
		            </div>
                </div>
                </div>

                <div class="panel panel-success setup-content" id="step-2">
                <div class="panel-body">
                    <div class="form-group">
			            <label>Sikap <?= $pelajaran[14] ?> :</label>
                        <input type="text" name="predikatS1" class="form-control form-control-user"
                            placeholder="Predikat. input value : 'Sangat Baik' , 'Baik' , 'Cukup'" required="required">
                        <input type="hidden" name="ids1" class="form-control form-control-user"
                            value="<?= $idpelajaran[14] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <label>Sikap <?= $pelajaran[15] ?> :</label>
                        <input type="text" name="predikatS2" class="form-control form-control-user"
                            placeholder="Predikat. input value : 'Sangat Baik' , 'Baik' , 'Cukup'" required="required">
                        <input type="hidden" name="ids2" class="form-control form-control-user"
                            value="<?= $idpelajaran[15] ?>" required="required">
		            </div>
                </div>
                </div>

                <div class="panel panel-success setup-content" id="step-3">
                <div class="panel-body">
                    <div class="form-group">
			            <input type="text" name="P1" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[0] ?>" required="required">
                        <input type="hidden" name="id1" class="form-control form-control-user"
                            value="<?= $idpelajaran[0] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P2" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[1] ?>" required="required">
                        <input type="hidden" name="id2" class="form-control form-control-user"
                            value="<?= $idpelajaran[1] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P3" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[2] ?>" required="required">
                        <input type="hidden" name="id3" class="form-control form-control-user"
                            value="<?= $idpelajaran[2] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P4" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[3] ?>" required="required">
                        <input type="hidden" name="id4" class="form-control form-control-user"
                            value="<?= $idpelajaran[3] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P5" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[4] ?>" required="required">
                        <input type="hidden" name="id5" class="form-control form-control-user"
                            value="<?= $idpelajaran[4] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P6" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[5] ?>" required="required">
                        <input type="hidden" name="id6" class="form-control form-control-user"
                            value="<?= $idpelajaran[5] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P7" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[6] ?>" required="required">
                        <input type="hidden" name="id7" class="form-control form-control-user"
                            value="<?= $idpelajaran[6] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P8" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[7] ?>" required="required">
                        <input type="hidden" name="id8" class="form-control form-control-user"
                            value="<?= $idpelajaran[7] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P9" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[8] ?>" required="required">
                        <input type="hidden" name="id9" class="form-control form-control-user"
                            value="<?= $idpelajaran[8] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P10" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[9] ?>" required="required">
                        <input type="hidden" name="id10" class="form-control form-control-user"
                            value="<?= $idpelajaran[9] ?>" required="required">
		            </div>
                    <div class="form-group">
			            <input type="text" name="P11" class="form-control form-control-user"
                            placeholder="input nilai <?= $pelajaran[10] ?>" required="required">
                        <input type="hidden" name="id11" class="form-control form-control-user"
                            value="<?= $idpelajaran[10] ?>" required="required">
		            </div>
                </div>
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