<?php
include('connection.php');
if (isset($_POST['id'])) {
    $conn = db_connect();
    if (isset($_POST['fullname'])) {
        $query = $conn->prepare('UPDATE users SET fullname = ? WHERE id = ?');
        $query->bind_param('ss', $_POST['fullname'], $_POST['id']);
        $query->execute();
    } elseif (isset($_POST['username'])) {
        $query = $conn->prepare('UPDATE users SET username = ? WHERE id = ?');
        $query->bind_param('ss', $_POST['username'], $_POST['id']);
        $query->execute();
    } elseif (isset($_POST['email'])) {
        $query = $conn->prepare('UPDATE users SET email = ? WHERE id = ?');
        $query->bind_param('ss', $_POST['email'], $_POST['id']);
        $query->execute();
    } elseif (isset($_POST['password'])) {
        $query = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
        $query->bind_param('ss', $_POST['password'], $_POST['id']);
        $query->execute();
    }
$conn->close();
header("Location: crud.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="edit.php" method="POST">
        <h2>Edit</h2>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="input-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname">
        </div>
        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Edit</button>
    </form>
</body>

</html>