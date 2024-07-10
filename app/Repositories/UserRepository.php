<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(User $user, array $data);

    public function delete(User $user);
}

class UserRepository implements UserRepositoryInterface
{
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