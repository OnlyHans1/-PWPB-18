<?php
include 'lib/library.php';

cekLogin();

$sql = 'SELECT siswa.*, t_kelas.nama_kelas FROM siswa INNER JOIN t_kelas 
ON siswa.id_kelas = t_kelas.id_kelas';

$order_field = isset($_GET['sort']) ? $_GET['sort'] : '';
$order_mode = isset($_GET['order']) ? $_GET['order'] : '';

//Search
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql .= " WHERE siswa.nis LIKE '%$search%' OR siswa.nama_lengkap LIKE '%$search%' OR siswa.jenis_kelamin LIKE '%$search%' OR t_kelas.nama_kelas LIKE '%$search%' OR siswa.no_telp LIKE '%$search%' OR siswa.alamat LIKE '%$search%'";
}


//Pengurutan
if (!empty($order_field) && !empty($order_mode)) {
    $sql .= " ORDER BY $order_field $order_mode";
}

$listSiswa = $mysqli->query($sql);

//Reset
if (isset($_GET['reset'])) {
    $search = '';
    header('Location: index.php');
    exit();
}

include 'views/v_index.php';
?>
