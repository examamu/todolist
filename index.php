<?php
define("TITLE" , "Owhatask | トップページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/class.php');
require_once('./model/db.php');
require_once('./model/index_model.php');
$err_msg = array();
session_start();
login_confirm();
$user_id = $_SESSION['user_id'];


if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$delete_task = 'delete'.$_POST['delete_id'];
	if(isset($_POST[$delete_task]) === TRUE){
		$delete_id = $_POST['delete_id'];
		try{
			delete_task($delete_id);
			$success_msg = '削除が完了しました！';
		}catch(PDOException $e){
			$err_msg[] = '削除できませんでした'.$e->getMessage();
		}
	}else{
		$err_msg[] = "不正な操作です";
	}
}

$get_tasks_placeholder = array();
//user_id
$get_tasks_placeholder[] = array('placeholder'=>$user_id, 'data_type'=>'integer');

try{
	$tasks_data = get_tasks_all($get_tasks_placeholder);
}catch(PDOException $e){
	$err_msg[] = "データを取得できませんでした".$e->getMessage();
}

include('./header.php');
include('./view/index_view.php'); 
?>