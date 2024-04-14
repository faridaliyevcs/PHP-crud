<?php
include('connection.php');
/*session_start();
if (!isset($_SESSION['pass'])) {
    header("Location: login.php");
}*/
$conn = db_connect();
$result = $conn->query('SELECT * FROM users');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Password</th>
        </tr>
        
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["fullname"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>