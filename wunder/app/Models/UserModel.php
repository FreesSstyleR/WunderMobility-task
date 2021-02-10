<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        "first_name",
        "last_name",
        "telephone",
        "street",
        "house_number",
        "zip_code",
        "city",
        "account_owner",
        "iban",
        'data_payment_id'
    ];
    protected $returnType    = 'App\Entities\User';
   # protected $useTimestamps = true;
}
