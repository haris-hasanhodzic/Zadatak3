<?php
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    $statement=$db->prepare('SELECT *  FROM people WHERE ID=:id');
    $statement->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $statement->execute()->fetchArray();

    $fullname = $result["fullname"];
    $email = $result["email"];
    $username = $result["username"];
    $password = $result["password"];
}
?>
