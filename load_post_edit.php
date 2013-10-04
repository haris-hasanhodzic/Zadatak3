<?php
    $fullname = test_input($_POST["fullname"]);
    if(empty($_POST["email"]))
        $emailErr="Email is required";
    else
        $email = test_input($_POST["email"]);
    if(empty($_POST["username"]))
        $usernameErr="Username is required";
    else
        $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname))
    {
        $fullnameErr = "Only letters and white space allowed";
    }
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
        $emailErr = "Invalid email format";
    }
    if (!preg_match("/^[a-zA-Z_]*$/",$username))
    {
        $usernameErr = "Only letters, uderscore and numbers allowed";
    }
    if(strlen($password)<6)
       $passwordErr="Password is to short (MIN. 6 characters)";
?>
