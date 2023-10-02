<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'login',
        ];
        return view('v_login', $data);
    }
}
