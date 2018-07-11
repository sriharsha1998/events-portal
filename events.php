<?php 
  include('server.php');

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
	<title>Events</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
  <style type="text/css">
    table{
      border: 2px solid red;
      background-color: #FFC;
    }

    th{
      border-bottom: 5px solid #000;
    }

    td{
      border-bottom: 2px solid #666;
    }
  </style>
</head>
<body>

<div class="header">
	<h2>List of Events</h2>
</div>
<div class="content">
  	<!-- notification message -->
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

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      List of Events are...<br><br>

    <?php 
    $sqlget = "SELECT * FROM events";
    $sqldata = mysqli_query($db, $sqlget) or die('Error showing Events list');        
    echo "<table>";        
    echo "<tr><th>Event</th><th>Description</th><th>Location</th><th>Start Date</th><th>End Date</th><th>Image</th></tr>";        
    while($row = mysqli_fetch_array($sqldata)){  //, MYSQLI_ASSOC)) {          
      echo "<tr><td>";
      echo $row['eventname'];
      echo "</td><td>";
      echo $row['description'];
      echo "</td><td>";
      echo $row['location'];
      echo "</td><td>";
      echo $row['startdate'];
      echo "</td><td>";
      echo $row['enddate'];
      echo "</td><td>";
      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image'] ).'" />';
      echo "</td></tr>";
    }

    echo "</table>"; ?>

    <br>
    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>