<?php

// app/Repositories/UserRepository.php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllPaginated($perPage = 10)
{
    return User::paginate($perPage);
}
    public function getAll()
    {
        return User::all(); // ya pagination use kar sakte ho
    }
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
    public function delete($id)
    {
        return User::findOrFail($id)->delete();
    }
}

