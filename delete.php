<?php 
include('connection.php');
$conn = db_connect();
$id = $_GET['id'];
$query = $conn->prepare('DELETE FROM users WHERE id = ?');
$query->bind_param('s', $id);
$query->execute();
$conn->close();
header("Location: crud.php");
?>
