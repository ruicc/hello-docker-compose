<?php
echo '<h1>Link test</h1>';

// 'database' and '5000' are defined by docker-compose.yml
$ch = curl_init('http://database:5000');
curl_setopt($ch, CURLOPT_VERBOSE, '1');
curl_setopt($ch, CURLOPT_HEADER, '1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');

$r = curl_exec($ch);
curl_close($ch);

echo '<pre>';
var_dump($r);
echo '</pre>';
