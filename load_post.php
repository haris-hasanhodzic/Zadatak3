<?php
require "test_input.php";
$fullname = $email = $username = $password =$id= "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fullname = test_input($_POST["fullname"]);
    $email = test_input($_POST["email"]);
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
}
?>
