<?php

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


?>