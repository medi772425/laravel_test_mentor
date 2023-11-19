<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository {
    public function get() {
        return User::select('id', 'name', 'created_at', 'updated_at')->get();
    }
}