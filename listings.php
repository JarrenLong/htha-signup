<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jarren Long, Books N' Bytes, Inc.">
    <link rel="icon" href="favicon.ico">
    <title>Helping Truckers Help America - Help Listings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
  </head>
  <body class="bg">
    <div class="container" style="text-align:center;">
	
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