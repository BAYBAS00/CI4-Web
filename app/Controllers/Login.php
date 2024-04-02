<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('View_Login');
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        if (!$this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);

                $token = getenv('TOKEN_BOT'); //token bot
                $datas = [
                    'text' => $username. ' sedang login',
                    'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
                ];

                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));


                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', ['Username & Password Salah']);
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', ['Username & Password Salah']);
            return redirect()->back();
        }
    }

    function logout()
    {
        $token = getenv('TOKEN_BOT'); //token bot
        $username = session('username'); // Mendapatkan username pengguna yang sedang logout
        $datas = [
            'text' => $username . ' telah logout',
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));
        session()->destroy();
        return redirect()->to('/login');
    }
}
