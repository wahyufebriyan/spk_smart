<?php
if(!isset($_SESSION)){
    session_start();
}
    
require "config.php";

$nisn = $password = "";
$nisn_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    if(empty(trim($_POST["nisn"]))){
        $nisn_err = "masukan nisn";
    }else{
        $nisn = trim($_POST["nisn"]);
    }
    if(empty($nisn_err)){
        
        $sql = "SELECT nisn FROM user WHERE nisn = ?";
        
        if($stmt = mysqli_prepare($koneksi, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_nisn);
            
            $param_nisn = $nisn;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }

            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $nisn);
            }else{
                $nisn_err = "nisn salah";
            }
        }else{
            echo "UPS! eror";
        }		
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "masukan password";
    }elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "password minimal 4 karakter";
    } else{
        $password = trim($_POST["password"]);
    }    
    if(empty($nisn_err) && empty($password_err)){
        
        $sql = "UPDATE user SET nisn=(?), pass=(?) WHERE nisn=$nisn";

        if($stmt = mysqli_prepare($koneksi, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_nisn, $param_password);

            $param_nisn = $nisn;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            }else{
                echo "gagal ganti password";
            }
        }
    }

    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/undraw_rocket.svg" alt="bg-login">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. 
                                            Just enter your Nisn below and we'll send you a link to reset your password!</p>
                                        <p><span class="msg-error"><?= $nisn_err; ?></span>
                                        <p><span class="msg-error"><?= $password_err; ?></span>
                                    </div>
                                    <form class="user" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" 
                                            name="nisn" id="nisn" placeholder="Enter Nisn...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" 
                                            name="password" id="password" placeholder="New Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>