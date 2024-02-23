<?php
include 'lib/library.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $nis = @$_POST['nis'];
    $nama_lengkap = @$_POST['nama_lengkap'];
    $jenis_kelamin = @$_POST['jenis_kelamin'];
    $kelas = @$_POST['id_kelas'];
    $no_telp = @$_POST['no_telp'];
    $alamat = @$_POST['alamat'];
    $foto = @$_FILES['foto'];

    if (empty($nis)) {
        flash ('error', 'Mohon masukan NIS dengan benar');
    } else if (empty($nama_lengkap)) {
        flash('error', 'Mohon masukan Nama Lengkap dengan benar');
    } else {
        if (!empty($foto) AND $foto['error'] == 0) {
            $path = './media/';
            $upload = move_uploaded_file($foto['tmp_name'], $path . $foto ['name']);
    
            if (!$upload) {
                flash('error', "Upload file gagal");
                header('location:index.php');
            }
            $file = $foto['name'];
        }
    }

    $sql = "INSERT INTO siswa (nis, nama_lengkap, jenis_kelamin, id_kelas, no_telp, alamat, file)
    VALUES ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas', '$no_telp', '$alamat', '$file')";

    $mysqli->query($sql) or die ($mysqli->error);

    header('location: index.php');
}

$success = flash('success');
$error = flash('error');

$sql = "SELECT * FROM t_kelas";
$dataKelas = $mysqli->query($sql) or die ($mysqli->error);

include 'views/v_tambah.php';
?>