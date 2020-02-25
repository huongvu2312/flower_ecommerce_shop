<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php
	include 'storescripts/db_connection.php';
	//Run a select query to get my latest 6 items
	$dynamicList="";
	$sql = mysqli_query($conn, "SELECT * FROM products WHERE category='Angebot' ORDER BY date_added DESC LIMIT 6");
	$productCount = mysqli_num_rows($sql); //count the output amount
	if($productCount > 0) {
		while ($row = mysqli_fetch_array($sql)) {
			$id = $row["id"];
			$product_name = $row["product_name"];
			$price = $row["price"];
			$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			$dynamicList=''.$dynamicList.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					<td>
						<a href="product.php?id='.$id.'"><img style="border: #666 1px solid;" alt="'.$product_name.'" src="inventory_images/'.$id.'.jpg" width="20%" height="20%" border="1" /></a>
					</td>
				</tr>
				<tr>
					<td>
						<font size="4px">'.$product_name.'<br>
						<b>'.$price.' EURO</b></font><br>
						<a style="text-decoration: none; color: white;" href="product.php?id='.$id.'"><b>Mehr Details</b></a>
					</td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList = "Wir haben noch keine Produkte in unserem Shop.";
	}
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>VTH Blumen Home Page</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="VTH-Blumen Online Shop" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
	  
</head>
<body>
	<div id="background_image">
		<?php include_once 'template_header.php';?><br><br><br><br><br>
		<div class="welcome">
			<div id="slogan">F&Uuml;R EIN BL&Uuml;HENDES LEBEN</div><br>
			<div id="slogan_2">Blumen einfach online kaufen mit VTH Blumen</div>
		</div>
		<br><br><br><br>
		<div id="searchBtn">
			<form action="search.php" method="GET">
		    	<input type="text" name="query" size="40" />
		    	<input type="submit" value="Suchen" />
			</form>
		</div>
		<br><br><br><br><br><br><br><br><hr color= "white" size=5px width=1000px align="center"><br><br>
		<div id="slogan">ANGEBOT</div><br><br>
		<?php echo $dynamicList; ?><br>
		<?php include_once 'template_footer.php';?>
	</div>
</body>
</html>
