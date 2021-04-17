<?php
    header('Content-Type: application/json');
    include_once 'dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    $products = array();

    while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
    }

    $conn->close();
    echo json_encode($products);
?>
