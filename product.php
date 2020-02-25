<?php include 'storescripts/db_connection.php';
	// Script Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<?php
//Check to see if URL variable is set and exists in database
if (isset($_GET['id'])){
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	//Use this var to check if this ID exists, if yes then get the product details
	//if no then exit this script and give message why
	$sql = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id' LIMIT 1");
	$productCount = mysqli_num_rows($sql); // count the output amount
	if ($productCount > 0) {
		//get all product details
		while($row = mysqli_fetch_array($sql)){
			$product_name = $row["product_name"];
			$price = $row["price"];
			$category = $row["category"];
			$detail = $row["detail"];
		}
	}
	else {
		echo "That item does not exist.";
		exit();
	}
}
else{
	echo "Data to render this page is missing.";
	exit();
}
mysqli_close($conn);
?>
	
<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title><?php echo $product_name;?></title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Product" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
</head>
<body>
		<?php include_once("template_header.php");?><br><br><br><br><br>
		<div id="searchBtn" style="float: right;">
			<form action="search.php" method="GET">
		    	<input type="text" name="query" size="40" />
		    	<input type="submit" value="Suchen" />
			</form>
		</div><br><br><br><br>
	
		<div id="content">
			  <table width="100%" border="0" cellspacing="0" cellpadding="10">
			  <tr>
			    <td width="20%" valign="top" align="center">
			    	<img src="inventory_images/<?php echo $id;?>.jpg" width="80%" height="80%" alt="<?php echo $product_name;?>" /><br />
			    	<a href="inventory_images/<?php echo $id;?>.jpg" style="color: white;">Bild ansehen</a>
			    </td>
			    
			    <td width="80%" valign="top" align="left">
			   		<h3><?php echo $product_name;?></h3>
			    	<p>
			    		<?php echo $price;?> EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: <?php echo $category;?> <br><br>
			    		<?php echo $detail;?>
			    	</p>
			    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        		<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
		        		<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      			</form>
			    </td>
			  </tr>
			</table>
	 	</div><br>
		<?php include_once("template_footer.php");?>
</body>
</html>