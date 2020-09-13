<?php

    //logout.php

    include('../GoogleCLientAPI/config.php');

    //Reset OAuth access token
    $google_client->revokeToken();

    session_start(); // Start session nya

    session_destroy(); // Hapus semua session

    header("location: ../index.php?pesan=logout"); // Redirect ke halaman index.php

?>