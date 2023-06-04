<?php
header('Content-Type: application/json; charset=utf-8');

require_once '../import/database.php';
$contentPrepare = $db->prepare('SELECT delta FROM comment where id=?');

if(!isset($_GET['id'])){
    header("HTTP/1.1 404 Not Found");
    die();
}

$contentPrepare->execute([$_GET['id']]);

$result = $contentPrepare->fetch();

if(is_bool($result)){
    header("HTTP/1.1 404 Not Found");
    die();
}

echo $result['delta'];

