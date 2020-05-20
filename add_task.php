<?php
session_start();
require('Database.php');
$crud =new Database();
$data = array('detail' =>$_POST['task'] ,'parentId' =>$_POST['userId'],'status'=>0 );
$id = $crud->insert('tasks',$data);
if($id){
	echo 'task added successfull';
}


