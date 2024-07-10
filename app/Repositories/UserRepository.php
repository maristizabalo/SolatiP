<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }
    
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}