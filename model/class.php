<?php
//先頭大文字
Class Db {
    protected $dbh;
    public function __construct(){        
        try {
            $this->dbh = new PDO(DSN, DB_USER, DB_PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => DB_CHARSET));
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            return $e;
        }
    }
}

//DB用配列作成クラスをDBの子クラスに
Class Get_data extends Db{
    public function get_as_array($bind_value){
        try{
            $stmt = $this->dbh->prepare($bind_value['sql']);
            $bind_value_array = $bind_value['bind_value_params'];
            foreach($bind_value_array as $data){
                if($data['data_type'] === 'INT'){
                    $stmt->bindValue($data['bind_value_num'],$data['bind_value_param'],PDO::PARAM_INT);
                }else{
                    $stmt->bindValue($data['bind_value_num'],$data['bind_value_param'],PDO::PARAM_STR);
                }
            }
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }
    }
}
?>