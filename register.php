<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>New User Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" placeholder="Username">
  	</div>
  	<div class="input-group">
  	  <label>Email </label>
  	  <input type="email" name="email" placeholder="email">
  	</div>
  	<div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phone" placeholder="phone number">
  	</div>
  	<div class="input-group">
  	  <label>password</label>
  	  <input type="password" name="password" placeholder="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>