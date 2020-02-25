<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php
	include 'storescripts/db_connection.php';
	
	$dynamicList="";
	$sql = mysqli_query($conn, "SELECT * FROM products WHERE category='Angebot' ORDER BY date_added DESC");
	$productCount = mysqli_num_rows($sql); //count the output amount
	if($productCount > 0) {
		while ($row = mysqli_fetch_array($sql)) {
			$id = $row["id"];
			$product_name = $row["product_name"];
			$price = $row["price"];
			$category = $row["category"];
			$detail = $row["detail"];
			$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			$dynamicList=''.$dynamicList.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					<td width="20%" valign="top" align="center">
			    		<img src="inventory_images/'.$id.'.jpg" width="80%" height="80%" alt="'.$product_name.'" /><br />
			    		<a href="inventory_images/'.$id.'.jpg" style="color: white;"><b>Bild ansehen</b></a>
			    	</td>
			        <td width="80%" valign="top" align="left">
			   			<h3>'.$product_name.'</h3>
			    		<p>
			    			'.$price.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    			Kategory: '.$category.' <br><br>
			    			'.$detail.'
			    		</p>
			    		<p>
					    	<form id="form1" name="form1" method="post" action="anmelden.php">
			        			<input type="hidden" name="pid" id="pid" value="'.$id.'" />
			        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
		      				</form>
      					</p>
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
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Angebot</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Angebot" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
	
</head>
<body>
	<?php include_once 'template_header.php';?><br><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br><br>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">ANGEBOT</div>
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content">
		<?php echo $dynamicList; ?><br>
	</div>
	<?php include_once 'template_footer.php';?>
</body>
</html>
