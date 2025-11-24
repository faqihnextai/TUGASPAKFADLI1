<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class GoogleController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setClientId(getenv('google.client_id'));
        $this->client->setClientSecret(getenv('google.client_secret'));
        $this->client->setRedirectUri(getenv('google.redirect_uri'));
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function login()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $code = $this->request->getVar('code');

        if ($code) {
            $token = $this->client->fetchAccessTokenWithAuthCode($code);

            if (!isset($token['error'])) {
                $googleUser = $this->client->verifyIdToken();

                $email = $googleUser['email'];
                $name  = $googleUser['name'];
                $photo = $googleUser['picture'];

                $userModel = new UserModel();

                // Cek user
                $user = $userModel->where('email', $email)->first();

                if (!$user) {
                    $userModel->insert([
                        'email' => $email,
                        'username' => $name,
                        'password' => password_hash(uniqid(), PASSWORD_DEFAULT),
                        'photo' => $photo
                    ]);
                }

                // Login manual
                session()->set([
                    'logged_in' => true,
                    'email' => $email,
                    'name' => $name,
                    'photo' => $photo
                ]);

                return redirect()->to('/');
            }
        }

        return redirect()->to('/login')->with('error', 'Google Login gagal.');
    }
}
