<!doctype html>

<html lang="en">

	<head>
	
		<title>Assignment5</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/style.css">	
		<script src = "styles/a5.js"></script>
		<?php
			require("vendorTableData.php");
		?>
		
	</head>
	
	<body >
	
		<header>
		
			<h2>Database Entry</h2>
			<h3>Assignment5</h3>
			
    	</header>

		<article>
				fields marked with * are required
				<form action="parts.php" method="post" onSubmit = "return PartFormValidation()">
				
					<fieldset>
						<legend>Parts Form</legend>
						<h4>This form will insert data in Parts table of database</h4>
						<label for="vendor">Vendor Name:</label>
						<select name="vendor" id="vendor">
						<?php
						
						 GetVendorNumber();		
										
						?>
						</select><span style = "color:red">*</span>
						<label for="description">Description:</label>
						<input type ="text" name="description" id="description">
						<label for="onHand">On Hand:</label>
						<input type ="text" name="onHand" id="onHand">
						<label for="onOrder">On Order:</label>
						<input type ="text" name="onOrder" id="onOrder">
						<label for="cost">Cost:</label>
						<input type ="text" name="cost" id="cost">
						<label for="listPrice">List Price:</label>
						<input type ="text" name="listPrice" id="listPrice"><br>
						
						<span style = "color:red" id = "partsFormError"></span>
						
						<input type="submit" id="submitParts" value="Submit" name = "submitParts" >
						<input type="reset" id="resetParts" value="Reset"><br>
					</fieldset>
				
				</form>
				
				<form action="vendors.php" method="post" onSubmit = "return VendorFormValidation()">
					
					<fieldset>
						<legend>Vendors Form</legend>
						<h4>This form will insert data in Vendors table of database</h4>
						<label for="vendorNumber">Vendor Number:</label>
						<input type ="text" name="vendorNumber" id="vendorNumber"><span style = "color:red">*</span>
						<label for="vendorName">Vendor Name:</label>
						<input type ="text" name="vendorName" id="vendorName">
						<label for="address">Address:</label>
						<input type ="text" name="address" id="address">
						<label for="address2">Address2:</label>
						<input type ="text" name="address2" id="address2">
						<label for="city">City:</label>
						<input type ="text" name="city" id="city">
						<label for="province">Province:</label>
						<input type ="text" name="province" id="province">
						<label for="postal">Postal Code:</label>
						<input type ="text" name="postal" id="postal">
						<label for="country">Country:</label>
						<input type ="text" name="country" id="country">
						<label for="phone">Phone:</label>
						<input type ="text" name="phone" id="phone">
						<label for="fax">Fax:</label>
						<input type ="text" name="fax" id="fax"><br>
						<span style = "color:red" id = "vendorFormError"></span>
						<input type="submit" id="submitVendors" value="Submit" name = "submitVendors" >
						<input type="reset" id="resetVendors" value="Reset"><br>
					</fieldset>
				
				</form>
				
				<form action="parameter.php" method="post" >
					
					<fieldset>
						<legend>Query</legend>
						<h4>Select the vendor name and click submit .It will display vendor details (on another page) we have in our database(like Vendor number, address, phone)</h4>
						<select name="vendorQuery" id="vendorQuery">
						<?php
						GetVendorNumber();						
						?>
						</select><br>
						<input type="submit" id="submitQuery" value="Submit" name = "submitQuery" >
					</fieldset>
					
				</form>							
						
		</article>

		<footer>
			<p>Prepared By: Archana Lohani</p>
			<p> Group Number: 18</p>
		</footer>

	</body>

</html>


