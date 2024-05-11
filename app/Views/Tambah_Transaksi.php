<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tambah Transaksi</title>

    <!-- css -->
    <style>
        body {
            background: #87CEEB !important;
        }

        .card-header {
            background-color: #A0DEFF;
        }

        table,
        th {
            border: 1px solid black;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include 'Navbar.php' ?>
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header">
                <h1>Tambah Transaksi</h1>
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
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <form action="<?= url_to('Transaksi::store') ?>" method="post">
                    <div class="row mb-4 items-container">
                        <div class="col-md-6">
                            <div class="form-group row mb-4">
                                <label for="id_customer" class="col-sm-4 col-form-label">Customer</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="id_cust" id="id_cust">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($customer as $row) : ?>
                                            <option value="<?= $row['id_cust'] ?>"><?= $row['nama_cust'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="no_transaksi" class="col-sm-4 col-form-label">No Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" placeholder="No Transaksi" value="TJL<?= date('HisYmd') ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="tgl_jual" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tgl_jual" name="tgl_jual">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group table-responsive">
                                <table class="table table-bordered border-black">
                                    <!-- Dynamic input for items -->
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic_rows">
                                        <tr id="row_1" class="dynamic_row">
                                            <td>
                                                <select name="id_barang[]" class="form-control" style="min-width: 8rem;" onchange="harga(1)">
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach ($product as $row) : ?>
                                                        <option value="<?= $row['id_barang'] ?>"><?= $row['nama_barang'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="number" name="qty[]" class="form-control" style="min-width: 4rem;" onchange="hitungTotal()" value="1"></td>
                                            <td><input type="text" name="harga_jual[]" class="form-control" style="min-width: 8rem;" value="0" readonly></td>
                                            <td><input type="text" name="jumlah[]" class="form-control" style="min-width: 10rem;" value="0" readonly></td>
                                            <td><button type="button" class="btn btn-success" onclick="tambah()">Tambah</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-6">
                            <table class="table table-bordered border-black">
                                <tr>
                                    <th>Total</th>
                                    <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly></td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Diskon" value="0" onchange="calculatePayableTotal()">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <th>PPN</th>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="ppn" id="ppn" placeholder="PPN" value="0" onchange="calculatePayableTotal()">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td><input type="number" class="form-control" name="grand_total" id="grand_total" placeholder="Grand Total" readonly></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mr-2">
                            <a href="<?= url_to('Transaksi::index') ?>" class="btn btn-secondary form-control">Kembali</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let rowNumber = 1;

        function tambah() {
            let newRow = document.querySelector('#row_1').cloneNode(true);

            newRow.id = `row_${++rowNumber}`;
            newRow.querySelector('select[name="id_barang[]"]').setAttribute('onchange', `harga(${rowNumber})`);
            newRow.querySelector('input[name="qty[]"]').setAttribute('onchange', 'hitungTotal()');

            newRow.querySelector('input[name="qty[]"]').value = 1;
            newRow.querySelector('input[name="harga_jual[]"]').value = 0;
            newRow.querySelector('input[name="jumlah[]"]').value = 0;

            newRow.querySelector('button').classList.remove('btn-primary');
            newRow.querySelector('button').classList.add('btn-danger');
            newRow.querySelector('button').innerHTML = 'Hapus';
            newRow.querySelector('button').setAttribute('onclick', `hapus(${rowNumber})`);

            document.getElementById('dynamic_rows').appendChild(newRow);
        }

        function hapus(rowNum) {
            document.getElementById(`row_${rowNum}`).remove();

            hitungTotal();
        }

        async function harga(rowNum) {
            const productId = document.querySelector(`#row_${rowNum} select[name='id_barang[]']`).value;

            try {
                const response = await fetch(`/barang/${productId}`);
                const data = await response.json();

                document.querySelector(`#row_${rowNum} input[name='harga_jual[]']`).value = data.harga_jual;
            } catch (error) {
                console.error(error);
            }

            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;

            document.querySelectorAll('.dynamic_row').forEach(row => {
                let qty = parseFloat(row.querySelector('input[name="qty[]"]').value);
                let price = parseFloat(row.querySelector('input[name="harga_jual[]"]').value);
                let amount = qty * price;

                row.querySelector('input[name="jumlah[]"]').value = amount.toFixed(0);
                total += amount;
            });

            document.getElementById('total').value = total.toFixed(0);

            calculatePayableTotal();
        }

        function calculatePayableTotal() {
            let subTotal = parseFloat(document.getElementById('total').value);
            let discount = parseFloat(document.getElementById('diskon').value);
            let tax = parseFloat(document.getElementById('ppn').value);
            let total = subTotal - (subTotal * discount / 100) + (subTotal * tax / 100);

            document.getElementById('grand_total').value = total.toFixed(0);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>