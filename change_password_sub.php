<?php
session_start();
require('Database.php');
$crud =new Database();
$q = 'SELECT * FROM users WHERE id="'.$_SESSION['user_id'].'"';
$rs = $crud->getSingleRow($q);
$old_password = $_POST['old_password'];
if($rs['password'] != $old_password){
	$_SESSION['error'] = 'Old password is wrong';
	header('location:change_password.php');
}
else{
	$data = array(
		'password' => $_POST['new_password']
	);
	$rs = $crud->update('users',$data,'id='.$_SESSION['user_id']);
	$_SESSION['success'] = 'Password updated successfully';
	header('location:change_password.php');
}

