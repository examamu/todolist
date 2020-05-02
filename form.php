<?php
define("TITLE" , "Owhatask | マイページ");
ini_set('display_errors', "On");
require_once('./conf/const.php');
require_once('./model/common.php');
require_once('./model/class.php');
require_once('./model/index_model.php');
session_start();
login_confirm();
$select_date_Class = new Option_date;

$select_date = $select_date_Class->select_date();

$err_msg = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $post_data = array();
    //user_id
        $post_data[] = array('placeholder'=>$user_id, 'data_type'=>'integer');
    //task_name
    if(isset($_POST['name']) === TRUE){
        $post_data[] = array('placeholder'=>$task_name, 'data_type'=>'string');
    }
    //note
    $post_data[] = array('placeholder'=>$note, 'data_type'=>'string');
    //start_time
    $post_data[] = array('placeholder'=>$start_time, 'data_type'=>'string');
    //finish_time
    $post_data[] = array('placeholder'=>$finish_time, 'data_type'=>'string');
}

include('./header.php');
include('./view/form_view.php'); 
?>
	