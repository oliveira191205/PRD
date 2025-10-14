<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductValidator;
use App\Contracts\ProductRepository;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array{name:string, price:float} $input
     */
    public function create(array $input): bool
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return false;
        }

        $products = $this->repository->findAll();
        $lastId = empty($products) ? 0 : end($products)['id'];
        $newId = $lastId + 1;

        $product = [
            'id' => $newId,
            'name' => trim($input['name']),
            'price' => (float) $input['price'],
        ];

        $this->repository->save($product);

        return true;
    }

    public function listProductService(): array
    {
        return $this->repository->findAll();
    }
}
