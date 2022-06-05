<?php
// (A) CONNECT TO DATABASE - CHANGE TO YOUR OWN!
$dbhost = "localhost";
$dbname = "eshop";
$dbchar = "utf8";
$dbuser = "root";
$dbpass = "";
try {
  $pdo = new PDO(
    "mysql:host=$dbhost;dbname=$dbname;charset=$dbchar",
    $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (Exception $ex) { exit($ex->getMessage()); }

// (B) DO SEARCH
$data = [];   
$stmt = $pdo->prepare("select * from product where CONCAT_WS('', name, description, brand) like ?");
$stmt->execute(["%" . $_POST["search"] . "%"]);
while ($row = $stmt->fetch()) { $data[] = $row["description"]; }
echo count($data)==0 ? "null" : json_encode($data) ;
