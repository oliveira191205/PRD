<?php

namespace App\Contracts;

interface ProductValidator
{
    public function validate(array $product): bool;
    public function getErrors(): array;
}
//marcela