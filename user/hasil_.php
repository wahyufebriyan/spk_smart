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
<h1 class="h3 mb-2 text-gray-800">Perhitungan Metode SMART</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Normalisasi Bobot</th>
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
					</tr>

					<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Kriteria setiap alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
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
					$query = "SELECT * FROM raport_siswa WHERE nisn='$_SESSION[nisn]'";
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
                        <td><?= $row['nilai_kuis'] ?></td>
                        <td><?= $agama['nilai'] ?></td>
                        <td><?php 
                            $nilai = $spiritual['predikat'];
                            $grade = grade($nilai);
                            echo $grade;  
                        ?></td>
                        <td><?php 
                            $nilai = $sosial['predikat'];
                            $grade = grade($nilai);
                            echo $grade;  
                        ?></td>
					</tr>

					<?php }}}}} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Normalisasi Nilai Kriteria setiap alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <?php
                    // bobot
                    $B = "SELECT * FROM kriteria ORDER BY id";
					$R	= mysqli_query($koneksi, $B);

					$bobot = [];
					while ($row = mysqli_fetch_assoc($R)) {
						$bobot[] = $row['bobot']/100;
                    }
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
                        <th>Nilai Bobot Evaluasi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    
					// Menampilkan nilai kuis
					$query = "SELECT * FROM raport_siswa WHERE nisn='$_SESSION[nisn]'";
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

                        // perhitungan SPK SMART rumus 100*(Cout-Cmin/Cmax-Cmin)%
                        $Cmax=100;
                        $Cmin=0;
                        //Normalisasi Nilai Akademik
                        $Nakademik = 100*($akademik['AVG(nilai)']-$Cmin)/($Cmax-$Cmin);
                        //Normalisasi Nilai Kuis
                        $Nkuis = 100*($row['nilai_kuis']-$Cmin)/($Cmax-$Cmin);
                        //Normalisasi Nilai Agama
                        $Nagama = 100*($agama['nilai']-$Cmin)/($Cmax-$Cmin);
                        //Normalisasi Nilai Spiritual
                        $Nsp = $spiritual['predikat'];
                        $Nspr = Nspr($Nsp);
                        $Nspiritual = 100*($Nspr-$Cmin)/($Cmax-$Cmin);
                        //Normalisasi Nilai Sosial
                        $Nso = $sosial['predikat'];
                        $Nsos = Nsos($Nso);
                        $Nsosial = 100*($Nsos-$Cmin)/($Cmax-$Cmin);
                        //Normalisasi Nilai n.. * bobot n..
                        $nilaievaluasi = ($Nakademik*$bobot[0]) + ($Nkuis*$bobot[1]) + ($Nagama*$bobot[2]) + ($Nspiritual*$bobot[3]) + ($Nsosial*$bobot[4]);
                        $nilai= $nilaievaluasi;
                        $null = null($nilai);
                        $query = "UPDATE raport_siswa SET laporan='$null' WHERE nisn='$_SESSION[nisn]'";
	                    $result = mysqli_query($koneksi,$query);
	                    if (!$result) {
	                        echo "Gagal mengupdate";
	                        exit();
	                    };

						$no++;
					?>
            		<tr>
                		<td><?= $no ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= round($Nakademik,2) ?></td>
                        <td><?= round($Nkuis,2) ?></td>
                        <td><?= round($Nagama,2) ?></td>
                        <td><?= round($Nspiritual,2) ?></td>
                        <td><?= round($Nsosial,2) ?></td>
                        <td><?= round($nilaievaluasi,2) ?></td>
					</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
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
            		<tr>
                		<td scope="row"><?= $no ?></td>
                		<td scope="row"><?= $row['nisn'] ?></td>
                		<td scope="row"><?= $row['nama'] ?></td>
                		<td scope="row"><?= $row['kelas'] ?></td>
                        <td><?= $row['laporan'] ?> </td>
					</tr>
                    <?php }}}}} ?>
				</tbody>
			</table>
        </div>
	</div>
</div>
<?php include('footer.php'); ?>