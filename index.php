<?php
define("TITLE" , "Owhatask | トップページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/class.php');
require_once('./model/db.php');
require_once('./model/common.php');
require_once('./model/index_model.php');
$err_msg = array();

session_start();
$_SESSION['user'] = 1;
$user_id = 1;
// if(isset($_SESSION['user']) !== TRUE){
// 	header('Location:./login.php');
// }

try{
	$tasks_data = get_tasks_all($user_id);
}catch(PDOException $e){
	$err_msg[] = 'データの取得に失敗しました。'.$e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	if(isset($_GET['delete']) !== TRUE){
		return;
	}
	$delete = $_POST['delete'];
}

include('./header.php');
include('./view/index_view.php'); 
echo 'aaaaaa';
?>