<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <title>Data Siswa</title>
</head>

<body>

    <div class="container mt-5">

        <!-- Navigation Links -->
        <div class="mb-4">
            <a class="btn btn-primary mr-2" href="tambah.php">Tambah Data</a>
            <a class="btn btn-danger" href="logout.php">Log Out</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="index.php" class="mb-4">
            <div class="form-group">
                <label for="search">Cari Berdasarkan NIS dan NAMA</label>
                <input type="text" name="search" id="search" class="form-control" value="<?= @$search ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <button type="submit" name="reset" class="btn btn-secondary">🔃</button>
        </form>

        <!-- Student Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS 
                        <a href="index.php?sort=nis&order=asc">↑</a> 
                        <a href="index.php?sort=nis&order=desc">↓</a>
                    </th>
                    <th>Nama Lengkap 
                        <a href="index.php?sort=nama_lengkap&order=asc">↑</a> 
                    <a href="index.php?sort=nama_lengkap&order=desc">↓</a></th>
                    <th>Jenis Kelamin </th>
                    <th>Kelas 
                        <a href="index.php?sort=kelas&order=asc">↑</a> 
                        <a href="index.php?sort=kelas&order=desc">↓</a>
                    </th>
                    <th>No Telepon</th>
                    <th>Alamat </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                while ($siswa = $listSiswa->fetch_array()) { ?>
                    <tr>
                        <td>
                            <img src="<?= base_url() ?>/media/<?= $siswa['file'] ?>" width="80px" alt=""/>
                        </td>
                        <td><?= $siswa['nis'] ?></td>
                        <td><?= $siswa['nama_lengkap'] ?></td>
                        <td><?= $siswa['jenis_kelamin'] ?></td>
                        <td><?= isset($siswa['nama_kelas']) ? $siswa['nama_kelas'] : ''; ?></td>
                        <td><?= $siswa['no_telp']?></td>
                        <td><?= $siswa['alamat'] ?></td>
                        <td>
                            <a href="edit.php?nis=<?= $siswa['nis'] ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btnDelete" data-toggle="modal" data-target="#confirmDeleteModal" data-nis="<?= $siswa['nis'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data <b><span id="siswaName"></span></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Ajax-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
            $(".btnDelete").click(function() {
                var nis = $(this).data("nis");
                var url = "delete.php?nis=" + nis;

                $("#confirmDeleteBtn").attr("data-url", url);
                $("#confirmDeleteBtn").attr("data-nis", nis);

                $("#confirmDeleteModal").modal("show");
            });

            $(".modal-footer .btn-secondary").click(function() {
                $("#confirmDeleteModal").modal("hide");
            });

            $("#confirmDeleteModal .close").click(function() {
                $("#confirmDeleteModal").modal("hide");
            });

            $("#confirmDeleteBtn").click(function() {
                var url = $(this).attr("data-url");
                var nis = $(this).attr("data-nis");
                console.log(url)
                $.post(url, function(data) {
                    console.log("Server response:", data);
                    console.log('url : ' + url);
                    console.log('nis : ' + nis);

                    if (data) {
                        $("#" + nis).remove();
                        toastr.success('Data berhasil dihapus', 'Informasi');
                        setTimeout(function() {
                            window.location.reload();
                        }, 200);
                    } else {
                        toastr.error('Gagal menghapus data', 'Error');
                    }
                });
                $('#confirmDeleteModal').modal('hide');
            });
        });
</script>

</body>
</html>
