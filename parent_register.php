<!DOCTYPE html>
<html>
<title>Parents Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="style.css">

<body style="background-image: url('img4.jpg');">

<header class="w3-container w3-teal" style="text-align: center;">
  <h1>Parents Monitoring System</h1>
</header>

<div class="w3-container w3-half w3-margin-top" style="margin:auto;float:none; background: white!important;">

<form class="w3-container w3-card-4" method="post" name="frm" action="registration_sub.php" id="frm" onsubmit="return validateForm()">
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] != ''){ ?>
<p style="color:red"><?php echo $_SESSION['error']; ?></p>
<?php $_SESSION['error'] = '';} ?>
<p id="error" style="color:red;display: none;"></p>
	<input type="hidden" name="user_type" value="1">
	<p>
<label>Name</label>
<input class="w3-input" type="text" name="name" id="name" style="width:90%" ></p>
<label>Email</label>
<input class="w3-input" type="text" name="email" id="email" style="width:90%" ></p>
<p>
<label>Date of birth</label>
<input class="w3-input" type="text" name="dob" id="dob" style="width:90%" ></p>
<p>

<label>Password</label>
<input class="w3-input" type="password" name="pwd" id="pwd" style="width:90%" ></p>
<label>Confirm Password</label>
<input class="w3-input" type="password" name="cnfpwd" id="cnfpwd" style="width:90%" ></p>
<p><p>
<button class="w3-button w3-section w3-teal w3-ripple" style="text-align: center;" type="submit"> Register </button></p>

</form>

</div>
<script type="text/javascript">
	function validateForm() {
		 var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
  var name = document.forms["frm"]["name"];
  var email = document.forms["frm"]["email"];

  var dob = document.forms["frm"]["dob"];
  var pwd = document.forms["frm"]["pwd"];
  var cnfpwd = document.forms["frm"]["cnfpwd"];

  
  if (name.value === "" || email.value === "" || dob.value === "" || pwd.value === "" || cnfpwd.value === "") {
    document.getElementById('error').innerHTML = 'Please, All Fields are Required';
    document.getElementById("error").style.display = "block";
    name.style.background = "#ff8080";
    email.style.background = "#ff8080";
    dob.style.background = "#ff8080";
    pwd.style.background = "#ff8080";
    cnfpwd.style.background = "#ff8080";
    return false;
  }else{
    name.style.background = "White";
    email.style.background = "White";
    dob.style.background = "White";
    pwd.style.background = "White";
    cnfpwd.style.background = "White";
  }

  if(!re.test(email.value)){
    document.getElementById('error').innerHTML = 'Enter valid email address';
    document.getElementById("error").style.display = "block";
    email.style.background = "#ff8080";
    return false;
  }else{
     email.style.background = "White";  
  }
  if(pwd.value != cnfpwd.value){
    document.getElementById('error').innerHTML = 'Password and confirm Password should match';
    document.getElementById("error").style.display = "block";
    pwd.style.background = "White";
    cnfpwd.style.background = "White";
    return false;
  }else{
    pwd.style.background = "White";
    cnfpwd.style.background = "White";
  }
}
</script>
</body>
</html> 
