<?php
include_once('db.php');

$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['id'])) {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];

    $stmt = $con->prepare("UPDATE users SET name = ?, email = ?, mobile = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $mobile, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
