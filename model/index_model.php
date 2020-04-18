<?php

function get_tasks_all($dbh){
    try{
        $sql = 'SELECT * from tasks';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }catch(PDOException $e){
        throw $e;
    }
}

?>