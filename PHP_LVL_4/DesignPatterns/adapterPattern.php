<?php

class Product
{
    private $_price;
    private $_discount;

    public function __construct($price, $discount)
    {
        $this->__price = $price;
        $this->__discount = $discount;
    }

    public function getPrice()
    {
        return $this->__price;
    }

    public function getDiscount()
    {
        return $this->__discount;
    }
}

class ProducAdapter
{
    private $_product;

    public function __construct(Product $obj)
    {
        $this->__product = $obj;
    }

    public function getPrice()
    {
        return $this->__product->getPrice() - $this->__product->getDiscount();
    }
}

$products = new Product(100, 30);
$product  = new ProducAdapter($products);
echo "Discount price  = " . $product->getPrice();