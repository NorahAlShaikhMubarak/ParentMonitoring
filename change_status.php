<?php
require('Database.php');
$crud =new Database();
$ids = $_POST['task_id'];
$q = 'UPDATE tasks SET status="2" WHERE ID in ('.$ids.')';
$crud->run($q);
header('location:children_dashboard.php');
   