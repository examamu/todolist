<?php
define("TITLE" , "Owhatask | 新規登録ページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/index_model.php');
//空の配列作成
$err_msg = array();

include('./header.php');
include('./view/sign_up_view.php'); 
?>