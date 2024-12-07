<?php
include_once('db.php');

$users_sql = "SELECT * FROM users";
$all_user = $con->query($users_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Users App</title>
</head>

<body>
    <div class="container">
        <h2>All Users</h2>
        <a href="add_user.php" class="btn-add">Add User</a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $all_user->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['mobile']; ?></td>
                        <td>
                            <a href="add_user.php?action=edit&id=<?= $user['id']; ?>" class="btn-edit">Edit</a>
                            <a href="delete_user.php?id=<?= $user['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
