<?php

	require("connection.php");
	
function TrimData($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//function to creat drop down list with vendor name	
function GetVendorNumber()
{
	$optionText = "";
	
	$connection =ConnectToDatabase();
	
	$querySelect = "SELECT VendorNo, VendorName FROM Vendors";
	
	$preparedQuerySelect = $connection -> prepare($querySelect);
	
	$preparedQuerySelect -> execute();
	
	while ($row = $preparedQuerySelect -> fetch())
		{
			$vendorNo = number_format($row['VendorNo'],0,'','');
			$optionText .= "<option value = '$vendorNo'>";
			$optionText .=  $row['VendorName'];
			$optionText .= "</option>\n";

		}
		
	echo $optionText;	
		
}

function CheckVendorNoDuplication()
{
	$userVendorNumber = $_POST['vendorNumber'];
	
	
	$vendorNo = array();
	
	$connection =ConnectToDatabase();
	
	$querySelect = "SELECT VendorNo FROM Vendors";
	
	$preparedQuerySelect = $connection -> prepare($querySelect);
	
	$preparedQuerySelect -> execute();
	
	while ($row = $preparedQuerySelect -> fetch())
		{
			$vendorNo[] = $row['VendorNo'];
		}

	for($i = 0; $i < count($vendorNo); $i++)
	{
		if( $userVendorNumber == $vendorNo[$i] )
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}

//function to insert data entered by user in parts table of database
function InsetDataParts()
{
	$vendorNo = $_SESSION['vendorNo'];
	$description = $_SESSION['description'];
	$onHand = $_SESSION['onHand'];
	$onOrder = $_SESSION['onOrder'];
	$cost = $_SESSION['cost'];
	$listPrice = $_SESSION['listPrice'];
	
	$queryInsert = "INSERT INTO Parts (VendorNo, Description, OnHand, OnOrder, Cost, ListPrice) VALUES (?, ?, ?, ?, ?, ?)";
	
	$connection = ConnectToDatabase();
	
	$parameterList = array($vendorNo, $description, $onHand, $onOrder, $cost, $listPrice);
	
	$preparedQuerySelect = $connection -> prepare($queryInsert);
	
	$preparedQuerySelect -> execute($parameterList);
	
}

//function to insert data entered by user in vendors table of database
function InsetDataVendors()
{
	$vendorNumber = $_SESSION['vendorNumber'];
	$vendorName = $_SESSION['vendorName'];
	$address = $_SESSION['address'] ;
	$address2 = $_SESSION['address2'];
	$city = $_SESSION['city'];
	$province = $_SESSION['province'];
	$postal = $_SESSION['postal'];
	$country = $_SESSION['country'];
	$phone = $_SESSION['phone'];
	$fax = $_SESSION['fax'];	
	
	$queryInsert = "INSERT INTO Vendors (VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone, Fax ) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
	$parameterList = array($vendorNumber, $vendorName, $address, $address2, $city, $province, $postal, $country, $phone, $fax );
	
	$connection = ConnectToDatabase();
	
	$preparedQuerySelect = $connection -> prepare($queryInsert);
	
	$preparedQuerySelect -> execute($parameterList);	
}

//function for 3rd form. User selects the vendor name and then it will display the details
function GetQuery()
{
	$vendorName = $_SESSION['vendorNo'];
	
	$parameterQuery = "SELECT * FROM Vendors WHERE VendorNo =?";
	
	$connection = ConnectToDatabase();
	
	$preparedStatement = $connection -> prepare($parameterQuery);
	
	$parameterList = array($vendorName);
	
	$preparedStatement -> execute($parameterList);
	
	$tableBodyText = "";
	
	while ($row = $preparedStatement -> fetch())
	{
		$vendorNo = number_format($row['VendorNo'],0,'','');
		$vendorName = $row['VendorName'];
		$address = $row['Address1'];
		$address2 = $row['Address2'];
		$city = $row['City'];
		$province = $row['Prov'];
		$postal = $row['PostCode'];
		$country = $row['Country'];
		$phone = $row['Phone'];
		$fax = $row['Fax'];		
	
		$tableBodyText .= "Vendor Number: $vendorNo<br>";
		$tableBodyText .= "Vendor Name: $vendorName<br>";
		$tableBodyText .= "Address1: $address<br>";
		$tableBodyText .= "Address2: $address2<br>";
		$tableBodyText .= "City: $city<br>";
		$tableBodyText .= "Province: $province<br>";
		$tableBodyText .= "PostCode: $postal<br>";
		$tableBodyText .= "Country: $country<br>";
		$tableBodyText .= "Phone: $phone<br>";
		$tableBodyText .= "Fax: $fax<br>";
		
	}
	
	echo $tableBodyText;	
}

function FillVendorTable()
{
	$tableBodyText = "";

	$connection = ConnectToDatabase();

	$querySelect = "SELECT VendorName FROM Vendors";
	
	$preparedQuerySelect = $connection -> prepare($querySelect);
	
	$preparedQuerySelect -> execute();

	while ($row = $preparedQuerySelect -> fetch())
	{
		$vendorNo = "";
		$vendorName = $row['VendorName'];

		$tableBodyText .= "<tr>";
		$tableBodyText .= "<td>$vendorNo</td>";
		$tableBodyText .= "<td class='text'>$vendorName</td>";
		$tableBodyText .= "</tr>";

	}
	
	echo $tableBodyText;
}


	function CreateVendorTableHeader()
	{

		$text = "<tr id='tableHeader'>";
		$text .= "<th>VendorNo</th>";
		$text .= "<th>VendorName</th>";
/*
		$text .= "<th>Address1</th>";
		$text .= "<th>Address2</th>";
		$text .= "<th>City</th>";
		$text .= "<th>Prov</th>";
		$text .= "<th>PostCode</th>";
		$text .= "<th>Count</th>";
		$text .= "<th>Phone</th>";
		$text .= "<th>Fax</th>";
*/
		$text .= "</tr>";

		echo $text;

	}

?>



