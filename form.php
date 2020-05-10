<?php
define("TITLE" , "Owhatask | マイページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/class.php');
require_once('./model/db.php');//form_model内に入れてしまう
require_once('./model/form.php');
session_start();
login_confirm();
$select_date_Class = new Option_date;
$select_date = $select_date_Class->select_date();

$err_msg = array();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $post_data = array();
    //user_id
    $user_id = $_SESSION['user_id'];
    $post_data[] = array('placeholder'=>$user_id, 'data_type'=>'integer');

    //task_name
    if(isset($_POST['name']) === TRUE){
        $task_name = $_POST['name'];
        $post_data[] = array('placeholder'=>$task_name, 'data_type'=>'string');
    }else{
        $err_msg[] = 'タスク名を入れてください';
    }

    //note
    $note = $_POST['note'];
    if(!empty($_POST['note'])){
        $post_data[] = array('placeholder'=>$note, 'data_type'=>'string');
    }else{
        $post_data[] = array('placeholder'=>NULL, 'data_type'=>'string');
    }
    

    //start_time
    if(!empty($_POST['start_year']) && !empty($_POST['start_month']) && !empty($_POST['start_day']) ){
        $start_time = $_POST['start_year'].$_POST['start_month'].$_POST['start_days'];
        $post_data[] = array('placeholder'=>$start_time, 'data_type'=>'string');
    }else{
        $post_data[] = array('placeholder'=>NULL, 'data_type'=>'string');
    }

    //finish_time
    if(!empty($_POST['finish_year']) && !empty($_POST['finish_month']) && !empty($_POST['finish_day'])){
        $finish_time = $_POST['finish_year'].$_POST['finish_month'].$_POST['finish_days'];
        $post_data[] = array('placeholder'=>$finish_time, 'data_type'=>'string');
    }else{
        $post_data[] = array('placeholder'=>NULL, 'data_type'=>'string');
    }

    if(count($err_msg) === 0){
        //create_datetime
        $create_datetime = date('YmdHis');
        $post_data[] = array('placeholder'=>$create_datetime, 'data_type'=>'string');
        try{
            insert_task_data($post_data);
        }catch(PDOException $e){
            $err_msg[] = 'インサートできませんでした。'.$e->getMessage;
        }      
    }
}//REQUEST_METHOD終了カッコ

include('./header.php');
include('./view/form_view.php'); 
?>