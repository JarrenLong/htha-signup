<?php include_once("_header.php"); ?>

	<h1 class="form-signin-heading">Helping Truckers Help America</h1>
	<div class="row">
      <div class="col-12">
	    <hr/>
	    <h2 class="form-signin-heading" id="faqs">Entry List</h2>
		<form action="dlcsv.php" method="post">
			<input type="hidden" name="dl_csv" />
			<input type="submit" value="Download as CSV" class="btn btn-lg btn-primary btn-block" />
			<p>Note: Be sure to open this file in Excel and use "Save As ..." change the file format to an Excel Workbook (.xlsx file). CSV Files DO NOT store formatting information, or column sizes, excel workbooks do.</p>
		</form>
		
		<br/>
		
		<table class="table table-bordered table-sm table-inverse">
		  <thead class="thead-default">
		    <tr>
		      <td>Name</td>
		      <td>Address</td>
		      <td>City</td>
		      <td>State</td>
		      <td>Zip</td>
		      <td>Latitude</td>
		      <td>Longitude</td>
		      <td>Phone</td>
		      <td>HasParking</td>
		      <td>NumParkingSpaces</td>
		      <td>HasFood</td>
		      <td>FoodDescription</td>
		      <td>HasShowers</td>
		      <td>NumShowers</td>
		      <td>HasLaundry</td>
		      <td>LaundryType</td>
		      <td>InterstateExit</td>
		      <td>BusinessHours</td>
		      <td>BusinessWebsite</td>
		      <td>Notes</td>
		      <td>SubmitterContact</td>
		      <td>Verified</td>
		    </tr>
		  </thead>
		  <?php
		  require "register.php";
		  
		  $regList = get_entry_list(false);
		  
		  foreach($regList as $rec) {
		    echo "
		  <tr>
		      <td>" . $rec[1] . "</td>
		      <td>" . $rec[2] . "</td>
		      <td>" . $rec[3] . "</td>
		      <td>" . $rec[4] . "</td>
			  <td>" . $rec[5] . "</td>
		      <td>" . $rec[6] . "</td>
			  <td>" . $rec[7] . "</td>
			  <td>" . $rec[8] . "</td>
			  <td>" . $rec[9] . "</td>
			  <td>" . $rec[10] . "</td>
		      <td>" . $rec[11] . "</td>
		      <td>" . $rec[12] . "</td>
		      <td>" . $rec[13] . "</td>
		      <td>" . $rec[14] . "</td>
			  <td>" . $rec[15] . "</td>
		      <td>" . $rec[16] . "</td>
			  <td>" . $rec[17] . "</td>
			  <td>" . $rec[18] . "</td>
			  <td>" . $rec[19] . "</td>
			  <td>" . $rec[20] . "</td>
			  <td>" . $rec[21] . "</td>";
			  
			  if($rec[22] == 0) {
			    echo "
			  <td>
			    <form action='dlcsv.php' method='post'>
				  <input type='hidden' name='approve'/>
				  <input type='hidden' name='id' value='" . $rec[0] . "'/>
				  <button class='btn btn-lg btn-primary btn-block' type='submit'>Approve</button>
				</form>
		      </td>";
              } else {
                echo"<td>Yes</td>";
			  }
			  
            echo "
          </tr>";
		  }
		  ?>
        </table>
	  </div>
	</div>
    
<?php include_once("_footer.php"); ?>
