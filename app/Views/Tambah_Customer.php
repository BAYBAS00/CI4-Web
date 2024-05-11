<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Data Customer</title>
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
                <h2>Tambah Data Customer</h2>
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

                <form action="<?= url_to('Customer::store') ?>" method="post">
                    <div class="form-group row">
                        <label for="nama_cust" class="col-sm-2 col-form-label">Nama Customer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_cust" name="nama_cust" placeholder="Nama Customer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= url_to('Customer::index') ?>" class="btn btn-secondary">Kembali</a>
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