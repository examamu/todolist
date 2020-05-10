<?php
define("TITLE" , "Owhatask | ログインページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/class.php');
require_once('./model/db.php');
session_start();
//空の配列作成
$err_msg = array();
$login_placeholder = array();

if( isset($_SESSION['user_id']) === TRUE ) {
    unset($_SESSION['user_id']);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //メールアドレスの有無を確認
    if(!empty($_POST['user_mail'])) {
        $user_mail = $_POST['user_mail'];
        $login_placeholder[] = array('placeholder'=>$user_mail, 'data_type'=>'string');
    } else {
        $err_msg[] = 'メールアドレスを入力してください';
    }
    
    //ユーザーパスワードの有無を確認
    if(!empty($_POST['user_pass'])) {
        $user_pass = $_POST['user_pass'];
        $login_placeholder[] = array('placeholder'=>$user_pass, 'data_type'=>'string');
    }else{
        $err_msg[] = 'パスワードを入力してください';    
    }
    
    
    //メンバーデータをDBから取得
    try{
        $member_data = get_member_data($login_placeholder);
    }catch(PDOException $e){
        $err_msg[] = "ユーザーデータを取得できませんでした".$e->getMessage();
    }
    
    //エラーがなく、DBからデータを取得できていれば
    if(count($err_msg) === 0){
        if(isset($member_data[0]['id']) === TRUE){
            //セッションにidを登録
            $_SESSION['user_id'] = $member_data[0]['id'];
            //マイページへ遷移
            header('Location:./mypage.php');
        }else{
            $err_msg[] = 'メールアドレスかパスワードがあっていません';
        }
    }

}//REQUEST_METHOD 終了
include('./header.php');
include('./view/login_view.php'); 
?>