<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {  //verifica se a requisicao é POST
    http_response_code(405);
    echo json_encode(['mensagem' => 'Metodo nao permitido']);
    exit;
}

$input = [
    'name' => $_POST['name'] ?? '',
    'price' => $_POST['price'] ?? '',
];

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$success = $service->create($input);

header('Content-Type: application/json; charset=utf-8'); //define que a resposta sera JSON

if (!$success) {
    http_response_code(422);
    echo json_encode('Erro ao validar ou salvar produto.');
    exit;
}

http_response_code(201);
echo json_encode('Produto cadastrado com sucesso!');
