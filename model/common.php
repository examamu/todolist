<?php

function login_confirm() {
  if(isset($_SESSION['user_id']) !== TRUE){
    header('Location:./login.php');
  }
}

function get_db_connect() {
  try {
      // データベースに接続
      $dbh = new PDO(DSN, DB_USER, DB_PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => DB_CHARSET));
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (PDOException $e) {
      throw $e;
  }

  return $dbh;
}

//タスクデータを取得
function get_tasks_all($dbh,$user_id){
  try{
      $sql = 'SELECT * from tasks WHERE user_id = ?';
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(1,$user_id,PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll();
      return $rows;
  }catch(PDOException $e){
      throw $e;
  }
}


//ユーザーデータを表示
function get_member_data($dbh, $email, $password) {
  try{
    $sql = 'SELECT id 
            FROM members 
            WHERE email = ? 
            AND passwd = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,$email,PDO::PARAM_STR);
    $stmt->bindValue(2,$password,PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row;
  } catch (PDOException $e) {
    throw $e;
  }
}

// //予定を新規登録
// function insert_task_data($dbh){
//   $datetime = date('YmdHis');

// }




//taskの削除
function delete_task_data($dbh,$task_id){
  try{
    $sql = 'DELETE FROM tasks WHERE id = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,$task_id,PDO::PARAM_INT);
    $stmt->execute();
  }catch(PDOException $e){
    throw $e;
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