<?php
require_once __DIR__ . "/../../Models/admin/Orders.php";

class OrdersController
{
    private $OrderModel;

    public function __construct($con)
    {
        $this->OrderModel = new Orders($con);
    }

    /**
     * Get all orders
     */
    public function show()
    {
        return $this->OrderModel->getAllOrders();
    }

    /**
     * Get order by ID
     */
    public function getById($id)
    {
        return $this->OrderModel->getOrderById($id);
    }

    /**
     * Get order items
     */
    public function getItems($order_id)
    {
        return $this->OrderModel->getOrderItems($order_id);
    }

    /**
     * Create order
     */
    public function create($customer_id, $total_amount, $payment_method = 'cash')
    {
        return $this->OrderModel->createOrder($customer_id, $total_amount, $payment_method);
    }

    /**
     * Add item to order
     */
    public function addItem($order_id, $food_id, $quantity, $price)
    {
        return $this->OrderModel->addOrderItem($order_id, $food_id, $quantity, $price);
    }

    /**
     * Update status
     */
    public function updateStatus($order_id, $status)
    {
        return $this->OrderModel->updateStatus($order_id, $status);
    }

    /**
     * Get count
     */
    public function getCount($status = null)
    {
        return $this->OrderModel->getCountByStatus($status);
    }

    /**
     * Get revenue
     */
    public function getRevenue()
    {
        return $this->OrderModel->getTotalRevenue();
    }
}
?>
