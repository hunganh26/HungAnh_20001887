<?php

$cart = [[
        "name" => "San pham A",
        "price" => 20,
    ],
    [
        "name" => "San pham B",
        "price" => 30,
    ],
    [
        "name" => "San pham C",
        "price" => 10,
    ],
    [
        "name" => "San pham D",
        "price" => 50,
    ],
    [
        "name" => "San pham E",
        "price" => 20,
    ]
    ];

    function calculateTotal($cart) {
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item["price"];
        }
        return $totalPrice;
    }
    function findMaxPrice($cart) {
        $maxPrice = 0;
        $maxProduct = "";
        foreach ($cart as $item) {
            if ($item["price"] > $maxPrice) {
                $maxPrice = $item["price"];
                $maxProduct = $item["name"];
            }
        }
        return ["name" => $maxProduct, "price" => $maxPrice];
    }
    $totalPrice = calculateTotal($cart);
    echo "Tổng giá trị các sản phẩm: " . $totalPrice . "<br>";
    $maxProduct = findMaxPrice($cart);
    echo "ản phẩm có giá cao nhất: " . $maxProduct["name"] . " - " . $maxProduct["price"] . "<br>";

    
?>
