<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all_users()
    {
        $users = $this->userRepository->all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|required',
            'username' => 'sometimes|required|unique:users,username,' . $id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $this->userRepository->update($user, $data);

        return response()->json(['message' => 'Usuario actualizado correctamene', 'user' => $user]);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $this->userRepository->delete($user);

        return response()->json(['message' => 'User deleted successfully']);
    }
}