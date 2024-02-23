<?php
include 'lib/library.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {        
    $nis = $_GET['nis'];

    $sql = "DELETE FROM siswa WHERE nis = '$nis' ";
    $mysqli->query($sql) or die ($mysqli->error);

    echo '1';

    header('Location: index.php');
    exit;
}