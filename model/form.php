<?php
//予定を新規登録
function insert_task_data($post_data){
    $sql = 'INSERT INTO task(user_id,task_name,note,start_time,finish_time,create_datetime) VALUES(?,?,?,?,?,?)';
    $execute_class = new Execute_data();
    $execute_class->execute_process($sql, $post_data);
}

?>