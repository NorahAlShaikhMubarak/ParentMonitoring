<?php
require('Database.php');
$crud =new Database();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		$data =  array('file_name' => $_FILES['image']['name']);
		$crud->update('tasks',$data,'id='.$_POST['id']);
        header('location:children_dashboard.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    