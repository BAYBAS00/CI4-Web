<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $customer;
    protected $rules;

    public function __construct()
    {
        $this->customer = new CustomerModel();
        $this->rules   = [
            'nama_cust'  => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ];
    }

    public function index()
    {

        if (!session()->has('username')) {
            return redirect('Login::index');
        }
        $data = [
            'DataCustomer'  => $this->customer->paginate('5', 'customer'),
            'title' => 'List Customer',
            'pager' => $this->customer->pager,
        ];

        return view('customer', $data);
    }

    public function create()
    {
        return view('tambah_customer', ['title' => 'Tambah Customer']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->customer->save($data);


        $token = getenv('TOKEN_BOT'); //token bot
        $datas = [
            'text' => 'User ' . session()->get('username') . ' menambahkan customer ' . $data['nama_cust'],
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

        return redirect()->route('Customer::index')->with('message', 'Sukses tambah data');
    }
}
