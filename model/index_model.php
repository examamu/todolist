<?php
  //taskの削除
  function delete_task($task_id){
    try{
      $sql = 'DELETE FROM task WHERE task_id = ?';
      $post_data = array(
          array(
              'placeholder' => $task_id,
              'data_type' => 'integer'
          ));
      $execute_class = new Execute_data(); 
      $execute_class->execute_process($sql, $post_data);
    }catch(PDOException $e){
      throw $e;
    }
  }
?>