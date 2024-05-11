<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Data Barang</title>
</head>

<style>
    body {
        background: #87CEEB !important;
    }

    .card-header {
        background-color: #A0DEFF;
    }
</style>

<body>
    <?php include 'Navbar.php' ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Data Barang</h2>
            </div>
            <div class="card-body">
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

                <form action="<?= url_to('Barang::store') ?>" method="post">
                    <div class="form-group row mb-2">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= url_to('Barang::index') ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>