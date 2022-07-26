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
        <h6 class="m-0 font-weight-bold text-primary">Nilai Kriteria setiap alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <?php
					// Menampilkan list kriteria
					$query = "SELECT nama FROM kriteria ORDER BY id";
					$result	= mysqli_query($koneksi, $query);

                    $kriteria=[];
					while ($row = mysqli_fetch_assoc($result)) {
                        $kriteria[]=$row['nama'];}
					?>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th><?= $kriteria[0] ?></th>
                        <th><?= $kriteria[1] ?></th>
                        <th><?= $kriteria[2] ?></th>
                        <th><?= $kriteria[3] ?></th>
                        <th><?= $kriteria[4] ?></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    
					// Menampilkan nilai kuis
					$query = "SELECT * FROM raport_siswa ORDER BY id";
					$result	= mysqli_query($koneksi, $query);

					$no = 0;
					while ($row = mysqli_fetch_assoc($result)) {
                        //nilai rata-rata akademik
                        $ak = mysqli_query($koneksi,"SELECT AVG(nilai) FROM raport_pengetahuan
                        WHERE nisn=$row[nisn] ORDER BY id");
                        while ($akademik= mysqli_fetch_array($ak)) {
                        //nilai agama (PAI)
                        $ag = mysqli_query($koneksi,"SELECT nilai FROM raport_pengetahuan
                        WHERE nisn=$row[nisn] AND id_pelajaran='1' ORDER BY id");
                        while ($agama= mysqli_fetch_array($ag)) {
                        //nilai sikap spiritual
                        $ssp = mysqli_query($koneksi,"SELECT predikat FROM raport_sikap
                        WHERE nisn=$row[nisn] AND id_pelajaran='15' ORDER BY id");
                        while ($spiritual= mysqli_fetch_array($ssp)) {
                        //nilai sikap sosial
                        $ss = mysqli_query($koneksi,"SELECT predikat FROM raport_sikap
                        WHERE nisn=$row[nisn] AND id_pelajaran='16' ORDER BY id");
                        while ($sosial= mysqli_fetch_array($ss)) {

						$no++;
					?>
            		<tr>
                		<td><?= $no ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= round($akademik['AVG(nilai)'],0) ?></td>
                        <td>
                            <?= $row['nilai_kuis'] ?>
                            <?php 
                                $nilai = $row['nilai_kuis'];
                                $null = null($nilai);
                                echo $null;
                            ?>
                        </td>
                        <td><?= $agama['nilai'] ?></td>
                        <td><?= $spiritual['predikat'] ?></td>
                        <td><?= $sosial['predikat'] ?></td>
					</tr>

					<?php }}}}} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>