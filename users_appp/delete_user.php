<?php
include_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
