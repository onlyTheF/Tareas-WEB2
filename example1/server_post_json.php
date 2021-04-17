<?php
    header('Content-Type: application/json');
    include_once 'dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product = json_decode(file_get_contents('php://input'), true);

    $sql = "INSERT INTO product(name, description, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssd', $product['name'], $product['description'], $product['price']);

    $stmt->execute();
    $conn->close();

    echo json_encode(array('result' => 'ok'));
?>
