<?php
class Orders
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * Get all orders with customer and items info
     */
    public function getAllOrders()
    {
        $stmt = $this->con->prepare("
            SELECT 
                o.id,
                o.customer_id,
                o.total_amount,
                o.status,
                o.payment_method,
                o.created_at,
                c.fullname as customer_name,
                c.phonenumber,
                COUNT(oi.id) as item_count,
                GROUP_CONCAT(CONCAT(f.food_name_english, ' x', oi.quantity) SEPARATOR ', ') as food_items
            FROM orders o
            LEFT JOIN customers c ON o.customer_id = c.id
            LEFT JOIN order_items oi ON o.id = oi.order_id
            LEFT JOIN new_foods f ON oi.food_id = f.id
            GROUP BY o.id
            ORDER BY o.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get order by ID
     */
    public function getOrderById($id)
    {
        $stmt = $this->con->prepare("
            SELECT 
                o.id,
                o.customer_id,
                o.total_amount,
                o.status,
                o.payment_method,
                o.created_at,
                c.fullname as customer_name,
                c.phonenumber,
                c.email
            FROM orders o
            LEFT JOIN customers c ON o.customer_id = c.id
            WHERE o.id = :id
        ");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get order items
     */
    public function getOrderItems($order_id)
    {
        $stmt = $this->con->prepare("
            SELECT 
                oi.id,
                oi.quantity,
                oi.price,
                oi.subtotal,
                f.food_name_english,
                f.food_name_khmer,
                f.photo
            FROM order_items oi
            INNER JOIN new_foods f ON oi.food_id = f.id
            WHERE oi.order_id = :order_id
        ");
        $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create new order from cart
     */
    public function createOrder($customer_id, $total_amount, $payment_method = 'cash')
    {
        try {
            $this->con->beginTransaction();

            // Create order
            $stmt = $this->con->prepare("
                INSERT INTO orders (customer_id, total_amount, payment_method, status, created_at)
                VALUES (:customer_id, :total_amount, :payment_method, 'pending', NOW())
            ");
            $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
            $stmt->bindParam(":total_amount", $total_amount);
            $stmt->bindParam(":payment_method", $payment_method);
            $stmt->execute();

            $order_id = $this->con->lastInsertId();

            $this->con->commit();
            return $order_id;
        } catch (Exception $e) {
            $this->con->rollBack();
            return false;
        }
    }

    /**
     * Add item to order
     */
    public function addOrderItem($order_id, $food_id, $quantity, $price)
    {
        $subtotal = $quantity * $price;
        $stmt = $this->con->prepare("
            INSERT INTO order_items (order_id, food_id, quantity, price, subtotal)
            VALUES (:order_id, :food_id, :quantity, :price, :subtotal)
        ");
        $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $stmt->bindParam(":food_id", $food_id, PDO::PARAM_INT);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":subtotal", $subtotal);
        return $stmt->execute();
    }

    /**
     * Update order status
     */
    public function updateStatus($order_id, $status)
    {
        $stmt = $this->con->prepare("UPDATE orders SET status = :status WHERE id = :id");
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $order_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Get order count by status
     */
    public function getCountByStatus($status = null)
    {
        if ($status) {
            $stmt = $this->con->prepare("SELECT COUNT(*) as count FROM orders WHERE status = :status");
            $stmt->bindParam(":status", $status);
        } else {
            $stmt = $this->con->prepare("SELECT COUNT(*) as count FROM orders");
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    /**
     * Get total revenue
     */
    public function getTotalRevenue()
    {
        $stmt = $this->con->prepare("SELECT SUM(total_amount) as revenue FROM orders WHERE status != 'cancelled'");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['revenue'] ?? 0;
    }
}
?>
