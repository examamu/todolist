<?php
define("TITLE" , "Owhatask | ログインページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/index_model.php');
session_start();
//空の配列作成
$err_msg = array();

try{
    $dbh = get_db_connect();
}catch(PDOException $e){
    $err_msg[] = "データベースに接続できませんでした".$e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //メールアドレスの有無を確認
    if(!empty($_POST['user_mail'])) {
        $user_mail = $_POST['user_mail'];
    } else {
        $err_msg[] = 'メールアドレスを入力してください';
    }
    
    //ユーザーパスワードの有無を確認
    if(!empty($_POST['user_pass'])) {
        $user_pass = $_POST['user_pass'];
    }else{
        $err_msg[] = 'パスワードを入力してください';    
    }

    //メンバーデータをDBから取得
    try{
        $member_data = get_member_data($dbh, $user_mail, $user_pass);
    }catch(PDOException $e){
        $err_msg[] = "ユーザーデータを取得できませんでした".$e->getMessage();
    }

    //エラーがなく、DBからデータを取得できていれば
    if(count($err_msg) === 0){
        if(!empty($member_data['id'])){
            //セッションにidを登録
            $_SESSION['user_id'] = $member_data['id'];
            //マイページへ遷移
            header('Location:./mypage.php');
        }else{
            $err_msg[] = 'メールアドレスかパスワードがあっていません';
        }
    }

}//REQUEST_METHOD 終了
var_dump($member_data);
include('./header.php');
include('./view/login_view.php'); 
?>