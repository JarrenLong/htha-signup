<?php
require("register.php");

if(isset($_POST['dl_csv']))
{
  array_to_csv_download(get_entry_list(),
    array(
	  'Id',
	  'Name',
	  'Address',
	  'City',
	  'State',
	  'Zip',
	  'Latitude',
	  'Longitude',
	  'Phone',
	  'HasParking',
	  'NumParkingSpaces',
	  'HasFood',
	  'FoodDescription',
	  'HasShowers',
	  'NumShowers',
	  'HasLaundry',
	  'LaundryType',
	  'InterstateExit',
	  'BusinessHours',
	  'BusinessWebsite',
	  'Notes',
	  'SubmitterContact',
	  'IsVerified'
    ),
    'htha_help_list.csv');
}

if(isset($_POST['approve']) && isset($_POST['id']))
{	
  approve_entry_by_id($_POST['id']);
  header("Location: /admin.php");
}
?>
