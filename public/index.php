<?php

// menjalankan session
if ( !session_id() ) {
    session_start();
}

// require file init (file utama)
require_once '../app/init.php';

// inisiasi applikasi
$app = new App;