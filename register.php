<?php
include('config.php');

function send_new_entry_email($name, $submitter) {
  $subject = "Helping Truckers - New Help Entry Added To Website Form To Review";

  $message = file_get_contents("./email.txt");
  $message = str_replace("__BUSINESS_NAME__", $name, $message);
  $message = str_replace("__SUBMITTER_CONTACT__", $submitter, $message);

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
  $headers .= 'From: "Helping Truckers Help America" <no-reply@helpingtruckers.all2a.net>' . "\r\n";
  $headers .= 'Reply-To: Helping Truckers Help America <no-reply@helpingtruckers.all2a.net>' . "\r\n";

  return mail("cmvresearch@gmail.com", $subject, $message, $headers);
}

function register(
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
  ) {
  global $servername, $username, $password, $dbname;

  $ret = '';
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $ret = "Error saving! Please email us at cmvresearch@gmail.com instead. CE.";
  }
  
  // Not already saved, do so now
  $sql = "INSERT INTO StopEntry (Name,Address,City,State,Zip,Latitude,Longitude,Phone,HasParking,NumParkingSpaces,HasFood,FoodDescription,HasShowers,NumShowers,HasLaundry,LaundryType,InterstateExit,BusinessHours,BusinessWebsite,Notes,SubmitterContact) VALUES ('"
  .$Name."', '"
  .$Address."', '"
  .$City."', '"
  .$State."', '"
  .$Zip."', '"
  .$Latitude."', '"
  .$Longitude."', '"
  .$Phone."', "
  .($HasParking?1:0).", "
  .$NumParkingSpaces.", "
  .($HasFood?1:0).", '"
  .$FoodDescription."', "
  .($HasShowers?1:0).", "
  .$NumShowers.", "
  .($HasLaundry?1:0).", "
  .$LaundryType.", '"
  .$InterstateExit."', '"
  .$BusinessHours."', '"
  .$BusinessWebsite."', '"
  .$Notes."', '"
  .$SubmitterContact
  ."')";
  
  if($conn->query($sql) !== TRUE) {
    $ret = "Error saving! Please email us at cmvresearch@gmail.com instead.";
	$conn->close();
    return $ret;
  }

  // Send out the "new entry added" email
  send_new_entry_email($Name, $SubmitterContact);
  
  // Cleanup and return success  
  $conn->close();
  
  return $ret;
}

function get_entry_list($verifiedOnly = true) {
  global $servername, $username, $password, $dbname;

  $ret = array();
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $ret = "Error!";
  }
  
  // Get a list of all entries
  $sql = "SELECT Id,Name,Address,City,State,Zip,Latitude,Longitude,Phone,HasParking,NumParkingSpaces,HasFood,FoodDescription,HasShowers,NumShowers,HasLaundry,LaundryType,InterstateExit,BusinessHours,BusinessWebsite,Notes,SubmitterContact,IsVerified FROM StopEntry";

  if($verifiedOnly) {
    $sql .= " WHERE IsVerified=1";
  }
  
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row=mysqli_fetch_row($result)) {
      $buf = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22]);
      array_push($ret, $buf);
    }
  }
  
  // Cleanup and return results  
  $conn->close();
  
  return $ret;
}

function get_entry_by_id($id) {
  global $servername, $username, $password, $dbname;

  $ret = array();
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $ret = "Error!";
  }
  
  $sql = "SELECT 
Id,
Name,
Address,
City,
State,
Zip,
Latitude,
Longitude,
Phone,
HasParking,
NumParkingSpaces,
HasFood,
FoodDescription,
HasShowers,
NumShowers,
HasLaundry,
LaundryType,
InterstateExit,
BusinessHours,
BusinessWebsite,
Notes,
SubmitterContact,
IsVerified
FROM StopEntry WHERE Id=" . $id;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row=mysqli_fetch_row($result)) {
      $buf = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22]);
      array_push($ret, $buf);
    }
  }
  
  // Cleanup and return the result  
  $conn->close();
  
  return $ret;
}

function approve_entry_by_id($id) {
  global $servername, $username, $password, $dbname;

  $ret = array();
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $ret = "Error!";
  }
  
  // Verify the entry
  $sql = "UPDATE StopEntry SET IsVerified=1 WHERE Id=".$id;

  $result = $conn->query($sql);
  
  // Cleanup  
  $conn->close();
}

function array_to_csv_download($array, $colHeaders, $filename = "export.csv", $delimiter=",") {
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename="'.$filename.'";');

  $f = fopen('php://output', 'w');

  fputcsv($f, $colHeaders, $delimiter);
  foreach ($array as $line) {
    fputcsv($f, $line, $delimiter);
  }

  header('Location: ~;');
}

?>
