<?php 
    include('header.php'); 
    include('../fungsi.php');
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h4 mb-0 text-light-800">Welcome <?= $_SESSION['username'] ?></h3>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Kriteria
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getJumlahKriteria(); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah User
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getJumlahuser(); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Soal
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getJumlahsoal(); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="row">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
Content Row -->
<?php include('footer.php'); ?>