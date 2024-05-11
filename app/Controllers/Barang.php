<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $barang;
    protected $rules;

    public function __construct()
    {
        $this->barang = new BarangModel();
        $this->rules   = [
            'nama_barang'  => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
        ];
    }

    public function index()
    {

        if (!session()->has('username')) {
            return redirect('Login::index');
        }
        $data = [
            'DataBarang'  => $this->barang->paginate('5', 'barang'),
            'title' => 'List Barang',
            'pager' => $this->barang->pager,
        ];

        return view('barang', $data);
    }

    public function detail(int $id)
    {
        return $this->response->setJSON($this->barang->find($id));
    }

    public function create()
    {
        return view('tambah_barang', ['title' => 'Tambah Barang']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->barang->save($data);


        $token = getenv('TOKEN_BOT'); //token bot
        $datas = [
            'text' => 'User ' . session()->get('username') . ' menambahkan barang ' . $data['nama_barang'],
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

        return redirect()->route('Barang::index')->with('message', 'Sukses tambah data');
    }
}