<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Tambah Data Dosen</title>
</head>

<body>
    <div class="container mt-5">
        <?php if (!empty(session()->getFlashdata('message'))) : ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('message') as $data) : ?>
                            <li>
                                <?= $data ?>
                            </li>
                        <?php endforeach ?>
                    </ul>

                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif ?>

        <form action="<?= url_to('Dosen::store') ?>" method="post">
            <h2>Tambah Data Dosen</h2>
            <div class="form-group row">
                <label for="kode_dosen" class="col-sm-2 col-form-label">Kode Dosen</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" placeholder="Kode Dosen">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_dosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Nama Dosen">
                </div>
            </div>
            <div class="form-group row">
                <label for="status_dosen" class="col-sm-2 col-form-label">Status Dosen</label>
                <div class="col-sm-10">
                    <select name="status_dosen" id="status_dosen" class="form-control">
                        <option value="">Status</option>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= url_to('Dosen::index') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>