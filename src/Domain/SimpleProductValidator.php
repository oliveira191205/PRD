<?php

namespace App\Domain;

use App\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    private array $errors = [];

    public function validate(array $product): bool
    {
        $this->errors = []; // isso serve para limpar erros anteriores 

        if(empty($product['name']) || strlen($product['name']) < 2 || strlen($product['name']) > 100) {
            $this->errors[] = 'Nome deve ter entre 2 e 100 caracteres.';
        }

        if(!isset($product['price']) || !is_numeric($product['price']) || $product['price'] < 0) {
            $this->errors[] = 'Preço deve ser numérico e não negativo.';
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

//marcela
