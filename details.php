<?php
if(!isset($_GET['id'])) {
	header("Location: /index.php");
}

require 'register.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jarren Long, Books N' Bytes, Inc.">
    <link rel="icon" href="favicon.ico">
    <title>Helping Truckers Help America - Help Listing Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
  </head>
  <body class="bg">
    <div class="container" style="text-align:center;">
	
	<h1 class="form-signin-heading">Help Truckers Help America</h1>

	<h2 id="register">Listings Details</h2>
	
	<a href="listings.php"><h3>Go Back To Listings Page</h3></a>
	
	<br/>
	
	<?php $rec = get_entry_by_id($_GET['id'])[0]; ?>
	
	<div class="row">
		<div class="col-md-6">
			<table class="table table-bordered table-sm table-inverse">
				<tr>
					<td>Business/Organization Name:</td>
					<td><?php echo $rec[1]; ?></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><?php echo $rec[2]; ?></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><?php echo $rec[3]; ?></td>
				</tr>
				<tr>
					<td>State:</td>
					<td><?php echo $rec[4]; ?></td>
				</tr>
				<tr>
					<td>Zipcode:</td>
					<td><?php echo $rec[5]; ?></td>
				</tr>
				<tr>
					<td>Latitude:</td>
					<td><?php echo $rec[6]; ?></td>
				</tr>
				<tr>
					<td>Longitude:</td>
					<td><?php echo $rec[7]; ?></td>
				</tr>
				<tr>
					<td>Business Phone:</td>
					<td><?php echo $rec[8]; ?></td>
				</tr>
				<tr>
					<td>Has Parking?</td>
					<td>
					<?php
					if($rec[9] == 1)
						echo "Yes";
					else
						echo "No";
					?>
					</td>
				</tr>
				<tr>
					<td># Parking Spaces:</td>
					<td><?php echo $rec[10]; ?></td>
				</tr>
				<tr>
					<td>Has Food?</td>
					<td>
					<?php
					if($rec[11] == 1)
						echo "Yes";
					else
						echo "No";
					?>
					</td>
				</tr>
				<tr>
					<td>Food Description:</td>
					<td><?php echo $rec[12]; ?></td>
				</tr>
				<tr>
					<td>Has Showers?</td>
					<td>
					<?php
					if($rec[13] == 1)
						echo "Yes";
					else
						echo "No";
					?>
					</td>
				</tr>
				<tr>
					<td># of Showers:</td>
					<td><?php echo $rec[14]; ?></td>
				</tr>
				<tr>
					<td>Has Laundry?</td>
					<td>
					<?php
					if($rec[15] == 1)
						echo "Yes";
					else
						echo "No";
					?>
					</td>
				</tr>
				<tr>
					<td>Laundry Description:</td>
					<td><?php echo $rec[16]; ?></td>
				</tr>
				<tr>
					<td>Interstate Exit:</td>
					<td><?php echo $rec[17]; ?></td>
				</tr>
				<tr>
					<td>Business Hours:</td>
					<td><?php echo $rec[18]; ?></td>
				</tr>
				<tr>
					<td>Business Website:</td>
					<td><?php echo $rec[19]; ?></td>
				</tr>
				<tr>
					<td>Comments/Notes:</td>
					<td><?php echo $rec[20]; ?></td>
				</tr>
			</table>
		</div>
		<div class ="col-md-6">
			<h3>TODO: Map goes here ...</h3>
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
  </body>
</html>