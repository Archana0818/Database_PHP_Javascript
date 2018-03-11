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

if(!isset($_POST['submitQuery']))
{
	header('location:index.php');
}

else
{
	$errors = "";
	
	$_SESSION['vendorNo'] = TrimData($_POST['vendorQuery']);
	
	if($_SESSION['vendorNo'] == "")
	{
		 $errors = "Select the vendor name from drop down list and then click submit button";
	}
	else
	{
		
	}
	
	if ($errors == "")
	{
		GetQuery();
	}
	else
	{
		echo $errors;
	}
}
//session ends here
session_destroy();
?>
	</body>
</html>