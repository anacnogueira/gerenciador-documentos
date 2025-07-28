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

    /**
     * Create a new product
     * @param array $data
     * @return object
     */
    public function createProduct(array $data)
    {
        return $this->entity->create($data);
    }

     /**
     * Select Product by ID
     * @param int $id
     * @return object
     */
    public function getProductById($id)
    {
        return $this->entity->find($id);
    }

    /**
     * Update data of Product
     * @param object $product
     * @param array $data
     * @return object
     */
    public function updateProduct(Product $product, array $data)
    {
        return $product->update($data);
    }
}