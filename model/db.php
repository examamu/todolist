<?php


//sql文や条件などをClassへ送る
function send_Get_data_class($sql, $get_placeholder){
  try{
      $get_data_class = new Get_data;
      return $get_data_class->get_bind_value_array($sql, $get_placeholder);
  }catch(PDOException $e) {
      throw $e;
  }
}

//SQL文を用意
function get_tasks_all($get_placeholder){
  $sql = 'SELECT task_id,
                 user_id,
                 task_name,
                 note,
                 start_time,
                 finish_time,
                 create_datetime
          FROM task 
          WHERE user_id = ?';
  return send_Get_data_class($sql, $get_placeholder);
}

function get_member_data($get_placeholder){
  $sql = 'SELECT * FROM members WHERE email = ? AND passwd = ?';
  return send_Get_data_class($sql, $get_placeholder);
}

//新規登録にて重複しないようにemailでidを取得
function get_member_email($get_placeholder){
    $sql = 'SELECT id FROM members WHERE email = ?';
    return send_Get_data_class($sql, $get_placeholder);
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