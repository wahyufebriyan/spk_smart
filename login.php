<?php
if(!isset($_SESSION)){
    session_start();
}
    
require ("config.php");

$nisn = $password ="";
$nisn_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(empty(trim($_POST["nisn"]))){
        $nisn_err = "masukan nisn";
    }else{
        $nisn = trim($_POST["nisn"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "masukan password";
    }else{
        $password = trim($_POST["password"]);
    }
    
  
    if(empty($nisn_err) && empty($password_err)){
        
        $sql = "SELECT id, nisn, username, pass, role FROM user WHERE nisn = ?";
        
        if($stmt = mysqli_prepare($koneksi, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_nisn);
            
            $param_nisn = $nisn;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }

            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id, $nisn, $username, $hashed_password, $role);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        if($role=="user"){
                            if(!isset($_SESSION)){
                                session_start();
                            }
                            $_SESSION["role"] = 'user';
                            $_SESSION["nisn"] = $nisn;
                            $_SESSION["username"] = $username;
                            header("location:user/dashboard.php");
                        }else if($role=="admin") {
                            if(!isset($_SESSION)){
                                session_start();
                            }
                            $_SESSION["role"] = 'admin';
                            $_SESSION["nisn"] = $nisn;
                            $_SESSION["username"] = $username;
                            header("location:admin/dashboard.php");
                        }
                        
                    }else{
                        $password_err = "password salah";
                    }  
                } 
            }else{
                $nisn_err = "nisn salah";
            }
        }else{
            echo "UPS! eror";
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

    <div class="container">
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
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                <p><span class="msg-error"><?= $nisn_err; ?></span>
                                <p><span class="msg-error"><?= $password_err; ?></span>
                            </div>
                            <form class="user" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                    name="nisn" id="nisn" placeholder="Enter Nisn">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" 
                                    name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form><hr>
                            <div class="text-center">
                                <a class="small" href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.php">Create an Account!</a>
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