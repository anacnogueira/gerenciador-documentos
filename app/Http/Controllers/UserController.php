<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    protected $productService;

    public function __construct(UserService $userService, ProductService $productService)
    {
        $this->userService = $userService;
        $this->productService = $productService;
    }

    public function profile()
    {
        $user = Auth::user();

        $select = new \stdClass();
        $select->id = null;
        $select->name = "Selecione o produto";

        $products = $this->productService
            ->getAllProducts()
            ->map(function ($product) {
                $brand = $product->brand ?? '';
                $model = $product->model ?? '';
                $product->name = trim("{$brand} - {$model}");
                return $product;
            })
            ->sortBy('brand')
            ->prepend($select);

        return view('users.profile', compact('user','products'));
    }

    public function update(UpdateUserRequest $request)
    {
        $id = Auth::id();

        $data = $request->all();

        $user = $this->userService->updateUser($id, $data);

        return redirect()->route('profile')->with('status', 'Perfil Atualizado!');
    }
}
