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
    private function get_as_array($sql, $bind_value){
        try{
            $stmt = $this->dbh->prepare($sql);
            foreach($bind_value as $data){
                $bind_value_num = $data[0];
                $bind_value_praceholder = $data[1];
                $data_type = $data[2];
                
                if($data_type === 'integer'){
                    $stmt->bindValue($bind_value_num, $bind_value_praceholder, PDO::PARAM_INT);
                }else{
                    $stmt->bindValue($bind_value_num, $bind_value_praceholder, PDO::PARAM_STR);
                }
            }
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }
    }

    //bindValueへ適した形加工し配列へ入れる
    public function get_bind_value_array($sql, $get_placeholder){
        $data_param = array();
        $bind_value_num = 1;
            foreach ($get_placeholder as $data){
                $bind_value_praceholder = $data['placeholder'];
                $data_type = $data['data_type'];
                $data_param[] = array($bind_value_num, $bind_value_praceholder, $data_type);
                $bind_value_num++;
            }
        return $this->get_as_array($sql, $data_param);
    }
}



Class Execute_data extends Db{

    public function execute_process($sql, $data_param){
        try{
            $bind_value_num = 1;
            $stmt = $this->dbh->prepare($sql);
            foreach($data_param as $data){
                $placeholder = $data['placeholder'];
                $data_type = $data['data_type'];
                if($data_type === 'integer'){
                    $stmt->bindValue($bind_value_num, $placeholder, PDO::PARAM_INT);
                }else{
                    $stmt->bindValue($bind_value_num, $placeholder, PDO::PARAM_STR);
                }
                $bind_value_num++;
            }
            $stmt->execute();
        }catch(PDOException $e){
            throw $e;
        }
    }
}





Class Option_date {
    private function select_year(){
        $select_years = array();
        $year = date('Y');
        for($i = $year-1; $i<=$year+9; $i++){
            if($i < $year) {
                $select_years[] = '';
            }else{
                $select_years[] = $i;
            }
        }
        return $select_years;
    }

    private function select_month(){
        $select_months = array();
        define('ONE_YEAR', 12);
        for($i = 0; $i <= ONE_YEAR; $i++){
            if($i === 0){
                $select_months[] = '';
            }else{
                $select_months[] = $i;
            }
        }
        return $select_months;
    }

    private function select_day(){
        $select_days = array();
        define('ONE_MONTH', 31);
        for($i = 0; $i <= ONE_MONTH; $i++){
            if($i === 0){
                $select_days[] = '';
            }else{
                $select_days[] = $i;
            }
        }
        return $select_days;
    }

    public function select_date(){
        $select_years = $this->select_year();
        $select_months = $this->select_month();
        $select_days = $this->select_day();
        $select_date = array(
            'years' => $select_years,
            'months' => $select_months,
            'days' => $select_days
        );
        return $select_date;
    }
}
?>