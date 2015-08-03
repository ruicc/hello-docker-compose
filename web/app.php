<?php
echo '<h1>Link test</h1>';

//phpinfo();

echo date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']), '<br />';

try {
    $pdo = new PDO('mysql:dbname=dev-db;host=datamysql', 'dev-user', 'dev-pw');
} catch (Exception $e) {
    echo 'Connection failed';
    exit;
}


$pdo->query('CREATE TABLE `persons` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` text,
    `age` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8');

$pdo->query('insert into persons (name, age) values ("Alice", 24), ("Bob", 19), ("Charles", 36)');

echo '<pre>';
foreach ($pdo->query('select * from persons') as $person) {
    echo $person['name'], ',', $person['age'], PHP_EOL;
}
echo '</pre>';
