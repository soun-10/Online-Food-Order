<?php
class ReportModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    // Summary Cards
    public function getTotalOrders() {
        return $this->con->query("SELECT COUNT(*) FROM orders")->fetchColumn();
    }

    public function getTotalRevenue() {
        return $this->con->query("SELECT COALESCE(SUM(total), 0) FROM orders")->fetchColumn();
    }

    public function getTotalCustomers() {
        return $this->con->query("SELECT COUNT(*) FROM customers")->fetchColumn();
    }

    public function getDeliveredOrders() {
        return $this->con->query("SELECT COUNT(*) FROM orders")->fetchColumn();
    }

    // Sales Report Table
    public function getSalesReport($from, $to) {
        $sql = "SELECT 
                    DATE(order_date) AS date,
                    COUNT(*)         AS total_orders,
                    SUM(total)       AS revenue
                FROM orders
                WHERE DATE(order_date) BETWEEN :from AND :to
                GROUP BY DATE(order_date)
                ORDER BY date DESC";

        $stmt = $this->con->prepare($sql);
        $stmt->execute([':from' => $from, ':to' => $to]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}