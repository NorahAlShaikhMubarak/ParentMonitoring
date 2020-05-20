<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>Parents Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="style.css">

<body style="background-image: url('img7.jpg')">

<header class="w3-container w3-teal" style="text-align: center;">
  <h1>Parents Monitoring System</h1>
</header>

<div class="w3-container w3-half w3-margin-top" style="margin:auto;float:none;margin-top:30px; background: white!important;">

<form class="w3-container w3-card-4" method="post" action="login_sub.php" id="frm" onsubmit="return validateForm()">
	<?php if(isset($_SESSION['success']) && $_SESSION['success'] != ''){ ?>
<p style="color:green"><?php echo $_SESSION['success']; ?></p>
<?php $_SESSION['success'] = '';} ?>
<?php if(isset($_SESSION['error']) && $_SESSION['error'] != ''){ ?>
<p style="color:red"><?php echo $_SESSION['error']; ?></p>
<?php $_SESSION['error'] = '';} ?>
<p id="error" style="color:red;display: none;"></p>


<label>Email</label>
<input class="w3-input" type="text" id="email" name="email"  >
<label>Password</label>
<input class="w3-input" type="password" id="password" name="password"  ></p>
<p>
<button class="w3-button w3-section w3-teal w3-ripple" type="submit" style="text-align: center;"> Log in </button></p>

</form>

</div>
<script type="text/javascript">
	function validateForm() {
		 var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
  var email = document.forms["frm"]["email"];


  var password = document.forms["frm"]["password"];

  if (email.value === "" && password.value === "") {
    document.getElementById('error').innerHTML = 'Please, All Fields are Required';
    document.getElementById("error").style.display = "block";
    email.style.background = "#ff8080";
    password.style.background = "#ff8080";
    return false;
  }else{
     email.style.background = "White";
     password.style.background = "White"; 
  }
   if (email.value === "" ) {
    document.getElementById('error').innerHTML = 'Please, Enter the email';
    document.getElementById("error").style.display = "block";
    email.style.background = "#ff8080";
    return false;
  }else{
     email.style.background = "White"; 
  }
   if (password.value === "" ) {
    document.getElementById('error').innerHTML = 'Please, Enter the password';
    document.getElementById("error").style.display = "block";
    password.style.background = "#ff8080";
    return false;
  }else{
     password.style.background = "White"; 
  }
  if(!re.test(email.value)){
    document.getElementById('error').innerHTML = 'Please, Enter a valid email address';
    document.getElementById("error").style.display = "block";
    mail.style.background = "#ff8080";
    return false;
  }else{
      email.style.background = "White"; 
  }
  
}
</script>
</body>
</html> 
