<?php
include('../fungsi.php');
include("header.php"); 

?>
<h1 class="h3 mb-2 text-gray-800">Kuis</h1>
<!-- kuis -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Harap Jawab Pertanyaan Berikut Ini</h6>
	</div>
	<div class="card-body">
        <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a> 
            </div>
            <div class="stepwizard-step"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            </div>
            <div class="stepwizard-step"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            </div>
            <div class="stepwizard-step"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            </div><hr>
            <form method="post" action="jawab.php">
                <?php
		            $query = "SELECT * FROM soal_kuis ORDER BY no";
		            $result	= mysqli_query($koneksi, $query);
                    $jumlah = mysqli_num_rows($result);

		            $no=[];$soal=[];$j_a=[];$j_b=[];$j_c=[];$j_d=[];$kunci=[];
		            while ($row = mysqli_fetch_array($result)) {
                        $no[]= $row['no'];
                        $soal[]= $row['soal']; 
                        $j_a[]= $row['jwb_a']; 
                        $j_b[]= $row['jwb_b']; 
                        $j_c[]= $row['jwb_c']; 
                        $j_d[]= $row['jwb_d']; 
                        $kunci[]= $row['kunci_jwb'];                    
		        ?>
                    <input type="hidden" value="<?= $row['no']?>" name="id[]">
                    <input type="hidden" value="<?= $jumlah?>" name="jumlah">
                <?php } ?>

                <div class="panel panel-success setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[0]?>. <?= $soal[0] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[0]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[0] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[0]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[0] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[0]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[0] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[0]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[0] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[1]?>. <?= $soal[1] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[1]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[1] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[1]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[1] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[1]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[1] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[1]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[1] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[2]?>. <?= $soal[2] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[2]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[2] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[2]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[2] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[2]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[2] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[2]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[2] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[3]?>. <?= $soal[3] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[3]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[3] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[3]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[3] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[3]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[3] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[3]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[3] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[4]?>. <?= $soal[4] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[4]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[4] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[4]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[4] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[4]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[4] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[4]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[4] ?></label>
                            </div><br>
                        </div>
                        <button class="btn btn-success nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-success setup-content" id="step-2">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[5]?>. <?= $soal[5] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[5]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[5] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[5]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[5] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[5]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[5] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[5]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[5] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[6]?>. <?= $soal[6] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[6]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[6] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[6]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[6] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[6]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[6] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[6]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[6] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[7]?>. <?= $soal[7] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[7]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[7] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[7]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[7] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[7]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[7] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[7]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[7] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[8]?>. <?= $soal[8] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[8]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[8] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[8]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[8] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[8]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[8] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[8]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[8] ?></label>
                            </div><br>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[9]?>. <?= $soal[9] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[9]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[9] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[9]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[9] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[9]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[9] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[9]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[9] ?></label>
                            </div><br>
                        </div>
                        <button class="btn btn-success nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-success setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[10]?>. <?= $soal[10] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[10]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[10] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[10]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[10] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[10]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[10] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[10]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[10] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[11]?>. <?= $soal[11] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[11]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[11] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[11]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[11] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[11]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[11] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[11]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[11] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[12]?>. <?= $soal[12] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[12]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[12] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[12]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[12] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[12]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[12] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[12]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[12] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[13]?>. <?= $soal[13] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[13]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[13] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[13]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[13] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[13]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[13] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[13]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[13] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[14]?>. <?= $soal[14] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[14]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[14] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[14]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[14] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[14]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[14] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[14]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[14] ?></label>
                            </div><br>
                        </div>
                        <button class="btn btn-success nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-success setup-content" id="step-4">
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[15]?>. <?= $soal[15] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[15]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[15] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[15]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[15] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[15]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[15] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[15]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[15] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[16]?>. <?= $soal[16] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[16]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[16] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[16]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[16] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[16]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[16] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[16]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[16] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[17]?>. <?= $soal[17] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[17]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[17] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[17]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[17] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[17]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[17] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[17]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[17] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[18]?>. <?= $soal[18] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[18]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[18] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[18]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[18] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[18]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[18] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[18]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[18] ?></label>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" 
                            value="<?= $no[19]?>. <?= $soal[19] ?>" disabled><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[19]?>]"
                                id="exampleRadios1" value="A">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_a[19] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[19]?>]"
                                id="exampleRadios1" value="B">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_b[19] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[19]?>]"
                                id="exampleRadios1" value="C">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_c[19] ?></label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilihan[<?=$no[19]?>]"
                                id="exampleRadios1" value="D">
                                <label class="form-check-label" for="exampleRadios1"><?= $j_d[19] ?></label>
                            </div><br>
                        </div>
                        <button class="btn btn-success pull-right" type="submit" name="submit">Finish!</button>
                    </div>
                </div>
            </form>
        </div>
        </div><!-- end wizard -->
	</div>
</div>
<?php include("footer.php"); ?>