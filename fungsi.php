<?php

if(!isset($_SESSION)){
    session_start();
}

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3,...)
function getKriteriaID($no_urut) {
	include('config.php');
	$query  = "SELECT id FROM kriteria ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
	include('config.php');
	$query  = "SELECT nama FROM kriteria ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari jumlah kriteria
function getJumlahKriteria() {
	include('config.php');
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah soal
function getJumlahsoal() {
	include('config.php');
	$query  = "SELECT count(*) FROM soal_kuis";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah user
function getJumlahuser() {
	include('config.php');
	$query  = "SELECT count(*) FROM user WHERE role='user'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah laporan
function getJumlahlaporan() {
	include('config.php');
	$query  = "SELECT count(laporan) FROM raport_siswa";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// menambah data kriteria
function tambahData($tabel,$nk) {
	include('config.php');

	$query 	= "INSERT INTO $tabel (nama) VALUES ('$nk')";
	$tambah	= mysqli_query($koneksi, $query);

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

// menambah soal kuis
function tambahDataSoal($tabel,$soal,$a,$b,$c,$d,$kunci) {
	include('config.php');

	$query 	= "INSERT INTO $tabel (soal,jwb_a,jwb_b,jwb_c,jwb_d,kunci_jwb) VALUES ('$soal','$a','$b','$c','$d','$kunci')";
	$tambah	= mysqli_query($koneksi, $query);

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

// menambah raport
function tambahDataRaport($nama,$kelas,$nisn,$semester,$tahun_pelajaran,
	$predikatS1,$predikatS2,
	$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,
	$ids1,$ids2,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$id10,$id11)
	{
	include('config.php');

	$query 	= "INSERT INTO raport_siswa (nama,kelas,nisn,semester,tahun_pelajaran) VALUES 
	('$nama','$kelas','$nisn','$semester','$tahun_pelajaran')";
	mysqli_query($koneksi, $query);

	$query1 = "INSERT INTO raport_sikap (nisn,predikat,id_pelajaran) VALUES 
	('$nisn','$predikatS1','$ids1'),
	('$nisn','$predikatS2','$ids2')";
	mysqli_query($koneksi, $query1);

	$query2 = "INSERT INTO raport_pengetahuan (nisn,nilai,id_pelajaran) VALUES 
	('$nisn','$P1','$id1'),
	('$nisn','$P2','$id2'),
	('$nisn','$P3','$id3'),
	('$nisn','$P4','$id4'),
	('$nisn','$P5','$id5'),
	('$nisn','$P6','$id6'),
	('$nisn','$P7','$id7'),
	('$nisn','$P8','$id8'),
	('$nisn','$P9','$id9'),
	('$nisn','$P10','$id10'),
	('$nisn','$P11','$id11')";
	mysqli_query($koneksi, $query2);
}

// edit raport
function editDataRaport($id,$idP1,$idP2,
	$idN1,$idN2,$idN3,$idN4,$idN5,$idN6,$idN7,$idN8,$idN9,$idN10,$idN11,
	$nama,$kelas,$nisn,$semester,$tahun_pelajaran,
	$predikatS1,$predikatS2,
	$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11)
	{
	include('config.php');

	$query1 = "UPDATE raport_siswa SET nama='$nama',kelas='$kelas',nisn='$nisn',semester='$semester',tahun_pelajaran='$tahun_pelajaran' WHERE id='$id'";mysqli_query($koneksi, $query1);

	$query2 = "UPDATE raport_sikap SET predikat='$predikatS1' WHERE id='$idP1'";mysqli_query($koneksi, $query2);
	$query3 = "UPDATE raport_sikap SET predikat='$predikatS2' WHERE id='$idP2'";mysqli_query($koneksi, $query3);

	$query4 = "UPDATE raport_pengetahuan SET nilai='$P1' WHERE id='$idN1'";mysqli_query($koneksi, $query4);
	$query5 = "UPDATE raport_pengetahuan SET nilai='$P2' WHERE id='$idN2'";mysqli_query($koneksi, $query5);
	$query6 = "UPDATE raport_pengetahuan SET nilai='$P3' WHERE id='$idN3'";mysqli_query($koneksi, $query6);
	$query7 = "UPDATE raport_pengetahuan SET nilai='$P4' WHERE id='$idN4'";mysqli_query($koneksi, $query7);
	$query8 = "UPDATE raport_pengetahuan SET nilai='$P5' WHERE id='$idN5'";mysqli_query($koneksi, $query8);
	$query9 = "UPDATE raport_pengetahuan SET nilai='$P6' WHERE id='$idN6'";mysqli_query($koneksi, $query9);
	$query10 = "UPDATE raport_pengetahuan SET nilai='$P7' WHERE id='$idN7'";mysqli_query($koneksi, $query10);
	$query11 = "UPDATE raport_pengetahuan SET nilai='$P8' WHERE id='$idN8'";mysqli_query($koneksi, $query11);
	$query12 = "UPDATE raport_pengetahuan SET nilai='$P9' WHERE id='$idN9'";mysqli_query($koneksi, $query12);
	$query13 = "UPDATE raport_pengetahuan SET nilai='$P10' WHERE id='$idN10'";mysqli_query($koneksi, $query13);
	$query14 = "UPDATE raport_pengetahuan SET nilai='$P11' WHERE id='$idN11'";mysqli_query($koneksi, $query14);
}

// edit raport pengayaan
function editDataRaportPengayaan($idN1,$idN2,$idN3,$P1,$P2,$P3)
	{
	include('config.php');

	$query1 = "UPDATE raport_pengayaan SET nilai='$P1' WHERE id='$idN1'";
	mysqli_query($koneksi, $query1);
	$query2 = "UPDATE raport_pengayaan SET nilai='$P2' WHERE id='$idN2'";
	mysqli_query($koneksi, $query2);
	$query3 = "UPDATE raport_pengayaan SET nilai='$P3' WHERE id='$idN3'";
	mysqli_query($koneksi, $query3);
}

// tambah raport pengayaan
function tambahDataRaportPengayaan($nisn,$P1,$P2,$P3,$idp1,$idp2,$idp3)
	{
	include('config.php');

	$query 	= "INSERT INTO raport_pengayaan (nisn,nilai,id_pelajaran) VALUES 
	('$nisn','$P1','$idp1'),('$nisn','$P2','$idp2'),('$nisn','$P3','$idp3')";
	mysqli_query($koneksi, $query);
}

function grade($nilai)
{
 	if($nilai <= 100 ) { $grade = "A"; }
 	if($nilai <  90 )  { $grade = "B"; }
 	if($nilai <  80 )  { $grade = "C"; }
 	if($nilai <  70 )  { $grade = "D"; }
	if($nilai <  1 )  { $grade = "Belum Ada Data"; }
	if($nilai == "Sangat Baik" )  { $grade = "90"; }
	if($nilai ==  "Baik" )  { $grade = "80"; }
	if($nilai ==  "Cukup" )  { $grade = "70"; }

 	return $grade;
}
function Nspr($Nsp)
{
	if($Nsp == "Sangat Baik" )  { $Nspr = "90"; }
	if($Nsp ==  "Baik" )  { $Nspr = "80"; }
	if($Nsp ==  "Cukup" )  { $Nspr = "70"; }

	return $Nspr;
}
function Nsos($Nso)
{
	if($Nso == "Sangat Baik" )  { $Nsos = "90"; }
	if($Nso ==  "Baik" )  { $Nsos = "80"; }
	if($Nso ==  "Cukup" )  { $Nsos = "70"; }

	return $Nsos;
}

function null($nilai)
{
	if ($nilai >= 70) {$null = "Lulus";
	}else{$null = "Tidak Lulus";}
	if($nilai <  1 )  { $null = "Belum Ada Data"; }
	if($nilai == "" )  { $null = "Belum Ada Data"; }

 	return $null;
}

function skor($nilai)
{
	if($nilai == "A" )  { $skor = "5"; }
	if($nilai == "B" )  { $skor = "5"; }
	if($nilai == "C" )  { $skor = "5"; }
	if($nilai == "D" )  { $skor = "5"; }
	if($nilai == "a" )  { $skor = "5"; }
	if($nilai == "b" )  { $skor = "5"; }
	if($nilai == "c" )  { $skor = "5"; }
	if($nilai == "d" )  { $skor = "5"; }

 	return $skor;
}

// edit data kriteria
function editData($tabel,$nama,$id) {
	include('config.php');

	$query 	= "UPDATE $tabel SET nama='$nama' WHERE id=$id";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// edit data bobot kriteria
function editbobotData($tabel,$bobot,$id) {
	include('config.php');

	$query 	= "UPDATE $tabel SET bobot='$bobot' WHERE id=$id";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// edit data Soal
function editDataSoal($tabel,$id,$soal,$a,$b,$c,$d,$kunci) {
	include('config.php');

	$query 	= "UPDATE $tabel SET soal='$soal',jwb_a='$a',jwb_b='$b',jwb_c='$c',jwb_d='$d',kunci_jwb='$kunci' WHERE no=$id";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// hapus kriteria
function deleteKriteria($tabel,$id) {
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM $tabel WHERE id=$id";
	mysqli_query($koneksi, $query);
}

// hapus soal kuis
function deleteSoal($tabel,$id) {
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM $tabel WHERE no=$id";
	mysqli_query($koneksi, $query);
}

// update header
function updateHeader($tabel,$title_header, $lead_header){
	include('config.php');
	$query 	= "UPDATE $tabel SET title_header='$title_header', lead_header='$lead_header'";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// update tentang
function updateTentang($tabel, $title_1, $deskrispi_1, $title_2, $deskrispi_2, $title_3, $deskrispi_3){
	include('config.php');
	$query 	= "UPDATE $tabel SET title_tentang_1='$title_1', desk_tentang_1='$deskrispi_1', title_tentang_2='$title_2', desk_tentang_2='$deskrispi_2', title_tentang_3='$title_3', desk_tentang_3='$deskrispi_3'";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// update informasi
function updateInformasi($tabel, $title_informasi, $lead_informasi){
	include('config.php');
	$query 	= "UPDATE $tabel SET title_informasi='$title_informasi', lead_informasi='$lead_informasi'";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

// update social media
function updateSosialMedia($tabel, $facebook, $twitter, $linkedin, $instagram){
	include('config.php');
	$query 	= "UPDATE $tabel SET facebook='$facebook', twitter='$twitter', linkedin='$linkedin', instagram='$instagram'";
	$result	= mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Update gagal";
		exit();
	}
}

function tambahKegiatan($tabel, $url, $deskrispi){
	
	include('config.php');	
	$lokasi = $_FILES['gambar']['tmp_name'];	
    $foto   = $_FILES['gambar']['name'];
    $tipe	= $_FILES['gambar']['type'];
    $ukuran	= $_FILES['gambar']['size'];

    $direktori = "../upload/gambar/$foto";
    $MAX_FILE_SIZE = 1000000;
	
    if($ukuran > $MAX_FILE_SIZE) {
		exit();
    }
    if($ukuran > 0) {
		move_uploaded_file($lokasi, $direktori);
    }
	$result = mysqli_query($koneksi, "INSERT INTO $tabel (`gambar`, `deskripsi`) VALUES ('$foto', '$deskrispi')");
	
}

function updateKegiatan($tabel, $url, $deskrispi, $id){
		
	include('config.php');
	$lokasi = $_FILES['gambar']['tmp_name'];	
    $foto   = $_FILES['gambar']['name'];
    $tipe	= $_FILES['gambar']['type'];
    $ukuran	= $_FILES['gambar']['size'];

    $direktori = "../upload/gambar/$foto";
    $MAX_FILE_SIZE = 1000000;
	
    if($ukuran > $MAX_FILE_SIZE) {
		exit();
    }
    if($ukuran > 0) {
		move_uploaded_file($lokasi, $direktori);
    }

	$query = "UPDATE $tabel SET gambar = '$foto', deskripsi = '$deskrispi' WHERE id = '$id'";

	$result = mysqli_query($koneksi, "UPDATE $tabel SET gambar = '$foto', deskripsi = '$deskrispi' WHERE id = '$id'");
	
}

function deleteKegiatan($tabel,$id) {
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM $tabel WHERE id=$id";
	mysqli_query($koneksi, $query);
}

?>
