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

function get_as_array($dbh,$sql,$params){
  try{
    if(empty($params) === TRUE){
      return FALSE;
    }
    $stmt = $dbh->prepare($sql);
    foreach($params as $data){
      if($data[2] === 'INT'){
        $stmt->bindValue($data[0],$data[1],PDO::PARAM_INT);
      }else{
        $stmt->bindValue($data[0],$data[1],PDO::PARAM_STR);
      }
    }
    $stmt->execute();
    if(count($params) > 1){
      $rows = $stmt->fetchAll();
    }else{
      $rows = $stmt->fetch();
    }
    return $rows;
  }catch(PDOException $e){
    throw $e;
  }
}

//タスクデータを取得
function get_tasks_all($dbh,$user_id){
  try{
      $sql = 'SELECT * from task WHERE user_id = ?';
      $params = array(
                  array(1,$user_id,'INT')
                );
      return get_as_array($dbh,$sql,$params);
  }catch(PDOException $e){
      throw $e;
  }
}


//ユーザーデータを表示
function get_member_data($dbh, $email, $password) {
  try{
    $sql = 'SELECT id, passwd 
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

//新規登録にて重複しないようにemailでidを取得
function get_member_email($dbh, $email){
  try{
    $sql = 'SELECT id
            FROM members
            WHERE email = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,$email,PDO::PARAM_STR);
  }catch(PDOException $e){
    throw $e;
  }
}


//予定を新規登録
function insert_task_data($dbh,$user_id,$task_name,$continue_task,$start_time,$finish_time){
  $datetime = date('YmdHis');
  try{
    $sql = 'INSERT INTO 
            tasks(user_id,name,continueTask,start,finish)  
            VALUES(?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,$user_id,PDO::PARAM_INT);
    $stmt->bindValue(2,$task_name,PDO::PARAM_STR);
    $stmt->bindValue(3,$continue_task,PDO::PARAM_INT);
    $stmt->bindValue(4,$start_time,PDO::PARAM_STR);
    $stmt->bindValue(5,$finish_time,PDO::PARAM_STR);
    $stmt->execute();
  }catch(PDOException $e){
    throw $e;
  }

}




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


//ユーザーの新規登録
function insert_sign_up($dbh,$user_name,$password,$email) {
  try{
      $sql = 'INSERT INTO members(name,passwd,email) VALUES(?,?,?)';
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(1,$user_name, PDO::PARAM_STR);
      $stmt->bindValue(2,$password, PDO::PARAM_STR);
      $stmt->bindValue(3,$email, PDO::PARAM_STR);
      $stmt->execute();
  } catch (PDOException $e) {
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