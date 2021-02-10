<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    protected $attributes = [
        "id" => null,
        "first_name" => null,
        "last_name" => null,
        "telephone" => null,
        "street" => null,
        "house_number" => null,
        "zip_code" => null,
        "city" => null,
        "account_owner" => null,
        "iban" => null,
        "created_at" => null
    ];

    protected $dates = ["created_at"];
}
