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

    /**
     * Create a new product
     * @param array $data
     * @return object
    */
    public function makeProduct(array $data)
    {

        $product = $this->productRepository->createProduct($data);

        return $product;
    }

    /**
     * Get Product by ID
     * @param int $id
     * @return object
    */
    public function getProductById(int $id)
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * Update a product
     * @param int $id
     * @param arrray $data
     * @return json response
    */
    public function updateProduct(int $id, array $data)
    {

        $product = $this->productRepository->getProductById($id);

        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $this->productRepository->updateProduct($product, $data);
        return response()->json(['message' => 'Product Updated'], 200);
    }

    /**
     * Delete a product
     * @param int $id
     * @return json response
    */
    public function destroyProduct(int $id)
    {
        $product = $this->productRepository->getProductById($id);

        if (!$product) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $this->productRepository->destroyProduct($product);

        return response()->json(['message' => 'Product Deleted'], 200);
    }

}
