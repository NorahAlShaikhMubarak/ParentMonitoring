<?php
session_start();
if(isset($_SESSION['user_id'])){
	if($_SESSION['user_type'] == 2){
		header('location:children_dashboard.php');

	}
	else{
		header('location:task.php');
	}
}
?>
<!DOCTYPE html>
<html>
<title>Parents Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="style.css">
<body style="background-image: url('image3.jpg');">

<header class="w3-container w3-teal" style="text-align: center;">
  <h1>Parents Monitoring System</h1>
</header>

    
<div class="w3-container w3-half w3-margin-top" style="background: white!important;">

<form class="w3-container w3-card-4" style="text-align: center;">
<h4 >Parents</h4>
<p><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXwA-w9yu-5UPxQprsGip06FUOoERvrxny8pvBbmv-AuMo98sM" height="200" width="200"></p>

<p>
<a class="w3-button w3-section w3-teal w3-ripple" style="margin:5px;" href="children_login.php"> Log in </a><a class="w3-button w3-section w3-teal w3-ripple" href="parent_register.php"> Register </a></p>

</form>

</div>
<div class="w3-container w3-half w3-margin-top" style="background: white!important;">

<form class="w3-container w3-card-4" style="text-align: center;">

<h4>Children</h4>
<p><img src="https://previews.123rf.com/images/gmast3r/gmast3r1612/gmast3r161200336/67764827-young-people-group-icon-set-teenager-children-avatar-flat-vector-illustration.jpg" height="200" width="200"></p>
<p>
<a class="w3-button w3-section w3-teal w3-ripple" style="margin:10px;" href="children_login.php"> Log in </a><a class="w3-button w3-section w3-teal w3-ripple" href="children_register.php">Register  </a></p>

</form>

</div>
        
</body>
</html> 
