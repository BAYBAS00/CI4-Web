<?php
namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\CustomerModel;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController {
    protected $customer;
    protected $barang;
    protected $rules;
    protected $transaksi;
    protected $detailTransaksi;

    public function __construct()
    {
        $this->customer          = new CustomerModel();
        $this->barang           = new BarangModel();
        $this->transaksi       = new TransaksiModel();
        $this->detailTransaksi = new DetailTransaksiModel();

        $this->rules = [
            'no_transaksi'   => 'required',
            'id_cust'      => 'required',
            'tgl_jual' => 'required',
            'id_barang'       => 'required',
            'qty'              => 'required',
            'total'        => 'required',
            'diskon'         => 'required',
            'ppn'              => 'required',
            'grand_total'              => 'required',
        ];
    } 

    public function index ()
    {

        if (!session()->has('username')) {
            return redirect('Login::index');
        }
        $transaksis = $this->transaksi
            ->select('tjual.*, tcustomer.nama_cust')
            ->join('tcustomer', 'tjual.id_cust = tcustomer.id_cust')
            ->paginate(5, 'transaksi');

        foreach ($transaksis as &$row) {
            $row['details'] = $this->detailTransaksi
                ->select('tjual_detil.*, tbarang.nama_barang ')
                ->join('tbarang', 'tbarang.id_barang = tjual_detil.id_barang')
                ->where('tjual_detil.id_jual', $row['id_jual'])
                ->findAll();
        }

        $data = [
            'data'  => $transaksis,
            'title' => 'List Transaksi',
            'pager' => $this->transaksi->pager,
        ];

        return view('transaksi', $data);
    }

    public function create ()
    {
        $data = [
            'title'    => 'Tambah Transaksi',
            'customer' => $this->customer->findAll(),
            'product'  => $this->barang->findAll(),
        ];

        return view('tambah_transaksi', $data);
    }

    public function store ()
    {
         $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }
        
        $transaksi = $this->transaksi->insert($data);
        $dataDetail  = [];

        foreach ($data['id_barang'] as $key => $idBarang) {
            $dataDetail[] = [
                'id_jual' => $transaksi,
                'id_barang'     => $idBarang,
                'qty'            => $data['qty'][$key],
                'harga_jual'          => $data['harga_jual'][$key],
                'jumlah'         => $data['jumlah'][$key],
            ];
        }

        $this->detailTransaksi->insertBatch($dataDetail);

        $token = getenv('TOKEN_BOT'); //token bot
        $datas = [
            'text' => 'User ' . session()->get('username') . ' menambahkan Transaksi ' . $data['no_transaksi'],
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

        return redirect()->route('Transaksi::index')->with('message', 'Sukses tambah data');
    }
}