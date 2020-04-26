<?php

//各種パラメータをDBからデータを取得するクラスへ代入する
function get_data_from_db($bind_value){
    try{
        $get_as_array = new Get_data;
        return $get_as_array->get_as_array($bind_value);
    }catch(PDOException $e) {
        throw $e;
    }
}

//タスクデータを取得
function get_tasks_all($user_id){
  $bind_value = array(//実行前のファイルの準備
    'sql'=>'SELECT task_name from task WHERE user_id = ?',//sql文の指定
    'bind_value_params'=>array(//bind_value内に入るデータの入力
        array(
          'bind_value_num'=>1,
          'bind_value_param'=>$user_id,
          'data_type'=>'INT'
        )
      )
  ); 
  return get_data_from_db($bind_value);
}

function get_member_data($email, $password) {
  //SQL文指定
  $sql = 'SELECT * 
          FROM members 
          WHERE email = ? 
          AND passwd = ?';
  //bindValue用指定
  $bind_value = array(
      'sql'=> $sql,
      'post_var'=>array(
        'email'=>$email,
        'password'=>$password
      ),
      'bind_value_params'=>
        array(1,$email,'str'),
        array(2,$password,'str')
  );
  return get_data_from_db($bind_value);
}


  
  //新規登録にて重複しないようにemailでidを取得
  function get_member_email($email){
      $sql = 'SELECT id
              FROM members
              WHERE email = ?';
      $bindValue_params=array(
        'sql'=>$sql,
        'post_var'=>array('email'->$email),
        'bindValue_params'=>array(1,$email,'STR')
      );
      return get_data_from_db($bindValue_params);
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
?>