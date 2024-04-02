<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
</head>

<body>

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


                <a href="<?= url_to('Dosen::create') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Status</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($DataDosen as $key => $dosen) : ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $dosen['kode_dosen'] ?></td>
                                <td><?php echo $dosen['nama_dosen'] ?></td>
                                <td><?php echo ($dosen['status_dosen']) ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td class="text-center">
                                    <a href="/edit_dosen/<?= $dosen['id_dosen']; ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                    <a href="/hapus_dosen/<?= $dosen['id_dosen']; ?>" class=" btn btn-danger fa fa-trash-o"> Delete</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?= url_to('Home::index') ?>" class="btn btn-secondary">Home</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>