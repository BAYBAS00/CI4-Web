<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Data Barang</title>
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
            <h1>Data Barang</h1>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php endif ?>


                <a href="<?= url_to('Barang::create') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
                <table class="table table-bordered table-striped table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($DataBarang as $key => $barang) : ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $barang['nama_barang'] ?></td>
                                <td><?php echo $barang['satuan'] ?></td>
                                <td><?php echo $barang['stok'] ?></td>
                                <td><?php echo $barang['harga_jual'] ?></td>
                                <td class="text-center">
                                    <a href="/edit_barang/<?= $barang['id_barang']; ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                    <a href="/hapus_barang/<?= $barang['id_barang']; ?>" class=" btn btn-danger fa fa-trash-o"> Delete</a>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>