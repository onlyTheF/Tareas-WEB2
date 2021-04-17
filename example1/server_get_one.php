<?php
    header('Content-Type: application/json');
    include_once 'dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    $product = null;

    while ($row = $result->fetch_assoc()) {
        $product = $row;
    }

    $conn->close();
    echo json_encode($product);
?>
