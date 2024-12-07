<?php
include_once('db.php');

$name = $email = $mobile = $password = '';
$btn_title = 'Save';
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user) {
        $name = $user['name'];
        $email = $user['email'];
        $mobile = $user['mobile'];
        $password = $user['password'];
        $btn_title = 'Update';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title><?= $btn_title; ?> User</title>
</head>

<body>
    <div class="container">
        <h2><?= $btn_title; ?> User</h2>
        <form action="save_user.php" method="post">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?? ''; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?= $name; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $email; ?>" required>
            <label>Mobile:</label>
            <input type="tel" name="mobile" value="<?= $mobile; ?>">
            <label>Password:</label>
            <input type="password" name="password" value="<?= $password; ?>" required>
            <button type="submit" name="save"><?= $btn_title; ?></button>
        </form>
    </div>
</body>

</html>
