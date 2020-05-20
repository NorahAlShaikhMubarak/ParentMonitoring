<?php

session_start();
require('Database.php');
$crud =new Database();
$ids = rtrim($_POST['task_id'],",");
$q = 'UPDATE tasks SET childrenId="'.$_POST['childrenId'].'" , status = 1 WHERE ID in ('.$ids.')';

$rs = $crud->run($q);
if($rs){
	echo 'record updated';
}


