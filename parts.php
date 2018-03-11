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

if(!isset($_POST['submitParts']))
{
	header('location:index.php');
}

else
{
	$errors = array();
	$_SESSION['vendorNo'] = TrimData($_POST['vendor']);
	$_SESSION['description'] = TrimData($_POST['description']);
	$_SESSION['onHand'] = TrimData($_POST['onHand']);
	$_SESSION['onOrder'] = TrimData($_POST['onOrder']);
	$_SESSION['cost'] = TrimData($_POST['cost']);
	$_SESSION['listPrice'] = TrimData($_POST['listPrice']);
	
	if($_SESSION['vendorNo'] == "")
	{
		 $errors['vendorNo'] = "Select the vendor name from drop down list\n";
	}
	
	if($_SESSION['description'] != "" )
	{
		 if(strlen($_SESSION['description']) > 30)//if user enters something in description, it checks the length of that and will give error if more than 30 characters
		 {
			$errors['description'] = "description can not be more than 30 characters<br>"; 
		 }
	}
	else
	{
		$_SESSION['description'] = " ";//if description is empty, we assign a blank character to description because as per database it should not have 0 length(chk parts table in design view)
	}
	
	if ($_SESSION['onHand'] != "")
	{
		if(!is_numeric($_SESSION['onHand']) || $_SESSION['onHand'] < 0)
		{
			$errors['onHand'] = "On hand has to be a positive number<br>";
		}
	}
	else
	{
		$_SESSION['onHand'] = 0;
	}
	
	if ($_SESSION['onOrder'] != "")
	{
		if(!is_numeric($_SESSION['onOrder']) || $_SESSION['onOrder'] < 0)
		{
			$errors['onHand'] = "On order has to be a positive number<br>";
		}
	}
	else
	{
		$_SESSION['onOrder'] = 0;
	}
	
	if ($_SESSION['cost'] != "")
	{
		if(!is_numeric($_SESSION['cost']) || $_SESSION['cost'] < 0)
		{
			$errors['onHand'] = "cost has to be a positive number<br>";
		}
	}
	else
	{
		$_SESSION['cost'] = 0;
	}
	
	if ($_SESSION['listPrice'] != "")
	{
		if(!is_numeric($_SESSION['listPrice']) || $_SESSION['listPrice'] < 0)
		{
			$errors['listPrice'] = "listPrice has to be a positive number<br>";
		}
	}
	else
	{
		$_SESSION['listPrice'] = 0;
	}
	
	//if count of error is 0 it will display the details entered by customer 
	if(count($errors) === 0)
	{
		echo "<h3>Following details has been entered in the Parts table of  database:</h3>";
		echo "Vendor Number:" .  $_SESSION['vendorNo']. "<br>";
		echo "Description:" . $_SESSION['description']. "<br>";
		echo "On Hand:" . $_SESSION['onHand']. "<br>";
		echo "On Order :" . $_SESSION['onOrder']. "<br>";
		echo "Cost:" . $_SESSION['cost']. "<br>";
		echo "List Price:" . $_SESSION['listPrice']. "<br>";
		
		InsetDataParts();//this function is created in vendorTableData.php. if there is no error, this function will insert data in database
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



