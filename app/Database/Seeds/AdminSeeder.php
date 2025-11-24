<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Password; // penting!

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Hash password pakai Myth:Auth [VERSI UNIVERSAL]
        $password = Password::hash('admin123');

        $userData = [
            'email'        => 'admin@example.com',
            'username'     => 'admin',
            'password_hash'=> $password,
            'active'       => 1,
        ];

        // Insert user
        $this->db->table('users')->insert($userData);
        $userId = $this->db->insertID();

        // Ambil id group admin
        $group = $this->db->table('auth_groups')
                          ->where('name', 'admin')
                          ->get()
                          ->getRow();

        if ($group) {
            $this->db->table('auth_groups_users')->insert([
                'group_id' => $group->id,
                'user_id'  => $userId
            ]);
        }
    }
}
