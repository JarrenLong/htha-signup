<?php include_once("_header.php"); ?>
	<h1 class="form-signin-heading">Help Truckers Help America</h1>

	<h2 id="register">Current Listings (click "View Details" next to one for more info)</h2>
	
	<a href="index.php"><h3>Go Back To Add Listing Page</h3></a>
	
	<br/>
	
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
	require 'register.php';

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

<?php include_once("_footer.php"); ?>