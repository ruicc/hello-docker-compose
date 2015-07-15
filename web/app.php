<?php
echo '<h1>MySQL Container Testing</h1>';

// 'database' and '5000' are defined by docker-compose.yml
//$ch = curl_init('http://database:5000');
//curl_setopt($ch, CURLOPT_VERBOSE, '1');
//curl_setopt($ch, CURLOPT_HEADER, '1');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, '1');
//
//$r = curl_exec($ch);
//curl_close($ch);
//
//echo '<pre>';
//var_dump($r);
//echo '</pre>';

$host = 'mysql';
$db = 'gaw-db';
/* ドライバ呼び出しを使用して ODBC データベースに接続する */
$dsn = "mysql:dbname={$db};host={$host}";
$user = 'gaw-user';
$pass = 'gaw-pass';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

phpinfo();

//$mysqli = new mysqli($host, $user, $pass, $db);
//
///*
// * これは "公式な" オブジェクト指向のやりかたですが、
// * PHP 5.2.9 および 5.3.0 より前のバージョンでは $connect_error は動作していませんでした
// */
//if ($mysqli->connect_error) {
//    die('Connect Error (' . $mysqli->connect_errno . ') '
//            . $mysqli->connect_error);
//}
//
///*
// * PHP 5.2.9 および 5.3.0 より前のバージョンとの互換性を保ちたい場合は
// * $connect_error のかわりにこのようにします
// */
//if (mysqli_connect_error()) {
//    die('Connect Error (' . mysqli_connect_errno() . ') '
//            . mysqli_connect_error());
//}
//
//echo 'Success... ' . $mysqli->host_info . "\n";
//
//$mysqli->close();
