<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

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
        "data_payment_id",
    ];
    protected $returnType    = 'App\Entities\User';
    protected $useTimestamps = false;

    // Callbacks if needed
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_user($data)
    {
        $user = new UserModel();

        return $user->insert($data);
    }
}


// create table users (
//     ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(60) NOT NULL,
//     last_name VARCHAR(60) NOT NULL,
//     telephone VARCHAR(25) NOT NULL,
//     street VARCHAR(255) NOT NULL,
//     house_number SMALLINT NOT NULL,
//     zip_code VARCHAR(10) NOT NULL,
//     city VARCHAR(255) NOT NULL,
//     account_owner VARCHAR(100) NOT NULL,
//     iban VARCHAR(40) NOT NULL,
//     data_payment_id VARCHAR(255),
//     created_at datetime DEFAULT CURRENT_TIMESTAMP,
// );