<?php

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
        if (!file_exists($file)) {
            touch($file); // cria arquivo 
        }
    }
    /**
     * @param  array{id:int, name:string, price:float} $product
     */
    public function save(array $product): bool
    {
        file_put_contents(
            $this->file, 
            json_encode($product, JSON_UNESCAPED_UNICODE) . PHP_EOL, 
            FILE_APPEND
        );
        return true; 
    }

    public function findAll(): array
    {
        $products = [];
        $lines = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $products[] = json_decode($line, true);
        } // add em products

        return $products;
    }
}


//marcela
