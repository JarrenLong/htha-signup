<?php
if(!isset($_GET['id'])) {
	header("Location: /index.php");
}

require 'register.php';

include_once("_header.php");
?>
	
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
<?php include_once('_footer.php'); ?>