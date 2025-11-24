<?php namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model {
    protected $table = 'auth_otp';
    protected $allowedFields = ['user_id','otp_code','expires_at','created_at'];
}
