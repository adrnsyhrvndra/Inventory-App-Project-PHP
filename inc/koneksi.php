
<!-- Untuk SweetAlert.js -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

    // Koneksi untuk server lokal

    $server = "localhost";

    $username = "root";

    $password = "";

    $database = "db_inventory";

    $connect = mysqli_connect($server, $username, $password, $database);

    if(mysqli_connect_error()){

        // Jika Database Terkoneksi Maka akan muncul Alert

        echo '<script>swal("Database Error!", "Maaf database tidak terkoneksi,cek kembali!", "error");</script>';

    }

?>
