<?php
    class CartItem {
        private string $name;
        private float $price;
        private int $quantity;

        public function __construct(string $name, float $price, int $quantity) {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getPrice(): float {
            return $this->price;
        }

        public function getQuantity(): int {
            return $this->quantity;
        }

        public function getTotal(): float {
            return $this->price * $this->quantity;
        }
    }   
    class ShoppingCart {
        private array $items = [];

        public function addItem(CartItem $item): void {
            $this->items[] = $item;
        }
        public function removeItem(string $itemName): void {
            foreach ($this->items as $i => $item) {
                if ($item->getName() === $itemName) {
                    unset($this->items[$i]);
                    $this->items = array_values($this->items);
                    break;
                }
            }
        }    
        public function calculateTotal(): float {
            $total = 0.0;
            foreach ($this->items as $item) {
                $total += $item->getTotal();
            }
            return $total;
        }

        public function displayCart(): void {
            echo "<h2>Shopping Cart</h2>";
            foreach ($this->items as $item) {
                echo "  - Tên sản phẩm: " . $item->getName() . "<br>";
                echo "  - Giá: " . number_format($item->getPrice(), 2) . "<br>";
                echo "  - Số lượng: " . $item->getQuantity() . "<br>";
                echo "  - Tổng tiền: " . number_format($item->getTotal(), 2) . "<br><br>";
            }
            echo "<strong>Tổng số tiền: " . number_format($this->calculateTotal(), 2) . "</strong><br>";
        }
    }
    $item1 = new CartItem("Sản phẩm A", 60.0, 2);
    $item2 = new CartItem("Sản phẩm B", 50.0, 3);
    $item3 = new CartItem("Sản phẩm C", 25.5, 4);
    $item4 = new CartItem("Sản phẩm D", 10.5, 10);
    $cart = new ShoppingCart();
    $cart->addItem($item1);    
    $cart->addItem($item2);
    $cart->addItem($item3);
    $cart->addItem($item4);
    $cart->removeItem("Sản phẩm B");

    $cart->displayCart();
?>