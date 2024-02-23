<?php 
    include 'lib/helper.php';

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_pwpb';

    $mysqli = mysqli_connect($host, $user, $pass, $db)
    or die ('Tidak dapat koneksi ke Database')
    ?>