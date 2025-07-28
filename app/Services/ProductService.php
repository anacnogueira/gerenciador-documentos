<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;


class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

     /**
     * Select all products
     * @return array
    */
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }
}
