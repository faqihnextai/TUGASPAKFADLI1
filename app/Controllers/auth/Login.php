<?php

namespace App\Controllers\Auth;

use Myth\Auth\Controllers\LoginController as BaseLogin;

class Login extends BaseLogin
{
    public function login()
    {
        // custom tampilan login
        return view('auth/custom_login');
    }
}
