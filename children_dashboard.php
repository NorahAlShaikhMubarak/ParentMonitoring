<?php 
session_start();
require('Database.php');
$crud =new Database();

?>
<!DOCTYPE html>
<html>
<title>Parents Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="style.css">

<body style="background-image: url('img11.jpg');">
<style type="text/css">
	header div {
  width: 35px;
  height: 5px;
  background-color: white;
  margin: 6px 0;
}
</style>
<header class="w3-container w3-teal" >
	<button class="w3-button w3-teal w3-xlarge" onclick="w3_open()" style="position: absolute;top:10px;">☰</button>
  <h1 style="text-align: center;">Parents Monitoring System</h1>
</header>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none; background: #009688!important;" id="mySidebar">
  <p><button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">User :- <?php echo $_SESSION['name']; ?></a></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">Email :- <?php echo $_SESSION['email']; ?></a></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">Date of Birth :- <?php echo $_SESSION['dob']; ?></a></p>
  <p><a href="change_password.php" class="w3-bar-item w3-button" style="color: white">Change Password</a></p>
  <p><a href="logout.php" class="w3-bar-item w3-button" style="color: white">Logout</a></p>
</div>
<div class="w3-container w3-half w3-margin-top" style="margin:auto;float:none;margin-bottom: 20px; background: white!important;">


<table id="task" border="0" class="w3-table">
	<tr><th>Description</th><th>Upload</th><th>Task</th><th>status</th><th>Mark Completed</th></tr>
	<?php 
		$q = 'SELECT * FROM tasks WHERE childrenId='.$_SESSION['user_id'];
		$rs = $crud->getAllData($q);
		$task_id = '';
		foreach($rs as $key=>$value){
          	$task_id .= $value['id'].',';	

	?>
	<tr><td><?php echo $value['detail']; ?></td><td><form method="post" id="<?php echo $key; ?>" action="assignment_upload.php"  enctype="multipart/form-data"><input type="file" name="image" onchange="submitForm(<?php echo $key; ?>)" accept="pdf,png"><input type="hidden" value="<?php echo $value['id']; ?>" name="id"></form></td><td><a href="/<?php echo basename(__DIR__) ?>/uploads/<?php echo $value['file_name']; ?>" target="_blank"><?php echo $value['file_name']; ?></a></td><td><?php if($value['status'] == 2){ echo 'Completed';}else if($value['status'] ==1){ echo 'Assigned';} else if($value['status'] ==0){ echo 'Scheduled';}?></td><td><input type="checkbox" name="task_id[]" class="chbox" id="chk-<?php echo $value['id']; ?>" onclick="getValue(<?php echo $value['id'];?>)" value="<?php echo $value['id'];?>" <?php if($value['status'] == 2){ echo 'checked=checked';} ?>></td></tr>
	<?php }?>
</table>
<p>
	<form method="post" id="frm" action="change_status.php"><input type="hidden" id="task_id" name="task_id" value="">
<button class="w3-button w3-section w3-teal w3-ripple" type="submit" style="text-align: center;"> DONE </button></form></p>

</div>
<script type="text/javascript">
	var task_id =[];
	function submitForm(id){
		document.getElementById(id).submit();
	}
	function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function getValue(val){
	var checkedValue = document.getElementById("chk-"+val).checked;
	if(checkedValue == true){
	task_id.push(val);
	document.getElementById('task_id').value = task_id;
	}
	else{
		for( var i = 0; i < task_id.length; i++){ 
   if ( task_id[i] === val) {
     task_id.splice(i, 1); 
   }
	}
	document.getElementById('task_id').value = task_id;

	}
}
</script>
  
</body>
</html> 
