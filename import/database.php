<?php
$server_name = '127.0.0.1';
$username = 'root';
$password = 'root123456';
$db_name = 'group_20';

// mysqli 的四個參數分別為：伺服器名稱、帳號、密碼、資料庫名稱
$db = new mysqli($server_name, $username, $password, $db_name);

if (!empty($db->connect_error)) {
    die('資料庫連線錯誤:' . $db->connect_error);    // die()：終止程序
}
