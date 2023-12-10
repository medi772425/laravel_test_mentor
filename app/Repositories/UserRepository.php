<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository {
    public function findAll() {
        return User::select('*')->get();
    }
}