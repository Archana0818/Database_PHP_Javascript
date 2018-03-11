<html>

	<head>
<?php

	require("vendorTableData.php");
?>
	</head>
	
	<body>
<?php
//session begins here
session_start();

if(!isset($_POST['submitVendors']))
{
	header('location:index.php');
}

else
{
	$errors = array();
	$_SESSION['vendorNumber'] = TrimData($_POST['vendorNumber']);
	$_SESSION['vendorName'] = TrimData($_POST['vendorName']);
	$_SESSION['address'] = TrimData($_POST['address']);
	$_SESSION['address2'] = TrimData($_POST['address2']);
	$_SESSION['city'] = TrimData($_POST['city']);
	$_SESSION['province'] = TrimData($_POST['province']);
	$_SESSION['postal'] = TrimData($_POST['postal']);
	$_SESSION['country'] = TrimData($_POST['country']);
	$_SESSION['phone'] = TrimData($_POST['phone']);
	$_SESSION['fax'] = TrimData($_POST['fax']);
	
	if($_SESSION['vendorNumber'] == "")
	{
		 $errors['vendorNumber'] = "Vendor's number is required<br>";
	}
	
	else if( $_SESSION['vendorNumber'] != "")
	{
		CheckVendorNoDuplication();
		if(CheckVendorNoDuplication())
		{
			$_SESSION['vendorNumber'] = TrimData($_POST['vendorNumber']);
		}	
		else
		{
			$errors['vendorNoDuplicate'] = "We already have that vendor in our database<br>";
		}
				
	}
	
	else
	{		
		if(!is_numeric($_SESSION['vendorNumber']))
		{
			$errors['vendorNumberFormat'] = "Vendor's number has to be positive numbers<br>";
		}
	}
	
	if($_SESSION['vendorName'] != "")
	{
		if(strlen($_SESSION['vendorName']) > 30)
		{
			$errors['vendorName'] = "vendor name can not be more than 30 characters<br>";
		}
	}
	else
	{
		$_SESSION['vendorName'] = " " ;
	}
	
	if($_SESSION['address'] != "")
	{
		if(strlen($_SESSION['address']) > 30)
		{
			$errors['address'] = "address can not be more than 30 characters<br>";
		}
	}
	else
	{
		$_SESSION['address'] = " ";
	}
	
	if($_SESSION['address2'] != "")
	{
		if(strlen($_SESSION['address2']) > 30)
		{
			$errors['address2'] = "address2 can not be more than 30 characters<br>";
		}
	}
	else
	{
		$_SESSION['address2'] = " ";
	}
	
	if($_SESSION['city'] != "")
	{
		if(strlen($_SESSION['city']) > 20)
		{
			$errors['city'] = "city can not be more than 20 characters<br>";
		}
	}
	else
	{
		$_SESSION['city'] = " ";
	}
	
	if($_SESSION['province'] != "")
	{
		if(strlen($_SESSION['province']) > 2 )
		{
			$errors['province'] = "enter valid 2 digit code of province<br>";
		}
	}
	else
	{
		$_SESSION['province'] = " ";
	}
	
	if($_SESSION['postal'] != "")
	{
		if(strlen($_SESSION['postal']) > 6)
		{
			$errors['province'] = "postal code should not be more than 6 digits<br>";
		}
	}
	else
	{
		$_SESSION['postal'] = " ";
	}
	
	if($_SESSION['country'] != "")
	{
		if(strlen($_SESSION['country']) > 2)
		{
			$errors['country'] = "enter 2 digit code for country<br>";
		}
	}
	else
	{
		$_SESSION['country'] = " ";
	}
	
	if($_SESSION['phone'] != "")
	{
		if(strlen($_SESSION['phone']) > 12)
		{
			$errors['phone'] = "phone number can not be more than 12 digits<br>";
		}
	}
	else
	{
		$_SESSION['phone'] = " ";
	}
	
	if($_SESSION['fax'] != "")
	{
		if(strlen($_SESSION['fax']) > 12)
		{
			$errors['fax'] = "fax number can not be more than 12 digits<br>";
		}
	}
	else
	{
		$_SESSION['fax'] = " ";
	}
	
	if(count($errors) === 0)
	{
		echo "<h3>Following details has been entered in the Vendors table of database:</h3>";
		echo "Vendor Number:" .  $_SESSION['vendorNumber']. "<br>";
		echo "Vendor Name:" . $_SESSION['vendorName']. "<br>";
		echo "Address: " . $_SESSION['address']. "<br>";
		echo "Address2 :" . $_SESSION['address2']. "<br>";
		echo "City:" . $_SESSION['city']. "<br>";
		echo "Province:" . $_SESSION['province']. "<br>";
		echo "Postal Code:" . $_SESSION['postal']. "<br>";
		echo "Country:" . $_SESSION['country']. "<br>";
		echo "Phone:" . $_SESSION['phone']. "<br>";
		echo "Fax:" . $_SESSION['fax']. "<br>";
		
		InsetDataVendors();//this function is created in vendorTableData.php. if there is no error, this function will insert data in database
	}
	//if there is any errors it will display errors
	else
	{
		foreach($errors as $value)
		{
			echo $value;
		}
	}

}
//session ends here
session_destroy();	
?>
	</body>
</html>


