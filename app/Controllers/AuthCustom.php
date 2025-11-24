<?php

namespace App\Controllers;

use Myth\Auth\Controllers\AuthController;

class AuthCustom extends AuthController
{
    public function attemptLogin()
    {
        // Jalankan login bawaan Myth:Auth
        $result = service('authentication')->attempt([
            'email'    => $this->request->getPost('login'),
            'password' => $this->request->getPost('password')
        ]);

        // Kalau gagal login
        if (! $result) {
            return redirect()->back()->with('error', service('authentication')->error() ?? 'Login gagal');
        }

        // ROLE CHECK
        if (in_groups('admin')) {
            return redirect()->to('/admin/news');
        }

        // Kalau user biasa
        return redirect()->to('/');
    }

    public function logout()
    {
        service('authentication')->logout();
        return redirect()->to('/');
    }
}
