<?php 
  include('server.php');
  //session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
	<h2>Add a New Event</h2>
</div>
<div class="content">
  	<!-- notification message 
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
-->
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Add  a new event here...<!-- strong><?php echo $_SESSION['username']; ?></strong --></p>
      <br><br>
      <form method="post" action="addevent.php" style="width: 65%" enctype="multipart/form-data">
        <!-- ?php include('errors.php'); ?-->
        <div class="input-group">
          <label>Event name</label>
          <input type="text" name="eventname" >
        </div>
        <div class="input-group">
          <label>Event Description</label>
          <input type="textarea" name="description">
        </div>
        <div class="input-group">
          <label>Event Location</label>
          <input type="text" name="location">
        </div>
        <div class="input-group">
          <label>Start Date</label>
          <input type="date" name="startdate">
        </div>
        <div class="input-group">
          <label>End Date</label>
          <input type="date" name="enddate">
        </div>
        <div class="input-group">
          <label>Image</label>
          <input type="file" name="image">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="add_event">Add Event</button>
        </div>
      </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
  

  <?php
      //ADD EVENT
  if (isset($_POST['add_event'])) {


  //$target = "images/".basename($_FILES['image']['name']);
  $eventname = mysqli_real_escape_string($db, $_POST['eventname']);
  $eventdescription = mysqli_real_escape_string($db, $_POST['description']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
  $enddate = mysqli_real_escape_string($db, $_POST['enddate']);
  $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  //$image = mysqli_real_escape_string($db, $_FILES['image']);

  $query = "INSERT INTO events (eventname, description, location, startdate, enddate, image) VALUES ('$eventname', '$eventdescription', '$location', '$startdate', '$enddate', '$file')";

  mysqli_query($db, $query);

  //move_uploaded_file($_FILES['image']['tmp_name'], $target);
  
  header('location: events.php');  
}
?>
    <?php endif ?>
</div>
		
</body>
</html>