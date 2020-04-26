<?php


function login_confirm() {
  if(isset($_SESSION['user_id']) !== TRUE){
    header('Location:./login.php');
  }
}














//日付計算
function remainDate($day) {
  return intval((strtotime($day) - strtotime(date('Y/m/d'))) / (60*60*24));
}

function change_class_color(){
  //カラーの変更に際して、日付の取得
  //もし１週間前なら黄色
  //もし3日前ならオレンジ
  //当日なら赤
  //継続案件なら青
  //それ以外なら緑
}

?>