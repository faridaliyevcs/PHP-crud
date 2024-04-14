<?php
include("user.php");
include("connection.php");

if (isset($_POST["fullname"]) && $_POST["email"] && $_POST["username"] && $_POST["password"]) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    
    $conn = db_connect();
    
    $query = $conn->prepare("SELECT * FROM users where username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        echo "Bele bir adda istifadeci var, xahis olunur ki, basqa ad secesiniz...";
    } else {
        $query = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $fullname, $username, $email, $password);
        $query->execute();
        echo "Istifadeci uğurla əlavə edildi.";
    }
    
    $conn->close();
}
?>
