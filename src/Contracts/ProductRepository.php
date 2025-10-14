<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductRepository
{
    /**
     * @param array{id:int,name:string,price:float} $user
     */
    public function save(array $Product): bool;
    public function findAll(): array;
}
?>

