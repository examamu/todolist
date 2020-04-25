<?php
define("TITLE" , "Owhatask | 新規登録ページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/index_model.php');
//空の配列作成
$err_msg = array();

if( $_SERVER['REQUEST_METHOD'] === "POST"){
    if( isset($_POST['user_name']) === TRUE ){
        $user_name = $_POST['user_name'];
    }else{
        $err_msg[] = "ユーザー名を入力してください";
    }

    if( isset($_POST['user_mail']) === TRUE ){
        $email = $_POST['user_mail'];
    }else{
        $err_msg[] = "メールアドレスを入力してください";
    }

    if( isset($_POST['user_pass']) === TRUE ){
        $password = password_hash($_POST['user_pass'], PASSWORD_DEFAULT);
    }else{
        $err_msg[] = "ユーザー名を入力してください";
    }

    if( count($err_msg) === 0 ){
        try{
            $dbh = get_db_connect();
            insert_sign_up($dbh,$user_name,$password,$email);
        }catch(PDOException $e){
            $err_msg[] = "登録できませんでした".$e->getMessage();
        }
    }
}

include('./header.php');
include('./view/sign_up_view.php'); 
?>