<?php
    
    require "config.php";
    
    $nisn = $username = $password = "";
    $nisn_err = $username_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty(trim($_POST["nisn"]))){
            $nisn_err = "masukan nisn";
        }else{
            $sql = "SELECT nisn FROM user WHERE nisn = ?";
            
            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_nisn);
                
                $param_nisn = trim($_POST["nisn"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $nisn_err = "nisn sudah ada";
                    }else{
                        $nisn = trim($_POST["nisn"]);
                    }
                }else{
                    echo "Ups! gagal";
                }
            }
        }

        if(empty(trim($_POST["username"]))){
            $username_err = "masukan username";
        }else{
            $sql = "SELECT username FROM user WHERE username = ?";
            
            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "username sudah ada";
                    }else{
                        $username = trim($_POST["username"]);
                    }
                }else{
                    echo "Ups! gagal";
                }
            }
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "masukan password";
        }elseif(strlen(trim($_POST["password"])) < 4){
            $password_err = "password minimal 4 karakter";
        } else{
            $password = trim($_POST["password"]);
        }
        
        
        if(empty($nisn_err) && empty($username_err) && empty($password_err)){
            
            $sql = "INSERT INTO user (nisn, username, pass) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_nisn, $param_username, $param_password);
                
                $param_nisn = $nisn;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                
                
                if(mysqli_stmt_execute($stmt)){
                    header("location: login.php");
                }else{
                    echo "gagal registrasi";
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

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="img/undraw_rocket.svg" alt="bg-login">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                <p><span class="msg-error"><?= $nisn_err; ?></span>
                                <p><span class="msg-error"><?= $username_err; ?></span>
                                <p><span class="msg-error"><?= $password_err; ?></span>
                            </div>
                            <form class="user" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                    name="nisn" id="nisn" placeholder="Enter Nisn">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                    name="username" id="username" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" 
                                    name="password" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                            </form><hr>
                            <div class="text-center">
                                <a class="small" href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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