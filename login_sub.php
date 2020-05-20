<?php
session_start();
require('Database.php');
$crud =new Database();
$q = 'SELECT * FROM users WHERE email="'.$_POST['email'].'"  AND password="'.$_POST['password'].'"';
$rs = $crud->getSingleRow($q);

if($rs){
$_SESSION['user_id'] = $rs['id'];
$_SESSION['name'] = $rs['name'];
$_SESSION['email'] = $rs['email'];
$_SESSION['dob'] = $rs['dob'];
$_SESSION['user_type'] = $rs['user_type'];
$_SESSION['success'] = 'loged in successfull';
if($rs['user_type'] == 1){

	header('location:task.php');
}
else{
	header('location:children_dashboard.php');
}
}
else{
	$_SESSION['error'] = 'Invalid username or password!, Please try again';
	header('location:children_login.php');
}

