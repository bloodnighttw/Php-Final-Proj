<?php
$server_name = 'mysql:host=127.0.0.1;port=3306;dbname=group_20';
$username = 'root';
$password = 'root123456';

// mysqli 的四個參數分別為：伺服器名稱、帳號、密碼、資料庫名稱
$db = new PDO($server_name, $username, $password);

