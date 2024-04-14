<?php
session_start();
if (isset($_SESSION["pass"])) {
    unset($_SESSION["pass"]);
}
session_destroy();
header("Location: login.html");