<?php

function db_connect()
{
    $host = 'localhost';
    $dbname = 'bank-app';
    $username = 'root';
    $password = 'root123';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
/*
$conn = db_connect();


$query = "SELECT * FROM user WHERE user.id = '1'";

$result = $conn->query($query);

if ($result === false) {
    echo "Error while executing query: " . $conn->error;
} else {
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $elm) {
            echo $elm . "\n";
        }
    }
}

$conn->close();
*/
