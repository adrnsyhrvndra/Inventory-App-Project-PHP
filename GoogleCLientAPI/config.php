<?php

    //start session on web page

    @session_start();

    //config.php

    //Include Google Client Library for PHP autoload file

    require_once 'googleapi/vendor/autoload.php';

    //Make object of Google API Client for call Google API

    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID

    $google_client->setClientId('459056196779-2f5nk78npvekmrmc3bbir0kl0b5g5bob.apps.googleusercontent.com');

    //Set the OAuth 2.0 Client Secret key

    $google_client->setClientSecret('fye4go_UD9MpDqtYHaSSWYJX');

    //Set the OAuth 2.0 Redirect URI

    $google_client->setRedirectUri('http://localhost/Sistem-Informasi-Inventaris-Kasir-PHP-7/index.php');

    // to get the email and profile 

    $google_client->addScope('email');

    $google_client->addScope('profile');

?>