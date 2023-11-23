<?php

class InvalidProductException extends Exception {}

final class Cart
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @throws InvalidProductException
     */
    public function addProduct(array $product): void
    {
        if (!isset($product['name']) || !isset($product['price'])) {
            throw new InvalidProductException('El producto no es válido');
        }

        $this->items[] = $product;
    }
}

try {
    $cart = new Cart;
    $cart->addProduct([
        'name' => 'Cebolla',
        'prices' => 10,
    ]);

    var_dump($cart->getItems());

} catch (InvalidProductException $exception) {
    echo $exception->getMessage();
}
