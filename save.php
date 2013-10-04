<?php
require "load_post_edit.php";
if (empty($fullnameErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr))
{
    if(isset($_POST["id"]) && !empty($_POST["id"]))
    {
        $id=test_input($_POST["id"]);

        $statement=$db->prepare('UPDATE people SET fullname=:fullname, username=:username, email=:email, password=:password WHERE ID=:id');
        $statement->bindValue(':id', $id, SQLITE3_INTEGER);
        $statement->bindValue(':fullname', $fullname, SQLITE3_TEXT);
        $statement->bindValue(':username', $username, SQLITE3_TEXT);
        $statement->bindValue(':email', $email, SQLITE3_TEXT);
        $statement->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $statement->execute();
        header( 'Location: /zadatak3/index.php' ) ;
    }
    else{
        $id=null;
        $statement = $db->prepare('INSERT INTO people (fullname, username, email, password) 
            VALUES (:fullname, :username, :email, :password)');
        $statement->bindValue(':fullname', $fullname, SQLITE3_TEXT);
        $statement->bindValue(':username', $username, SQLITE3_TEXT);
        $statement->bindValue(':email', $email, SQLITE3_TEXT);
        $statement->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $statement->execute();

        if($result)
            header( 'Location: /zadatak3/index.php' ) ;
    }
}
?>
