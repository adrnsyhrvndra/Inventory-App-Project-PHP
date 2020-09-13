
<?php

    include('../inc/koneksi.php');

    @session_start(); // Start session nya

    $query = "SELECT  tb_pegawai. *,  tb_login. * FROM tb_pegawai INNER JOIN tb_login on tb_login.id_pegawai=tb_pegawai.id_pegawai WHERE email = '{$_SESSION['email']}' ";

    $hasil = mysqli_query($connect,$query);

    $row = mysqli_fetch_assoc($hasil);

    if (@!$_SESSION['email']) {

        header('location: ../index.php'); // Kita Redirect ke halaman login

    } elseif(@$_SESSION['email'] !== $row['email']){

        //logout.php

        include('../GoogleCLientAPI/config.php');

        //Reset OAuth access token

        $google_client->revokeToken();

        //Destroy entire session data.

        session_unset();

        session_destroy();

        header('location: ../inc/404.php'); // Kita Redirect ke halaman login

    }

?>

HALLO INVENTARIS ANDA BERHASWIL LOGIN

<?php

    echo $row['email']; 

    echo $row['status']; 

?>

<?php echo '<h3><b>Email :</b> '.$_SESSION['email'].'</h3>'; ?>

<br>

<a href="../inc/logout.php">Logout</a>