<?php
    $db = new SQLite3('information.db');
    $limit=5;
    $page=1;
    $offset=0;
    if (isset($_GET["page"]))
    {
        $offset=((int)$_GET["page"]-1)*2;
        $page=(int)$_GET["page"];   
    }

    $statement=$db->prepare('SELECT *  FROM people WHERE fullname LIKE "%"||:fullname||"%" AND password LIKE "%"||:password||"%"  AND email LIKE "%"||:email||"%" AND username LIKE "%"||:username||"%" LIMIT :limit OFFSET :offset');
    $statement->bindValue(':offset', $offset, SQLITE3_INTEGER);
    $statement->bindValue(':limit', $limit, SQLITE3_INTEGER);
    $statement->bindValue(':fullname', $fullname, SQLITE3_TEXT);
    $statement->bindValue(':username', $username, SQLITE3_TEXT);
    $statement->bindValue(':email', $email, SQLITE3_TEXT);
    $statement->bindValue(':password', $password, SQLITE3_TEXT);
    $result = $statement->execute();

    $statement=$db->prepare('SELECT COUNT(*) as total  FROM people WHERE fullname LIKE "%"||:fullname||"%" AND password LIKE "%"||:password||"%"  AND email LIKE "%"||:email||"%" AND username LIKE "%"||:username||"%" ');
    $statement->bindValue(':fullname', $fullname, SQLITE3_TEXT);
    $statement->bindValue(':username', $username, SQLITE3_TEXT);
    $statement->bindValue(':email', $email, SQLITE3_TEXT);
    $statement->bindValue(':password', $password, SQLITE3_TEXT);
    $r = $statement->execute()->fetchArray();
    $total=$r["total"];
?>
