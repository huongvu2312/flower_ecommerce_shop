<?php
	//Start session first thing in script
	session_start();
	if(!isset($_SESSION["user"])) {
		header("location: anmelden.php");
		exit();
	}
	//Be sure to check that this user SESSION value is in fact in the database
	$userID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]); // filter everything but numbers and letters
	$user_pass = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user_pass"]); // filter everything but numbers and letters
	// Run mySQL query to be sure that this person is an admin and that their user_pass session var equals the database information
	// Connect to the MySQL database
	include "storescripts/db_connection.php";
	$sql = mysqli_query($conn, "SELECT * FROM user_account WHERE id='$userID' AND username='$user' AND passwort='$user_pass' LIMIT 1"); // query the person
	// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
	$existCount = mysqli_num_rows($sql); // count the row nums
	if ($existCount == 0) { // evaluate the count
		echo "Ihre Anmeldungsdaten sind nicht in der Datenbank gespeichert.";
		exit();
	}
	
	// Script Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include 'storescripts/db_connection.php';
	header('Content-Type: text/html; charset=UTF-8');
?>

<?php
if (isset($_GET['log_out'])){
	unset($_SESSION['user']);
	unset($_SESSION['user_pass']);
	unset($_SESSION['cart_array']);
	header('location: index.php');
}
?>

<?php
	//if user attempts to add something to the cart from the product page
	if (isset($_POST['pid'])) {
		$pid = $_POST['pid'];
		$wasFound = false;
		$i = 0;
		//if the cart session var isnt set or cart array is empty
		if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
			//run if the cart is empty or not set
			$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
		}
		else {
			//run if the cart has at least one item in it
			foreach ($_SESSION["cart_array"] as $each_item) {
				$i++;
				while (list($key, $value) = each($each_item)) {
					if ($key == "item_id" && $value == $pid) {
						// That item is in cart already so let's adjust its quantity using array_splice()
						array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
						$wasFound = true;
					} // close if condition
				} // close while loop
			} // close foreach loop
			
			if ($wasFound == false) {
				array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
			}
		}
		header("location: cart.php");
		exit();
	}
?>

<?php 
	//if user chooses to empty their shopping cart
	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}
?>

<?php 
	//if user chooses to adjust item quantity
	if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
		$item_to_adjust = $_POST['item_to_adjust'];
		$quantity = $_POST['quantity'];
		$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
		if ($quantity >= 100) {	$quantity = 99;	}
		if ($quantity < 1) { $quantity = 1; }
		if ($quantity == "") { $quantity = 1; }
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) {
			$i++;
			while (list($key, $value) = each($each_item)) {
				if ($key == "item_id" && $value == $item_to_adjust) {
					// That item is in cart already so let's adjust its quantity using array_splice()
					array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				} // close if condition
			} // close while loop
		} // close foreach loop
		header("location: cart.php");
		exit();
	}
?>

<?php 
	//if user wants to remove an item from cart
	if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
		// Access the array and run code to remove that array index
		$key_to_remove = $_POST['index_to_remove'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$key_to_remove"]);
			sort($_SESSION["cart_array"]);
		}
}

?>

