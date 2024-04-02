<?php
namespace App\Controllers;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $helpers = ['url', 'form'];
/**
 * index function
 */
public function index()
{
        if (!session()->has('username')) {
            return redirect('Login::index');
        }
    //model initialize
    $DataDosen = new DosenModel();
    $pager = \Config\Services::pager();

    $data = array(
        'DataDosen' => $DataDosen->paginate(10, 'dosen'),
        'pager' => $DataDosen->pager
    );
    return view('dosen', $data);


}

public function create()
{
    return view('tambah_dosen');
}

public function store() 
{
    $DataDosen = new DosenModel();
    $data = $this->request->getPost();
    $rules = [
        'kode_dosen'=>'required',
        'nama_dosen'=>'required',
        'status_dosen'=>'required',
    ];
    if (!$this->validateData($data, $rules)) {
      return redirect()->back()->with('message', $this->validator->getErrors());
    }

    $token = getenv('TOKEN_BOT'); //token bot
    $username = session('username');
        $datas = [
            'text' => 'User ' . session()->get('username') . ' menambahkan Dosen ' . $data['nama_dosen'],
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

    $DataDosen->save($this->request->getPost());

    return redirect()->route('Dosen::index')->with('message','Tambah Data Sukses');
}


public function edit($id_dosen) 
{
    $DataDosen = new DosenModel();
    return view('Edit_Dosen', $DataDosen->find($id_dosen));
}

public function update($id_dosen)
{
        $DataDosen = new DosenModel();
        $data = $this->request->getPost();
        $rules = [
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'status_dosen' => 'required',
        ];
        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }
        $DataDosen->update($id_dosen,$this->request->getPost());

        return redirect()->route('Dosen::index')->with('message', 'Update Data Sukses');
}

    public function destroy($id_dosen)
    {
        $DataDosen = new DosenModel();
        $DataDosen->delete($id_dosen);

        return redirect()->back()->with('message', 'Data terhapus');
    }

}