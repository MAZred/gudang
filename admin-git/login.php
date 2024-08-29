<?php
session_start();
if (isset($_SESSION['level'])) {
    header("Location: index.php");
    exit();
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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">
                    
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="">
                           
                            <div class="col-lg-">
                                <div class="p-4">
                                    <div class="text-center">
                                    <img src="img/distanhortic.png" height="114px" width="114px" alt="">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>

                    <?php
                                    if (!empty($_GET['pesan'])) {
                                    switch ($_GET['pesan']) {
                                    case 'login_kosong':
                    ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong> Username atau Password Kosong
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                    <?php
                                    break;
                                    case 'login_salah':
                    ?>      
                    
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Maaf!</strong> Username atau Password Tidak Ada
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                    <?php
                                    break;
                                    case 'logout_berhasil':
                    ?> 
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     <strong></strong> Logout Berhasil
                        
                                     </div>
                    <?php
                                 break;
                             }
                         }
            
                     ?>
                                    <form action="login-proses.php" method="post">
                                 <div class="mb-3">
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                                    </div>

                                 <div class="mb-3">
                                 <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                        <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">

                            </form>
                                            </div>
                                        

                            


                                        <hr>
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>

</html>