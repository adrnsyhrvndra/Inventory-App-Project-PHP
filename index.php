<?php 

    // @session_start();

    // include 'inc/koneksi.php';

    // if (@$_SESSION['email']) {

    //     header('location: index.php'); // Kita Redirect ke halaman login

    // }

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">

        <meta name="author" content="">

        <!-- Favicon -->

        <link href="img/logo/logo.png" rel="icon">

        <title>RuangAdmin - Login</title>

        <?php include('assets/styleLogin.php'); ?>

        <?php include('assets/scriptLogin.php'); ?>

    </head>

    <body class="bg-gradient-login">

        <!-- cek pesan notifikasi -->
        
        <?php 

            if(isset($_GET['pesan'])){

                if($_GET['pesan'] == "gagal"){

                    echo '<script>swal("Login Gagal!", "Maaf login gagal,cek kembali email dan passwordmu!", "error");</script>';

                } elseif($_GET['pesan'] == "logout"){

                    echo '<script>swal("Logout Berhasil!", "Logout telah berhasil,nikmati waktu istirahatmu!", "success");</script>';

                }

            }

        ?>

        <!-- Login Content -->
        <div class="container-login" >

            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card shadow-sm my-5">

                        <div class="card-body p-0">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="login-form">

                                        <div class="text-center">

                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>

                                        </div>

                                        <form class="user" action="inc/cek_login.php" method="post">

                                            <div class="form-group">

                                                <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address">

                                            </div>

                                            <div class="form-group">

                                                <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">

                                            </div>

                                            <div class="form-group">

                                                <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">

                                                    <input type="checkbox" class="custom-control-input" id="customCheck">

                                                    <label class="custom-control-label" for="customCheck">Remember Me</label>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <button type="submit" class="btn btn-primary btn-block">Login</button>

                                            </div>

                                            <hr>

                                        </form>

                                            <?php

                                                //index.php

                                                //Include Configuration File

                                                include('GoogleCLientAPI/config.php');

                                                $login_button = '';

                                                if(isset($_GET["code"])){

                                                    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

                                                    if(!isset($token['error'])){
                                                    
                                                        $google_client->setAccessToken($token['access_token']);

                                                        
                                                        $_SESSION['access_token'] = $token['access_token'];


                                                        $google_service = new Google_Service_Oauth2($google_client);

                                                        
                                                        $data = $google_service->userinfo->get();

                                                    
                                                        if(!empty($data['given_name'])){

                                                            $_SESSION['nama_depan_pegawai'] = $data['given_name'];

                                                        }

                                                        if(!empty($data['family_name'])){

                                                            $_SESSION['nama_belakang_pegawai'] = $data['family_name'];

                                                        }

                                                        if(!empty($data['email'])){

                                                            $_SESSION['email'] = $data['email'];

                                                        }

                                                        if(!empty($data['gender'])){

                                                            $_SESSION['jenis_kelamin_pegawai'] = $data['gender'];

                                                        }

                                                    }

                                                }

                                                if(!isset($_SESSION['access_token'])){

                                                    $login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-google btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Login With Google</a>';
                                                
                                                }

                                            ?>

                                            <!-- Login Google Button -->

                                            <?php if(!$login_button == ''){ ?>

                                                <?php echo $login_button; ?>

                                            <?php } else{ header("location:StaffInventaris/index.php"); } ?>

                                            <a href="index.html" class="btn btn-facebook btn-block">

                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook

                                            </a>

                                        

                                        <hr>

                                        <div class="text-center">

                                            <a class="font-weight-bold small" href="register.html">Create an Account!</a>

                                        </div>

                                        <!-- <div class="panel panel-default">
                                            <?php
                                            // if($login_button == '')
                                            // {
                                            //     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                            //     echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                                            //     echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                                            //     echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                                            //     echo '<h3><a href="GoogleCLientAPI/logout.php">Logout</h3></div>';
                                            // }
                                            // else
                                            // {
                                            //     echo '<div align="center">'.$login_button . '</div>';
                                            // }
                                            ?>
                                        </div> -->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>

        </div>

    </body>

</html>