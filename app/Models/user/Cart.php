<?php
class Cart
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * Get cart items by customer ID
     */
    public function getCartById($customer_id)
    {
        $stmt = $this->con->prepare("
            SELECT 
                c.id,
                c.customer_id,
                c.food_id,
                c.quantity,
                f.food_name_english,
                f.food_name_khmer,
                f.price,
                f.photo,
                f.descrip,
                (f.price * c.quantity) as total
            FROM carts c
            INNER JOIN new_foods f ON c.food_id = f.id
            WHERE c.customer_id = :customer_id
            ORDER BY c.created_at DESC
        ");
        $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Add item to cart
     */
    public function addToCart($customer_id, $food_id, $quantity = 1)
    {
        // Check if item already exists in cart
        $stmt = $this->con->prepare("SELECT id, quantity FROM carts WHERE customer_id = :customer_id AND food_id = :food_id");
        $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $stmt->bindParam(":food_id", $food_id, PDO::PARAM_INT);
        $stmt->execute();
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            // Update quantity if item exists
            $new_quantity = $existing['quantity'] + $quantity;
            return $this->updateQuantity($existing['id'], $new_quantity);
        } else {
            // Insert new item
            $stmt = $this->con->prepare("
                INSERT INTO carts (customer_id, food_id, quantity, created_at)
                VALUES (:customer_id, :food_id, :quantity, NOW())
            ");
            $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
            $stmt->bindParam(":food_id", $food_id, PDO::PARAM_INT);
            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity($cart_id, $quantity)
    {
        if ($quantity <= 0) {
            return $this->removeFromCart($cart_id);
        }

        $stmt = $this->con->prepare("UPDATE carts SET quantity = :quantity WHERE id = :id");
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":id", $cart_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart($cart_id)
    {
        $stmt = $this->con->prepare("DELETE FROM carts WHERE id = :id");
        $stmt->bindParam(":id", $cart_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Clear entire cart for a customer
     */
    public function clearCart($customer_id)
    {
        $stmt = $this->con->prepare("DELETE FROM carts WHERE customer_id = :customer_id");
        $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Get cart total
     */
    public function getCartTotal($customer_id)
    {
        $stmt = $this->con->prepare("
            SELECT SUM(f.price * c.quantity) as total
            FROM carts c
            INNER JOIN new_foods f ON c.food_id = f.id
            WHERE c.customer_id = :customer_id
        ");
        $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    /**
     * Get cart item count
     */
    public function getCartCount($customer_id)
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) as count FROM carts WHERE customer_id = :customer_id");
        $stmt->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    /**
     * Get single cart item by ID
     */
    public function getCartItemById($id)
    {
        $stmt = $this->con->prepare("
            SELECT 
                c.id,
                c.customer_id,
                c.food_id,
                c.quantity,
                f.food_name_english,
                f.food_name_khmer,
                f.price,
                f.photo,
                f.descrip,
                (f.price * c.quantity) as total
            FROM carts c
            INNER JOIN new_foods f ON c.food_id = f.id
            WHERE c.id = :id
        ");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
