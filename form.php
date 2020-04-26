<?php
define("TITLE" , "Owhatask | マイページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/index_model.php');
session_start();
login_confirm();

$thisyear = date('Y');
$err_msg = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

}

include('./header.php');
include('./view/form_view.php'); 
?>
	