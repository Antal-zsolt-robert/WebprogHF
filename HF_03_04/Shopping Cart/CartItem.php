<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }


    public function increaseQuantity()
    {
        if ($this->product->getAvailableQuantity() >= ($this->quantity + 1)) {
            $this->quantity++;
        } else {
            echo "No more available quantities of the product!";
        }
    }

    public function decreaseQuantity()
    {
        if ($this->product->getAvailableQuantity() > 0) {
            $this->quantity--;
        } else {
            echo "No more available quantities of the product!";
        }
    }
}