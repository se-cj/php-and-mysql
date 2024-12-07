<?php
include_once('db.php');

// جلب البيانات من قاعدة البيانات
$users_sql = "SELECT * FROM users";
$all_user = $con->query($users_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Manage Users</title>
</head>

<body>
    <div class="container">
        <h2>Manage Users</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="usersTable">
                <?php while ($user = $all_user->fetch_assoc()) : ?>
                    <tr id="row-<?= $user['id']; ?>">
                        <td><?= $user['id']; ?></td>
                        <td contenteditable="true" data-column="name"><?= $user['name']; ?></td>
                        <td contenteditable="true" data-column="email"><?= $user['email']; ?></td>
                        <td contenteditable="true" data-column="mobile"><?= $user['mobile']; ?></td>
                        <td>
                            <button class="btn-edit" onclick="updateRow(<?= $user['id']; ?>)">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <button class="btn-delete" onclick="deleteRow(<?= $user['id']; ?>)">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <button class="btn-move" onclick="moveRow(<?= $user['id']; ?>)">
                                <i class="fas fa-arrows-alt"></i> Move
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div id="movedRows" class="moved-rows-container">
            <h3>Moved Rows</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody id="movedTable"></tbody>
            </table>
        </div>
    </div>

    <script src="js/manage_users.js"></script>
</body>

</html>
