<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $entity;

    public function __construct(Product $Product)
    {
        $this->entity = $Product;
    }

    /**
     * Get all Products
     * @return array
     */
    public function getAllProducts()
    {
        return $this->entity->all();
    }
}