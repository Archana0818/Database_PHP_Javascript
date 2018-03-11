//remove whitespace
function RemoveWhiteSpace(tempInputString)
{
	return tempInputString.trim();
}

//function to remove whitespace from user input and then return the value
function TrimInputString(id)
{
	var inputString = document.getElementById(id).value;

	return document.getElementById(id).value = RemoveWhiteSpace(inputString);

}

function PartFormValidation()
{
	
	TrimInputString('description');
	TrimInputString('onHand');
	TrimInputString('onOrder');
	TrimInputString('cost');
	TrimInputString('listPrice');
	
	const VENDOR_REQUIRED_ERROR = "vendor name required";
	const DESCRIPTION_SIZE_ERROR = "description can not be more than 30 characters";
	const ONHAND_FORMAT_ERROR = "On Hand should be a positive number";
	const ONORDER_FORMAT_ERROR = "On Order should be a positive number";
	const COST_FORMAT_ERROR = "Cost should be a positive number";
	const LISTPRICE_FORMAT_ERROR = "List Price should be a positive number";
	
	var vendorName = document.getElementById('vendor').value;
	var description = document.getElementById('description').value;
	var onHand = document.getElementById('onHand').value;
	var onOrder = document.getElementById('onOrder').value;
	var cost = document.getElementById('cost').value;
	var listPrice = document.getElementById('listPrice').value;
	
	document.getElementById("partsFormError").innerHTML="";
	
	var errorMessage = 0;	
	
	if(vendorName === "")
	{
		document.getElementById("partsFormError").innerHTML += VENDOR_REQUIRED_ERROR + "<br>";
		errorMessage++;
	}	
		
	if(description != "")
	{
		if(description.length > 30)
		{
			document.getElementById("partsFormError").innerHTML += DESCRIPTION_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if(onHand != "")
	{
		if(isNaN(onHand ) || onHand < 0)
		{
			document.getElementById("partsFormError").innerHTML += ONHAND_FORMAT_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if(onOrder != "")
	{
		if(isNaN(onOrder) || onOrder < 0)
		{
			document.getElementById("partsFormError").innerHTML += ONORDER_FORMAT_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if(cost != "")
	{
		if(isNaN(cost) || cost < 0)
		{
			document.getElementById("partsFormError").innerHTML += COST_FORMAT_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if(listPrice != "")
	{
		if(isNaN(listPrice) || listPrice < 0)
		{
			document.getElementById("partsFormError").innerHTML += LISTPRICE_FORMAT_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if(errorMessage === 0)
	{
		return true;
	}
	
	else
	{
		return false;
	}
	
}

//function to validate vendor form
function VendorFormValidation()
{
	
	TrimInputString('vendorNumber');
	TrimInputString('vendorName');
	TrimInputString('address');
	TrimInputString('address2');
	TrimInputString('city');
	TrimInputString('province');
	TrimInputString('postal');
	TrimInputString('country');
	TrimInputString('phone');
	TrimInputString('fax');
	
	const VENDOR_NUMBER_REQUIRED_ERROR = "vendor number required";
	const VENDOR_NUMBER_FORMAT_ERROR = " Vendor number should be positive integer";
	const VENDOR_NAME_SIZE_ERROR = "vendor name can not be more than 30 characters"; 
	const ADDRESS_SIZE_ERROR = "address can not be more than 30 characters"; 
	const CITY_SIZE_ERROR = "city can not be more than 20 characters";
	const PROVINCE_SIZE_ERROR = "province can not be more than 2 characters";
	const POSTAL_SIZE_ERROR = "postal code should not be more than 6 digits";
	const PHONE_SIZE_ERROR = "phone number can not be more than 12 digits"; 
	const COUNTRY_SIZE_ERROR = "enter 2 digit code for country";
	const FAX_SIZE_ERROR = "fax number can not be more than 12 digits";
	
	var vendorNumber = document.getElementById('vendorNumber').value;
	var vendorName = document.getElementById('vendorName').value;
	var address = document.getElementById('address').value;
	var address2 = document.getElementById('address2').value;
	var city = document.getElementById('city').value;
	var province = document.getElementById('province').value;
	var postalCode = document.getElementById('postal').value;
	var country = document.getElementById('country').value;
	var phoneNumber = document.getElementById('phone').value;
	var fax = document.getElementById('fax').value;

	var errorMessage = 0;
	
	document.getElementById("vendorFormError").innerHTML = "";
	

	if (vendorNumber == "")
	{
		document.getElementById("vendorFormError").innerHTML += VENDOR_NUMBER_REQUIRED_ERROR  + "<br>";
		errorMessage++;
	}
	
	else
	{
		if(isNaN(vendorNumber))
		{
			document.getElementById("vendorFormError").innerHTML += VENDOR_NUMBER_FORMAT_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	
	if (vendorName != "")
	{
		if(vendorName.length > 30)
		{
			document.getElementById("vendorFormError").innerHTML += VENDOR_NAME_SIZE_ERROR  + "<br>";
			errorMessage++;
		}
	}
	
	if (address != "" )
	{
		if(address.length > 30)
		{
			document.getElementById("vendorFormError").innerHTML += ADDRESS_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if (address2 != "" )
	{
		if(address2.length > 30)
		{
			document.getElementById("vendorFormError").innerHTML += ADDRESS_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if (city != "" )
	{
		if(city.length > 20)
		{
			document.getElementById("vendorFormError").innerHTML += CITY_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
		
		
	if (province != "" )
	{
		if(province.length > 2)
		{
			document.getElementById("vendorFormError").innerHTML += PROVINCE_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}

		
	if (postalCode != "")
	{
		if(postalCode.length > 6)
		{
			document.getElementById("vendorFormError").innerHTML += POSTAL_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}

	
	if (country != "")
	{
		if(country.length > 2)
		{
			document.getElementById("vendorFormError").innerHTML += COUNTRY_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	
	if ( phoneNumber != "")
	{
		if(phoneNumber.length > 12)
		{
			document.getElementById("vendorFormError").innerHTML += PHONE_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}

	if ( phoneNumber != "")
	{
		if(fax.length > 12)
		{
			document.getElementById("vendorFormError").innerHTML += FAX_SIZE_ERROR + "<br>";
			errorMessage++;
		}
	}
	
	if (errorMessage == 0)
	{
		return true;
	}
	
	else
	{
		return false;
	}
	
}



