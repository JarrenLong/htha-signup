<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jarren Long, Books N' Bytes, Inc.">
    <link rel="icon" href="favicon.ico">
    <title>Helping Truckers Help America - Help Listings</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" />
  </head>
  <body class="bg">
    <div class="container" style="text-align:center;">
	
<?php
require 'register.php';

$Name=$Address=$City=$State=$Zip=$Latitude=$Longitude=$Phone=$FoodDescription=$InterstateExit=$BusinessHours=$BusinessWebsite=$Notes=$SubmitterContact="";
$HasParking=$HasFood=$HasShowers=$HasLaundry=false;
$NumParkingSpaces=$NumShowers=$LaundryType=0;

$err = "";

function test_input($data) {
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'", "\'", $data);
  $data = trim($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Name = test_input($_POST["inputName"]);
  if (empty($Name) || $Name == '') {
    $err .= "Business/Organization name is required. ";
  }
  $Address = test_input($_POST["inputAddress"]);
  if (empty($Address) || $Address == '') {
    $err .= "Address is required. ";
  }
  $City = test_input($_POST["inputCity"]);
  if (empty($City) || $City == '') {
    $err .= "City is required. ";
  }
  $State = test_input($_POST["inputState"]);
  if (empty($State) || $State == '') {
    $err .= "State is required. ";
  }
  $Zip = test_input($_POST["inputZip"]);
  if (empty($Zip) || $Zip == '') {
    $err .= "Zipcode is required. ";
  }
  $Latitude = test_input($_POST["inputLatitude"]);
  $Longitude = test_input($_POST["inputLongitude"]);
  $Phone = test_input($_POST["inputPhone"]);
  $HasParking = ($_POST["inputHasParking"] == "yes");
  $NumParkingSpaces = test_input($_POST["inputNumParkingSpaces"]);
  if(empty($NumParkingSpaces))
	  $NumParkingSpaces=0;
  $HasFood = ($_POST["inputHasFood"] == "yes");
  $FoodDescription = test_input($_POST["inputFoodDescription"]);
  $HasShowers = ($_POST["inputHasShowers"] == "yes");
  $NumShowers = test_input($_POST["inputNumShowers"]);
  if(empty($NumShowers))
	  $NumShowers=0;
  $HasLaundry = ($_POST["inputHasLaundry"] == "yes");
  $LaundryType = test_input($_POST["inputLaundryType"]);
  $InterstateExit = test_input($_POST["inputInterstateExit"]);
  $BusinessHours = test_input($_POST["inputBusinessHours"]);
  $BusinessWebsite = test_input($_POST["inputBusinessWebsite"]);
  $Notes = test_input($_POST["inputNotes"]);
  $SubmitterContact = test_input($_POST["inputSubmitterContact"]);
  
  if (!empty($err)) {
?>
    <div class="alert alert-danger">Please fix the following issues, and try again: <br/><?php echo trim($err);?></div>
<?php
  } else {	
	$err = register(
		$Name,
		$Address,
		$City,
		$State,
		$Zip,
		$Latitude,
		$Longitude,
		$Phone,
		$HasParking,
		$NumParkingSpaces,
		$HasFood,
		$FoodDescription,
		$HasShowers,
		$NumShowers,
		$HasLaundry,
		$LaundryType,
		$InterstateExit,
		$BusinessHours,
		$BusinessWebsite,
		$Notes,
		$SubmitterContact
	);
	if (!empty($err)) {
?>
      <div class="alert alert-danger"><?php echo trim($err);?></div>
<?php
    } else {
?>
      <div class="alert alert-success">Thanks for your help! We will review your submission ASAP and get it added to our list!</div>
<?php
    }
  }
}
?>
	
	<h1 class="form-signin-heading">Help Truckers Help America</h1>

	<h2 id="register">Current Listings (click "View Details" next to one for more info)</h2>
	
	<table class="table table-bordered table-sm table-inverse">
		  <thead class="thead-default">
		    <tr>
			  <td>&nbsp;</td>
		      <td>Name</td>
		      <td>Address</td>
		      <td>City</td>
		      <td>State</td>
		      <td>Zip</td>
		      <td>Notes</td>
		    </tr>
		  </thead>
		  <?php
		  $regList = get_entry_list(true);
		  
		  foreach($regList as $rec) {
		    echo "
		    <tr>
			  <td><a href='details.php?id=" . $rec[0] . "'>View Details</a></td>
		      <td>" . $rec[1] . "</td>
		      <td>" . $rec[2] . "</td>
		      <td>" . $rec[3] . "</td>
		      <td>" . $rec[4] . "</td>
			  <td>" . $rec[5] . "</td>
			  <td>" . $rec[20] . "</td>
            </tr>";
		  }
		  ?>
        </table>
	  
	  
	  
	<h2 id="register">Add a Listing!</h2>
	
	<div class="row">
	  <div class="col-12">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		  <div class="form-group">
		    <label for="inputName" class="sr-only">Business/Organization Name</label>
            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Business/Organization Name" value="<?php echo $Name;?>" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputAddress" class="sr-only">Street Address</label>
            <input type="text" id="inputAddress" name="inputAddress" class="form-control" placeholder="Street Address" value="<?php echo $Address;?>" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputCity" class="sr-only">City</label>
            <input type="text" id="inputCity" name="inputCity" class="form-control" placeholder="City" value="<?php echo $City;?>" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputState" class="sr-only">State</label>
            <input type="text" id="inputState" name="inputState" class="form-control" placeholder="State" value="<?php echo $State;?>" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputZip" class="sr-only">Zipcode</label>
            <input type="text" id="inputZip" name="inputZip" class="form-control" placeholder="Zipcode" value="<?php echo $Zip;?>" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputLatitude" class="sr-only">Latitude (if known)</label>
            <input type="text" id="inputLatitude" name="inputLatitude" class="form-control" placeholder="Latitude (if known)" value="<?php echo $Latitude;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputLongitude" class="sr-only">Longitude (if known)</label>
            <input type="text" id="inputLongitude" name="inputLongitude" class="form-control" placeholder="Longitude (if known)" value="<?php echo $Longitude;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputInterstateExit" class="sr-only">Nearest Interstate/Exit (if known)</label>
            <input type="text" id="inputInterstateExit" name="inputInterstateExit" class="form-control" placeholder="Nearest Interstate/Exit (if known)" value="<?php echo $InterstateExit;?>">
          </div>
		  
		  <div class="form-group">
		    <label for="inputBusinessHours" class="sr-only">Business hours (if known)</label>
            <input type="text" id="inputBusinessHours" name="inputBusinessHours" class="form-control" placeholder="Business hours (if known)" value="<?php echo $BusinessHours;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputPhone" class="sr-only">Business Phone Number (if known)</label>
            <input type="text" id="inputPhone" name="inputPhone" class="form-control" placeholder="Business Phone Number (if known)" value="<?php echo $Phone;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputBusinessWebsite" class="sr-only">Business website (if known)</label>
            <input type="text" id="inputBusinessWebsite" name="inputBusinessWebsite" class="form-control" placeholder="Business website (if known)" value="<?php echo $BusinessWebsite;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputHasParking" class="sr-only">Does this place have parking?</label>
		    <input type="checkbox" id="inputHasParking" name="inputHasParking" class="form-control" style="text-align:left;" value="yes" <?php if($HasParking) { echo "checked"; }?>> Does this place have parking?
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNumParkingSpaces">If yes, how many parking spaces?</label>
            <input type="number" id="inputNumParkingSpaces" name="inputNumParkingSpaces" class="form-control" placeholder="If yes, how many parking spaces?" value="<?php echo $NumParkingSpaces;?>">
		  </div>
		  
		  <div class="form-check">
		    <label for="inputHasFood" class="sr-only">Does this place have food access?</label>
		    <input type="checkbox" id="inputHasFood" name="inputHasFood" class="form-control" style="text-align:left;" value="yes" <?php if($HasFood) { echo "checked"; }?>> Does this place have food?
		  </div>
		  
		  <div class="form-group">
		    <label for="inputFoodDescription">If yes, where can food be accessed at?</label>
            <input type="text" id="inputFoodDescription" name="inputFoodDescription" class="form-control" placeholder="If yes, where can food be accessed at?" value="<?php echo $FoodDescription;?>">
		  </div>
		  
		  <div class="form-check">
		    <label for="inputHasShowers" class="sr-only">Does this place have shower access?</label>
		    <input type="checkbox" id="inputHasShowers" name="inputHasShowers" class="form-control" style="text-align:left;" value="yes" <?php if($HasShowers) { echo "checked"; }?>> Does this place have showers?
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNumShowers">If yes, how many showers?</label>
            <input type="number" id="inputNumShowers" name="inputNumShowers" class="form-control" placeholder="If yes, how many showers?" value="<?php echo $NumShowers;?>">
		  </div>
		  
		  <div class="form-check">
		    <label for="inputHasLaundry" class="sr-only">Does this place have laundry access?</label>
		    <input type="checkbox" id="inputHasLaundry" name="inputHasLaundry" class="form-control" style="text-align:left;" value="yes" <?php if($HasLaundry) { echo "checked"; }?>> Does this place have laundry?
		  </div>
		  
		  <div class="form-group">
		    <label for="inputLaundryType">If yes, what kind of laundry acccess (choose one)</label>
		    <select class="form-control" name="inputLaundryType" id="inputLaundryType">
		      <option value="0" selected>None</option>
		      <option value="1">2</option>
		      <option value="2">3</option>
		      <option value="3">4</option>
		      <option value="4">5</option>
		    </select>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNotes" class="sr-only">Other comments/notes (optional)</label>
            <input type="text" id="inputNotes" name="inputNotes" class="form-control" placeholder="Other comments/notes" value="<?php echo $Notes;?>">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputSubmitterContact" class="sr-only">Your contact info (in case we have questions). This will NOT be shared!</label>
            <input type="text" id="inputSubmitterContact" name="inputSubmitterContact" class="form-control" placeholder="Your contact info (in case we have questions). This will NOT be shared!" value="<?php echo $SubmitterContact;?>">
		  </div>
		  
          <button class="btn btn-lg btn-primary btn-block" type="submit">Save Entry</button>
        </form>
	  </div>
    </div>
	
	<br/>
	
	<div class="row">
	  <div class="col-3">&nbsp;</div>
	  <div class="col-6">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6t+ed+2i-1n-4w"
     data-ad-client="ca-pub-8519280427354162"
     data-ad-slot="8418154450"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
	  </div>
	  <div class="col-3">&nbsp;</div>
	</div>

    </div>
    <script src="ie10-viewport-bug-workaround.js.download"></script>
  </body>
</html>