<?php 
	//render the cart  for the user to view
	$cartOutput = "";
	$cartTotal = 0;
	$pp_checkout_btn = '';
	$product_id_array = '';
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
		$cartOutput = "<h2 align='center'>Warenkorb ist leer</h2>";
	}
	else {
		// Start PayPal Checkout Button
		$pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					   		<input type="hidden" name="cmd" value="_cart">
					    	<input type="hidden" name="upload" value="1">
					    	<input type="hidden" name="business" value="you@youremail.com">';	//email from Paypal account of admin (Type: Business)
							
							
		// Start the For Each loop
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) {
			$item_id = $each_item['item_id'];
			$sql = mysqli_query($conn, "SELECT * FROM products WHERE id = '$item_id' LIMIT 1");
			while ($row = mysqli_fetch_array($sql)) {
				$product_name = $row["product_name"];
				$price = $row["price"];
			}
			$pricetotal = $price * $each_item['quantity'];
			$cartTotal = $pricetotal + $cartTotal;
			$pricetotal = number_format($pricetotal, 2, ',', '\'');
			
			//Dynamiccheckout button assembly
			$x = $i + 1;
			$pp_checkout_btn .= '<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
								<input type="hidden" name="amount_'.$x.'" value="'.$price.'">
								<input type="hidden" name="quantity_'.$x.'" value="'.$each_item['quantity'].'">';
			
			//Create the product array variable
			$product_id_array .= "$item_id-".$each_item['quantity'].",";
			
			//Dynamic table row assembly
			$cartOutput .= "<tr>";
			$cartOutput .= '<td><a href="product.php?id='.$item_id.'" style="color: white;">'.$product_name.'<br />
							<img src="inventory_images/'.$item_id.'.jpg" alt="'.$product_name.'" width="40" height="52" border="1" /></a></td>';
			$cartOutput .= "<td>".$price."</td>";
			$cartOutput .= '<td><form action="cart.php" method="post">
							<input name="quantity" type="text" value="'.$each_item['quantity'].'" size="1" maxlength="2" />
							<input name="adjustQuantity'.$item_id.'" type="submit" value="&auml;ndern" />
							<input name="item_to_adjust" type="hidden" value="'.$item_id.'" /></form></td>';
			//$cartOutput .= "<td>".$each_item['quantity']."</td>";
			$cartOutput .= "<td>".$pricetotal."</td>";
			$cartOutput .= '<td><form action="cart.php" method="post">
							<input name="deleteProduct'.$item_id.'" type="submit" value="X" />
							<input name="index_to_remove" type="hidden" value="'.$i.'" /></form></td>';
			$cartOutput .= "</tr>";
			$i++;
		}
	}
	$cartTotal = number_format($cartTotal, 2, ',', '\'');	
	$cartTotal = '<div align="right">Warenkorb Summe: '.$cartTotal." EURO</div>";
	
	//Finish the Paypal checkout button
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="'.$product_id_array.'">
	<input type="hidden" name="notify_url" value="storescripts/my_ipn.php">
	<input type="hidden" name="return" value="konto.php">	
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="cbt" value="Return to The Store">
	<input type="hidden" name="cancel_return" value="konto.php">
	<input type="hidden" name="lc" value="EU">
	<input type="hidden" name="currency_code" value="EURO">
	<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
	</form>';
	//checkout_complete.php	- Thank you for shopping with Paypal
	//paypal_cancel.php - You have canceled the payment
	
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Warenkorb</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Product" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
</head>
<body>
	<header>
		<div id="barline">
			<a href="index2.php">Home</a>
			<a href="angebot2.php">Angebot</a>
			<a href="shop2.php">Shop</a>
			<a href="ueberVTHBlumen2.html">Ueber VTH-Blumen</a>
			<a href="kontakt2.php">Kontakt</a>
			<a class="right" href="?log_out">Abmelden</a>
			<a class="right" href="konto.php">Mein Konto</a>
			<a class="right" href="cart.php">Warenkorb</a>
		</div>
		<a href="index2.php"><img id="logo" alt="logo" src="style/logo.png" /></a><br>
	</header>
	<br><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search2.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br><br>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">WARENKORB</div>
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content" align="left">
		<table border="1" cellspacing="0" cellpadding="6">
		     <tr>
		       <td width="20%"><strong>Produkt</strong></td>
		       <td width="4%"><strong>St&uuml;ckpreis</strong></td>
		       <td width="9%"><strong>Menge</strong></td>
		       <td width="4%"><strong>Summe</strong></td>
		       <td width="3%"><strong>L&ouml;schen</strong></td>
		     </tr>
		    <?php echo $cartOutput; ?>
	    </table><br>
		<?php echo $cartTotal; ?><br>
		<div align="right"><?php echo $pp_checkout_btn; ?></div><br>
		<center><a href="cart.php?cmd=emptycart" style="color: white;">Klicken Sie hier, um Ihren Warenkorb zu leeren</a></center>
	</div>
	<br>
	<?php include_once 'template_footer2.php';?>
</body>
</html>
