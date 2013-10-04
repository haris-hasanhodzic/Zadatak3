<?php

$db = new SQLite3('information.db');
$query="CREATE TABLE IF NOT EXISTS people(
    ID integer PRIMARY KEY,
    fullname STRING,
    username STRING,
    email STRING,
    password STRING)";
$db->query($query); 

//$statement = $db->prepare('INSERT INTO people (fullname, username, email, password) 
//   VALUES ("haris", "hari", "hari.bih@gmail.com", "123456")');

//$statement = $db->prepare('INSERT INTO people (fullname, username, email, password) 
//   VALUES ("dino", "ddd", "dino@gmail.com", "sifra")');
//$statement->execute();
        
//$statement->bindValue(':id', $id);
$statement=$db->prepare('SELECT * FROM people');
$result = $statement->execute();
while ($row = $result->fetchArray()) {
    var_dump($row);
}
?>
