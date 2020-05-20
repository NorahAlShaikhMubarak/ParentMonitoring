<?php
session_start();
require('Database.php');
$crud =new Database();
$q = 'SELECT * FROM users WHERE email="'.$_POST['email'].'"';
$rs = $crud->getSingleRow($q);

if($rs){
$_SESSION['error'] = 'Email already exist';
header('location:children_register.php');
}
else{
$data = array(
'name' => $_POST['name'],
'email' => $_POST['email'],
'dob' => $_POST['dob'],
'user_type' => $_POST['user_type'],
'password' => $_POST['pwd'] 
);

$id = $crud->insert('users',$data);
if($id){
	$_SESSION['success'] = 'registration successfull';
	header('location:children_login.php');
}
else{
	$_SESSION['error'] = 'Error in registration process';
	header('location:children_register.php');
}
}
