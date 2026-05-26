<?php
require_once __DIR__ . "/../../Models/user/Cart.php";

class CartController
{
    private $CartModel;

    public function __construct($con)
    {
        $this->CartModel = new Cart($con);
    }

    /**
     * Get all cart items for a customer
     */
    public function show($customer_id)
    {
        return $this->CartModel->getCartById($customer_id);
    }

    /**
     * Get single cart item by ID
     */
    public function getById($id)
    {
        return $this->CartModel->getCartItemById($id);
    }

    /**
     * Add item to cart
     */
    public function add($customer_id, $food_id, $quantity = 1)
    {
        return $this->CartModel->addToCart($customer_id, $food_id, $quantity);
    }

    /**
     * Update cart item quantity
     */
    public function updateQty($cart_id, $quantity)
    {
        return $this->CartModel->updateQuantity($cart_id, $quantity);
    }

    /**
     * Remove item from cart
     */
    public function remove($cart_id)
    {
        return $this->CartModel->removeFromCart($cart_id);
    }

    /**
     * Clear entire cart
     */
    public function clear($customer_id)
    {
        return $this->CartModel->clearCart($customer_id);
    }

    /**
     * Get cart total
     */
    public function getTotal($customer_id)
    {
        return $this->CartModel->getCartTotal($customer_id);
    }

    /**
     * Get cart item count
     */
    public function getCount($customer_id)
    {
        return $this->CartModel->getCartCount($customer_id);
    }
}
?>
