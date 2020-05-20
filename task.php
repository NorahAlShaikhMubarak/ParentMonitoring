<?php 
session_start();
require('Database.php');
$crud =new Database();
$_SESSION['success'] = '';
?>
<!DOCTYPE html>
<html>
<title>Parents Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="style.css">

<body style="background-image: url('img7.jpg');">
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
  <p>
  <button onclick="w3_close()"  class="w3-bar-item w3-large">Close &times;</button></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">Username :- <?php echo $_SESSION['name']; ?></a></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">Email :- <?php echo $_SESSION['email']; ?></a></p>
  <p><a href="javascript:;" class="w3-bar-item w3-button" style="color: white">Date of Birth :- <?php echo $_SESSION['dob']; ?></a></p>
  <p><a href="change_password.php" class="w3-bar-item w3-button" style="color: white">Change Password</a></p>
  <p><a href="logout.php" class="w3-bar-item w3-button" style="color: white">Logout</a></p>
</div>
<div class="w3-container w3-half w3-margin-top" style="margin:auto;float:none;margin-top:20px; background: white!important;">

<form class="w3-container w3-card-4" style="padding-bottom: 60px;">
	<p>
<label>Assign a new task</label>
<input class="w3-input" type="text" id="taskDetail" style="width:90%" required placeholder="write a task"><button class="w3-button w3-section w3-teal w3-ripple" type="button" style="position: relative;float: right;bottom:42px;"  onclick="addTask()"> ADD </button></p>
<table id="task" style="width:90%" class="w3-table">
  <tr><th>Description</th><th>Task</th><th>status</th><th>Action</th></tr>
	<?php 
		$q = 'SELECT * FROM tasks WHERE parentId='.$_SESSION['user_id'];
		$rs = $crud->getAllData($q);
		$task_id = '';
		foreach($rs as $key=>$value){
          		$task_id .= $value['id'].',';

	?>
	<tr style="margin:5px;"><td><?php echo $value['detail']; ?></td><td><a href="/<?php echo basename(__DIR__) ?>/uploads/<?php echo $value['file_name']; ?>" target="_blank"><?php echo $value['file_name']; ?></a></td><td><?php if($value['status'] == 2){ echo 'Completed';}else if($value['status'] ==1){ echo 'Assigned';}else if($value['status'] ==0){ echo 'Scheduled';} ?></td><td ><a style="height: 20px;width: 20px;border-radius: 
  50%;background: red;cursor:pointer;color:white;padding: 5px;margin:5px;" onclick="removeTask(<?php echo $value['id'] ?>)" >-</a></td></tr>
	<?php }?>
</table>
<p><button class="w3-button w3-section w3-teal w3-ripple" type="button" style="float: right;" onclick="document.getElementById('id01').style.display='block'"> SEND </button></p>

</form>

</div>
<div id="id01" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span style="float:right;cursor:pointer;" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
      </div>

      <form class="w3-container">
        <div class="w3-section " style="background: #009688!important;">
          <select name="user" id="user" class="w3-input">
          	<option value="">Select users</option>
          	<?php 
          		$q ='SELECT * FROM users WHERE user_type=2';
          		$rs = $crud->getAllData($q);
          		
          	foreach($rs as $Key=>$value){ 
          	?>
          	<option  value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
          	<?php }?>
          </select>
          <button type="button" class="w3-button w3-section w3-teal w3-rippl" style="background: white!important; color: #009688!important " onclick="AssignToChildren()">Assign a task</button>
        </div>
      </form>

      <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
      </div> -->

    </div>
  </div>
  <script type="text/javascript">
  		

  	function addTask(){
  		var taskDetail = document.getElementById('taskDetail').value;
                if(taskDetail != ""){
  		var node = document.createElement("tr"); 
  		var textnode = document.createTextNode(taskDetail); 
  		node.appendChild(textnode);                              // Append the text to <li>
		document.getElementById("task").appendChild(node);
		var xhttp = new XMLHttpRequest();
  		xhttp.open("POST", "add_task.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var user_id = '<?php echo $_SESSION['user_id']; ?>';
		xhttp.send("task="+taskDetail+"&userId="+user_id);
		window.location.reload();
            }
  	}
  	function removeTask(id){
  		var xhttp = new XMLHttpRequest();
  		xhttp.open("POST", "remove_task.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("id="+id+"");
		window.location.reload();

  	}
  	function AssignToChildren(){
  		console.log('<?php echo $task_id; ?>');
  		var xhttp = new XMLHttpRequest();
  		xhttp.open("POST", "assign_task.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var task = '<?php echo $task_id; ?>';
		var children = document.getElementById('user').value;
		var user_id = '<?php echo $_SESSION['user_id']; ?>';
		xhttp.send("task_id="+task+"&parentId="+user_id+"&childrenId="+children);
		alert('task assign successfully');
		window.location.reload();
  	}
    function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
  </script>
</body>
</html> 
