<?php
$db = new SQLite3('information.db') or die("Can not open database");
if (isset($_POST["id"]))
{
    $statement=$db->prepare('DELETE FROM people WHERE ID=:id');
    $statement->bindValue(':id', $_POST["id"], SQLITE3_INTEGER);
    $result = $statement->execute();
    if (!$result)
        http_response_code(400);
}
else
    http_response_code(400);
?>
