<?php
class Product
{
    public $name;
    public $cost;
    public $amount;

    public function __construct($name, $cost, $amount)
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->amount = $amount;
    }
}

$input = array_map(fn($item) => new Product($item['name'], $item['cost'], $item['amount']), [ // объявление массива с информацией о продуктах
    ["name" => "orange", "cost" => 50000000, "amount" => 27],
    ["name" => "banana", "cost" => 120000000, "amount" => 17],
    ["name" => "bread", "cost" => 700000000, "amount" => 0],
]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .product-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .out-of-stock {
            /* класс для товара с 0 */
            background-color: #d3d3d3;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
        }

        .product-cost {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
    <title>Product Cards</title>
</head>

<body>
    <?php foreach ($input as $product): ?>
        <div class="product-card <?= $product->amount == 0 ? 'out-of-stock' : ''; ?>"> <!-- если количество товара 0, добавить класс out-of-stock -->
            <div class="product-name"><?= htmlspecialchars($product->name); ?></div>
            <div class="product-cost"><?= number_format($product->cost); ?> руб.</div>
        </div>
    <?php endforeach; ?>
</body>

</html>