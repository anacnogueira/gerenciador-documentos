<?php

namespace App\Repositories\Contracts;


interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function createProduct(array $data);
    public function getProductById($id);
}