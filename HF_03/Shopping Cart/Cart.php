<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->increaseQuantity();
                return $item;
            }
        }
        $newCartItem = new CartItem($product, $quantity);
        $this->items[] = $newCartItem;
        return $newCartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->items as $value) {
            if ($value->getProduct() === $product) {
                if (($key = array_search($value, $this->items)) !== false) {
                    unset($this->items[$key]);
                }
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += ($item->getProduct()->getPrice() * $item->getQuantity());
        }
        return $totalSum;
    }
}