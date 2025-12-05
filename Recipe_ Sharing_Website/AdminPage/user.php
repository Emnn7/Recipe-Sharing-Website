<?php
include('../include/connection.php');

// Read (Fetch Users)
$result = $conn->query("SELECT * FROM users");

//Delete User

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE id='$user_id'");
    header("Location: ../admin_dashboard.php#user-management");
    exit();
}

?>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Profile Picture</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['user_type'] ?></td>
                <td><?= $row['profile_picture'] ?></td>
                <td><?= $row['actions'] ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a> | 
                    <a href="admin_crud/delete_user.php?id=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
