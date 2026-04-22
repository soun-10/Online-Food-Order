<?php
require_once __DIR__ . "/../../Models/admin/Report.php";

class ReportController {
    private $model;

    public function __construct($con) {
        $this->model = new ReportModel($con);
    }

    public function index() {
        // Filter Date
        $from = $_GET['from'] ?? date('Y-m-01');
        $to   = $_GET['to']   ?? date('Y-m-d');

        return [
            'totalOrders'     => $this->model->getTotalOrders(),
            'totalRevenue'    => $this->model->getTotalRevenue(),
            'totalCustomers'  => $this->model->getTotalCustomers(),
            'deliveredOrders' => $this->model->getDeliveredOrders(),
            'salesData'       => $this->model->getSalesReport($from, $to),
            'from'            => $from,
            'to'              => $to,
        ];
    }
}