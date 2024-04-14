<?php
include("connection.php");
include("user.php");
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $conn = db_connect();
    $query = $conn->prepare("SELECT * FROM users where username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    if($row['password'] == $password) {
        $user = new User($row['id'], $row['fullname'], $row['username'], $row['email'], $row['password']);
        session_start();
        $_SESSION['pass'] = "pass";
        echo "Login oldunuz!";
    }else {
        echo "Sifre yanlishdir";
    }
    $conn->close();
}