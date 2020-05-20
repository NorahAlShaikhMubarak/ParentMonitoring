<?php
session_start();
require('Database.php');
$crud =new Database();
$data = array('id' =>$_POST['id'] );
$rs = $crud->delete('tasks',$_POST['id']);
if($id){
	echo 'task deleted successfull';
}


