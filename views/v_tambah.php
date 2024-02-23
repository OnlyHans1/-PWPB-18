<?php
$action = 'tambah.php';
$form = '';
if (!empty($siswa)) { 
 $action = 'edit.php';
 $form = 'edit';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <title>
        <?= !empty($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa' ?>
    </title>
</head>

<body>

    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <h2>
            <?= !empty($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa' ?>
        </h2>

        <?php if (!empty($success)) { ?>
            <div class="alert alert-success">
                <p><?= $success ?></p>
            </div>
        <?php } ?>

        <?php if(!empty($error)) { ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php } ?>

        <label for="nis">NIS</label>
        <input type="text" name="nis" value="<?= @$siswa['nis'] ?>" <?= $form === 'edit' ? 'readonly' : '' ?>>

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= @$siswa['nama_lengkap'] ?>">

        <label>Jenis Kelamin</label> <br>
        <input type="radio" name="jenis_kelamin" value="L" <?= @$siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?>>Laki-laki
        <input type="radio" name="jenis_kelamin" value="P" <?= @$siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>>Perempuan <br>

        <label for="kelas">Kelas</label>
        <select name="id_kelas" class="select1">
            <option value="">[PILIH KELAS]</option>
            <?php while ($murid = @$dataKelas->fetch_array()) { ?>
                <option value="<?php echo $murid['id_kelas'] ?>" <?php echo @$siswa ['id_kelas'] == $murid['id_kelas'] ? 'selected' : '' ?>>
                <?php echo $murid['nama_kelas'] ?>
            </option>
           <?php } ?>
        </select>

        <label for="no_telp">No Telepon</label>
        <input type="text" name="no_telp" value="<?= @$siswa['no_telp']?>">

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?= @$siswa['alamat'] ?>">

        <div class="form-group">
        <label class="col-sm-2 control-label">Foto</label>
        <div class="col-sm-6">
            <?php if ($form == "edit") { ?>
                <img src="<?php echo base_url()?> /media/ <?php echo @$result->file?>" width="80px" alt="" />
                <input type="hidden" name="foto" value="<?php echo @$result->file?>" />
           <?php } ?>
           <input type="file" name="foto" />
        </div>
    </div>

        <button type="submit">Simpan</button>
    </form>

    <!-- Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
