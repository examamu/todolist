<?php

if($_SERVER['SERVER_NAME'] === 'localhost'){
// テスト環境でのデータベースの接続情報
define('DB_USER',   'root');	// MySQLのユーザ名（マイページのアカウント情報を参照）
define('DB_HOST', 	'mysql');
define('DB_PASSWD', 'root');    // MySQLのパスワード（マイページのアカウント情報を参照
define('DB_NAME', 'to_do_list'); // MySQLのDB名(このコースではMySQLのユーザ名と同じで


}else{
// 本番環境でのデータベースの接続情報
define('DB_USER',   'LAA0895539');	// MySQLのユーザ名（マイページのアカウント情報を参照）
define('DB_HOST', 	'mysql143.phy.lolipop.lan');
define('DB_PASSWD', 'studyPHP');    // MySQLのパスワード（マイページのアカウント情報を参照
define('DB_NAME', 'LAA0895539-todolist'); // MySQLのDB名(このコースではMySQLのユーザ名と同じで

}
define('DB_CHARSET', 'SET NAMES utf8mb4');  // MySQLのcharset
define('DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8'); // データベースのDSN情報
define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング
?>