<?php 

include('../fungsi.php');

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Raport Akademik</h1>
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
					$query = "SELECT * FROM raport_siswa WHERE nisn='$_SESSION[nisn]'";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$no++;
                    
                    $sql = mysqli_query($koneksi,"SELECT * FROM raport_sikap
                    WHERE nisn='$_SESSION[nisn]'");
                    $P=[];$idP=[];
                    while ($baris= mysqli_fetch_array($sql)) {
                        $P[]=$baris['predikat'];$idP[]=$baris['id'];
                    }

                    $sql = mysqli_query($koneksi,"SELECT * FROM raport_pengetahuan
                    WHERE nisn='$_SESSION[nisn]'");
                    $N=[];$idN=[];
                    while ($baris= mysqli_fetch_array($sql)) {
                        $N[]=$baris['nilai'];$idN[]=$baris['id'];
                    }
					?>
            		<tr>
                		<td scope="row"><?= $no ?></td>
                        <td scope="row"><?= $row['nisn'] ?></td>
                		<td scope="row"><?= $row['nama'] ?></td>
						<td scope="row">
                            <form>
                                <a href="" type="button" class="btn btn-info btn-circle" 
                                data-toggle="modal" data-target="#viewModal<?= $row['id']; ?>">
                                <i class="fas fa-eye"></i></a>
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

<?php include('footer.php'); ?>