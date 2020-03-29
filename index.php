<?php
include_once("_header.php");

require 'register.php';

$Name=$Address=$City=$State=$Zip=$Latitude=$Longitude=$Phone=$FoodDescription=$InterstateExit=$BusinessHours=$BusinessWebsite=$Notes=$SubmitterContact=$LaundryType="";
$HasParking=$HasFood=$HasShowers=$HasLaundry=false;
$NumParkingSpaces=$NumShowers=0;

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
	
	<h2 id="register">Add a Listing!</h2>
	
	<p>Before adding a new listing, please <a href="listings.php">check the current listings</a> to make sure that the business you are listing is not already posted. Thank you!</p>
	
	<div class="row">
	  <div class="col-12">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		  <div class="form-group">
		    <label for="inputName" class="sr-only">Business/Organization Name</label>
            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Business/Organization Name" value="<?php echo $Name;?>"  maxlength="100" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputAddress" class="sr-only">Street Address</label>
            <input type="text" id="inputAddress" name="inputAddress" class="form-control" placeholder="Street Address" value="<?php echo $Address;?>" maxlength="100" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputCity" class="sr-only">City</label>
            <input type="text" id="inputCity" name="inputCity" class="form-control" placeholder="City" value="<?php echo $City;?>" maxlength="100" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputState" class="sr-only">State</label>
            <input type="text" id="inputState" name="inputState" class="form-control" placeholder="State" value="<?php echo $State;?>" maxlength="40" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputZip" class="sr-only">Zipcode</label>
            <input type="text" id="inputZip" name="inputZip" class="form-control" placeholder="Zipcode" value="<?php echo $Zip;?>" maxlength="10" required="">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputLatitude" class="sr-only">Latitude (if known)</label>
            <input type="text" id="inputLatitude" name="inputLatitude" class="form-control" placeholder="Latitude (if known)" value="<?php echo $Latitude;?>" maxlength="64">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputLongitude" class="sr-only">Longitude (if known)</label>
            <input type="text" id="inputLongitude" name="inputLongitude" class="form-control" placeholder="Longitude (if known)" value="<?php echo $Longitude;?>" maxlength="64">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputInterstateExit" class="sr-only">Nearest Interstate/Exit (if known)</label>
            <input type="text" id="inputInterstateExit" name="inputInterstateExit" class="form-control" placeholder="Nearest Interstate/Exit (if known)" value="<?php echo $InterstateExit;?>" maxlength="100">
          </div>
		  
		  <div class="form-group">
		    <label for="inputBusinessHours" class="sr-only">Business hours (if known)</label>
            <input type="text" id="inputBusinessHours" name="inputBusinessHours" class="form-control" placeholder="Business hours (if known)" value="<?php echo $BusinessHours;?>" maxlength="100">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputPhone" class="sr-only">Business Phone Number (if known)</label>
            <input type="text" id="inputPhone" name="inputPhone" class="form-control" placeholder="Business Phone Number (if known)" value="<?php echo $Phone;?>" maxlength="50">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputBusinessWebsite" class="sr-only">Business website (if known)</label>
            <input type="text" id="inputBusinessWebsite" name="inputBusinessWebsite" class="form-control" placeholder="Business website (if known)" value="<?php echo $BusinessWebsite;?>" maxlength="255">
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
            <input type="text" id="inputFoodDescription" name="inputFoodDescription" class="form-control" placeholder="If yes, where can food be accessed at?" value="<?php echo $FoodDescription;?>" maxlength="1000">
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
		    <label for="inputLaundryType">If yes, what kind of laundry acccess?</label>
			<input type="text" id="inputLaundryType" name="inputLaundryType" class="form-control" placeholder="If yes, what kind of laundry acccess?" value="<?php echo $LaundryType;?>" maxlength="200">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNotes" class="sr-only">Other comments/notes (optional)</label>
            <input type="text" id="inputNotes" name="inputNotes" class="form-control" placeholder="Other comments/notes" value="<?php echo $Notes;?>" maxlength="1000">
		  </div>
		  
		  <div class="form-group">
		    <label for="inputSubmitterContact" class="sr-only">Your contact info (in case we have questions). This will NOT be shared!</label>
            <input type="text" id="inputSubmitterContact" name="inputSubmitterContact" class="form-control" placeholder="Your contact info (in case we have questions). This will NOT be shared!" value="<?php echo $SubmitterContact;?>" maxlength="200">
		  </div>
		  
          <button class="btn btn-lg btn-primary btn-block" type="submit">Save Entry</button>
        </form>
	  </div>
    </div>

<?php include_once("_footer.php"); ?>
