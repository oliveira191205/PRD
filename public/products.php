<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Domain\SimpleProductValidator;
use App\Infra\FileProductRepository;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$products = $service->listProductService();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Produtos</title>
</head>

<body>
    <h1>Produtos Cadastrados</h1>
    <?php
    if (empty($products)) {
        echo "<p>Nenhum produto cadastrado.</p>";
    } else {
        echo "<table>";
        echo "<tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>";
        for ($i = 0; $i < count($products); $i++) {
            $p = $products[$i];
            echo "<tr>";
            echo "<td>" . $p['id'] . "</td>";
            echo "<td>" . $p['name'] . "</td>";
            echo "<td>" . number_format($p['price'], 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>