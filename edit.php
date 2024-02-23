<?php 
include 'lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['id_kelas'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];  
    $file = $_POST['foto'];
    $foto = $_FILES['foto'];

    if (!empty($foto) AND $foto ['error'] == 0){
        $path = './media/';
        $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

        if (!$upload){
            flash('error', "Upload file gagal");
            header('location:index.php');
        }
        $file = $foto['name'];
    }

    $sql = "UPDATE siswa SET nis = '$nis',
    nama_lengkap = '$nama_lengkap',
    jenis_kelamin = '$jenis_kelamin',
    id_kelas = '$kelas',
    no_telp = '$no_telp',
    alamat = '$alamat',
    file = '$file' WHERE nis = '$nis'";

    $mysqli->query($sql) or die ($mysqli->error);
    
    header('location: index.php');
}
$sql = "SELECT * FROM t_kelas";
$dataKelas = $mysqli->query($sql) or die ($mysqli->error);

$nis = $_GET['nis'];

if (empty($nis)) header('location: index.php');

$sql = "SELECT * FROM siswa WHERE nis = '$nis' ";
$query = $mysqli->query($sql);
$siswa = $query->fetch_array();

if (empty($siswa)) header ('location: index.php');

include 'views/v_tambah.php';
?>