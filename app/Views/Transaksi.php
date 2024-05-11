<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Data Transaksi</title>
</head>

<style>
    body {
        background: #87CEEB;
    }

    .card-header {
        background-color: #A0DEFF;
    }

    table,
    th {
        text-align: center;
    }
</style>

<body>
    <?php include 'Navbar.php' ?>
    <div class="card">
        <div class="card-header">
            <h1>Data Transaksi</h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if (!empty(session()->getFlashdata('message'))) : ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                            <?php echo session()->getFlashdata('message'); ?>
                        </strong>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php endif ?>


                <a href="<?= url_to('Transaksi::create') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
                <table class="table table-bordered table-striped table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['no_transaksi'] ?></td>
                                <td><?= $row['nama_cust'] ?></td>
                                <td><?= $row['tgl_jual'] ?></td>
                                <td class="text-center">
                                    <button class="btn text-dark btn-info fa fa-info" type="button" data-bs-toggle="collapse" data-bs-target="#coll-<?= $row['id_jual'] ?>" aria-expanded="false" aria-controls="coll-<?= $row['id_jual'] ?>"> Detail</button>
                                    <a href="<?= route_to('Transaksi::edit', $row['id_jual']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                    <a href="<?= route_to('Transaksi::destroy', $row['id_jual']); ?>" class="btn text-light btn-danger fa fa-trash-o" onclick="destroy(event)"> Delete</a>
                                </td>
                            </tr>
                            <tr class="collapse multi-collapse" id="coll-<?= $row['id_jual'] ?>">
                                <td></td>
                                <td colspan="4">
                                    <div class="row g-2">
                                        <div class="col-3">
                                            <h6>Barang</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6>Quantity</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6>Harga</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6>Jumlah</h6>
                                        </div>
                                        <?php foreach ($row['details'] as $detail) : ?>
                                            <div class="col-3">
                                                <input type="text" class="table-bordered table-striped" value="<?= $detail['nama_barang'] ?>" readonly>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="table-bordered table-striped" value="<?= $detail['qty'] ?>" readonly>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="table-bordered table-striped" value="<?= $detail['harga_jual'] ?>" readonly>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="table-bordered table-striped" value="<?= $detail['jumlah'] ?>" readonly>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>