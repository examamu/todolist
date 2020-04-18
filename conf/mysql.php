<?php
require_once("var.php");

//テストサーバーmysql接続のための設定
//$host = 'localhost';
//$username = 'root';
//$passwd = 'root';
//$dbname = 'to_do_list';


//本番サーバーmysql接続のための設定
$host = 'mysql143.phy.lolipop.lan';
$dbusername = 'LAA0895539';
$passwd = 'studyPHP';
$dbname = 'LAA0895539-todolist';


//DB接続
$pdo = new PDO('mysql:host=mysql143.phy.lolipop.lan; dbname=LAA0895539-todolist; charset=utf8', $dbusername, $passwd);
$selectTasks = $pdo->query('select * from tasks');
$insertTasks = $pdo->prepare('INSERT INTO tasks SET name=?,continueTask=?, start=?, finish=?');
$insertTasks->execute(array($name,$contTask,$startDate,$finishDate));
$selectMembers = $pdo->prepare('SELECT id, name, password FROM members WHERE email=? password=?');
$insertMembers = $pdo->prepare('INSERT INTO members SET name=?,password=?,email=?');
$insertMembers->execute(array($memberName,$memberPass,$memberMail));