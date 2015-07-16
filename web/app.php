<?php
echo '<h1>MySQL Container Testing</h1>';

phpinfo();



$host = 'mysql';
$db = 'gaw-db';
$dsn = "mysql:dbname={$db};host={$host}";
$user = 'gaw-user';
$pass = 'gaw-pass';


$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
} else {
    echo 'OK, mysqli.';
}



try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$st = $dbh->prepare('create table if not exists user (id int(20) primary key auto_increment, name text(128), age int(20));');
$st->execute();

$insert = $dbh->prepare('insert into user (name, age) values ("Alice", 24), ("Bob", 35), ("Charlie", 12) ;');
$insert->execute();

$select = $dbh->prepare('select * from user;');
$select->execute();
echo '<pre>';
while ($row = $select->fetchObject()) {
    echo $row->name, ':', $row->age, '<br />';
}
echo '</pre>';

$st = $dbh->prepare('drop table if exists user;');
$st->execute();


