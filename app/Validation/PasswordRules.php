<?php

namespace App\Validation;

class PasswordRules
{
  public function strong_password(string $str, ?string $fields = null, array $data = [])
{
    // Contoh rule sederhana
    return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/', $str) === 1;
}

}
