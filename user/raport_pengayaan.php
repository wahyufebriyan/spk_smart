<?php 

include('../fungsi.php');

include('header.php'); 

?>
<h1 class="h3 mb-2 text-gray-800">Raport Pengayaan</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Raport Pengayaan</h6>
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

                    $sql = mysqli_query($koneksi,"SELECT * FROM raport_pengayaan
                    WHERE nisn='$_SESSION[nisn]' ORDER BY id");
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
                                                <H4 class="text-center text-dark font-weight-bold">
                                                    LAPORAN PERKEMBANGAN KOMPETENSI KUALITATIF KELAS PENGAYAAN PAI</H4>
                                                <H5 class="text-center text-dark font-weight-bold">
                                                    SMP NEGERI 21 KOTA TANGERANG SELATAN</H5>
                                                <H5 class="text-center text-dark font-weight-bold">
                                                    TAHUN PELAJARAN <?= $row['tahun_pelajaran'] ?></H5><br><br>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-borderless text-dark" width="100%" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">Nama Siswa</td>
                                                                <td colspan="2">: <?= $row['nama'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">No Induk/Nisn</td>
                                                                <td colspan="2">: <?= $row['nisn'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Kelas</td>
                                                                <td colspan="2">: <?= $row['kelas'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="text-center bg-gray-100">KOMPETENSI KUALITATIF</th>
                                                                <th colspan="5" class="text-center bg-gray-100">NILAI</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center bg-gray-100">ANGKA</th>
                                                                <th class="text-center bg-gray-100">PREDIKAT</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><?= $pelajaran[11] ?></td>
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
                                                                <td class="text-center"><?= $pelajaran[12] ?></td>
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
                                                                <td class="text-center"><?= $pelajaran[13] ?></td>
                                                                <td><?= $N[2] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $nilai = $N[2];
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