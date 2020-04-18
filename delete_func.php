<?php
// エラーを出力する
//ini_set('display_errors', "On");
require_once("var.php");
?>

<?php

//テストサーバーmysql接続のための設定
//$host = 'localhost';
//$username = 'root';
//$passwd = 'root';
//$dbname = 'to_do_list';


//本番サーバーmysql接続のための設定
$host = 'mysql143.phy.lolipop.lan';
$username = 'LAA0895539';
$passwd = 'studyPHP';
$dbname = 'LAA0895539-todolist';
$sql = mysqli_connect($host,$username,$passwd,$dbname);

//SELECT処理
$select = "SELECT * FROM tasks";
$result = mysqli_query($sql, $select);



//INSERT処理
// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。\n";

// カラム`id`には`1`を、カラム`name`には`yamada`をもつレコードを挿入する
$insert = "INSERT INTO tasks (name, continueTask, start, finish) VALUES ('$name','$continueTask', '$startDate', '$finishDate');";

// クエリを実行します。
if( !empty($name)){
if (mysqli_query($sql, $insert)) {
    echo "INSERT に成功しました。\n";
	}
}

// 接続を閉じます
mysqli_close($sql);




//DELETE処理
//プリペアドステートメント
//$delete = $mysqli->prepare("DELETE FROM tasks WHERE name=?");
//
//if($delete){
//	$delete->bindValue('1', $name);
//	
//	$delete->execute();
//if(mysqli_query($sql, $delete)){
//	echo "delete に成功しました。\n";
//}
//	
//	
//	
//	
//}
?>



