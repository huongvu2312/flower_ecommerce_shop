<?php
session_start();
if(isset($_SESSION["manager"])) {
	header("location: index.php");
	exit();
}

header('Content-Type: text/html; charset=UTF-8');
?>

<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $pass = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	
    // Connect to the MySQL database  
    include "../storescripts/db_connection.php"; 
    $sql = mysqli_query($conn, "SELECT id FROM admin WHERE username='$manager' AND password='$pass' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
	
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $pass;
		 header("location: index.php");
         exit();
    } else {
		echo 'Diese Information ist falsch, versuchen Sie noch mal <a href="admin_login.php">Click Here</a>';
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Admin Anmeldung</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Admin Anmeldung" />	
	<link rel="stylesheet" type="text/css" href="../style/index.css" media="screen" />
</head>
<body>
	<?php include_once 'template_header4.php';?><br><br><br>
	<div id="content"><br><br><br><br><br>
		<h1>Bitte melden Sie sich an, um den Shop zu verwalten</h1><br>
		<form id="form1" name="form1" method="post" action="admin_login.php">
		       Benutzername:<br /><input name="username" type="text" id="username" size="40" /><br /><br />
		       Passwort:<br /><input name="password" type="password" id="password" size="40" /><br /><br />
		       <input type="submit" name="button" id="button" value="Anmelden" />
		</form>
	</div>
	<br><br><br><br><br><br>
	<div><?php include_once '../template_footer.php';?></div>
</body>
</html>
