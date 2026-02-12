<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data Jadual dari POST
    $username = htmlspecialchars($_POST['username']);
    $orderID = htmlspecialchars($_POST['order_id']);
    $paymentDate = htmlspecialchars($_POST['payment_date']);

    // Kandungan Fail TXT
    $content = "Payment Receipt\n";
    $content .= "===================\n";
    $content .= "Customer Name: $username\n";
    $content .= "Order ID: #$orderID\n";
    $content .= "Payment Date: $paymentDate\n";
    $content .= "===================\n";
    $content .= "Thank you for your purchase.\n";

    // Tetapkan Header untuk Muat Turun
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="RotiSriBakey_ReceiptOrder_' . $orderID . '.txt"');

    // Cetak Kandungan ke Fail
    echo $content;
    exit;
}

?>
