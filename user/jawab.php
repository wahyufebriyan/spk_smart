<?php
if(!isset($_SESSION)){
    session_start();
}
    include "../config.php";
    if(isset($_POST['submit'])){
        if(empty($_POST['pilihan'])){
        ?>
            <script language="JavaScript">
                alert('Oops! Serius. Anda tidak mengerjakan soal apapun ...');
                document.location='./';
            </script>
        <?php
        }
        
        $pilihan    =$_POST["pilihan"];
        $no_soal    =$_POST["id"];
        $jumlah        =$_POST["jumlah"];
        
        $score    =0;
        $benar    =0;
        $salah    =0;
        $kosong    =0;

        for($i=0;$i<$jumlah;$i++){
            $nomor    =$no_soal[$i];
            
            // jika peserta tidak memilih jawaban
            if(empty($pilihan[$nomor])){
                $kosong++;
            }
            // jika memilih
            else {
                $jawaban    =$pilihan[$nomor];

                // cocokan kunci jawaban dengan database
                $query    =mysqli_query($koneksi, "SELECT * FROM soal_kuis WHERE no='$nomor' AND kunci_jwb='$jawaban'");
                $cek    =mysqli_num_rows($query);
                
                // jika jawaban benar (cocok dengan database)
                if($cek){
                    $benar++;
                }
                // jika jawaban salah (tidak cocok dengan database)
                else {
                    $salah++;
                }
            }
            /*
                ----------
                Nilai 100
                ----------
                Hasil = 100 / jumlah soal * Jawaban Benar
            */
            // script php membuat soal pilihan ganda
            // hitung skor
            $hitung =mysqli_query($koneksi, "SELECT * FROM soal_kuis");
            $jumlah_soal    =mysqli_num_rows($hitung);
            $score    =100 / $jumlah_soal * $benar;
            $hasil    =number_format($score,2);


        $query = "UPDATE raport_siswa SET nilai_kuis='$hasil' WHERE nisn='$_SESSION[nisn]'";
        $result = mysqli_query($koneksi,$query);
        if (!$result) {
            echo "Gagal mengupdate";
            exit();
        };

            
        }
    }
    include "header.php";
?>

<div class="card text-center">
    <div class="card-header">
      Nilai Ujian Anda
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Benar</h5>
                        <p class="card-text">
                            <?= $benar ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Salah</h5>
                        <p class="card-text">
                            <?= $salah ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tidak Terjawab</h5>
                        <p class="card-text">
                            <?= $kosong ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Nilai Akhir</h5>
                        <p class="card-text">
                            <?= $hasil ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="hasil_.php" class="btn btn-primary">Cek Kelulusan (Metode Smart)</a>
    </div>
</div>

<?php include "footer.php"; ?>