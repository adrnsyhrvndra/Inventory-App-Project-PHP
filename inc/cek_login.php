<?php 

    @session_start();

    include 'koneksi.php';

    $email 	     = addslashes($_POST['email']);

    $password    = addslashes($_POST['password']);

    $query 	     = mysqli_query($connect,"SELECT * FROM `tb_login` WHERE `email` = '$email' AND `password`= md5('$password') ");

    $hasil 	     = mysqli_num_rows($query);

    $data 	     = mysqli_fetch_array($query);

    if ($hasil == 1) {

        $_SESSION['email'] = $data['email'];

        if ($data['status'] == "staff_inventaris") {
            
            header("location:../StaffInventaris/index.php?pesan=berhasil");
        
        } else {
            
            header("location:../Kasir/index.php?pesan=berhasil");
        
        }

    }

        else{

        header("location:../index.php?pesan=gagal");

    }

?>