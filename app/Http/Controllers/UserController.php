<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function profile()
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $id = Auth::id();

        $data = $request->all();

        $user = $this->userService->updateUser($id, $data);

        return redirect()->route('profile')->with('status', 'Perfil Atualizado!');
    }
}
