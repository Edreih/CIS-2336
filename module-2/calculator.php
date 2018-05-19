<html>
	<head>
		<title>Trip Cost Calculator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/projects/cis2336/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">
            <?php include('includes/header.php'); ?>


			<!-- Main
				<div id="main">
					<div class="container">

						<!-- Content
							

					</div>
				</div>-->

			
			<!-- Contact -->
				<div id="contact">
					<div class="container">
                    <p class="left"><a href="/projects/cis2336/module-2/" class="button alt">&larr; Go Back to Module 2 Home</a></p><br />
						<section>
							<header>
								<h2>Trip Calculator</h2>
							</header>
						</section>
                        <?php # Script 3.10 - calculator.php #5

// This function creates a radio button.
// The function takes two arguments: the value and the name.
// The function also makes the button "sticky".
function create_radio($value, $name = 'gallon_price') {
	
	// Start the element:
	echo '<input type="radio" name="' . $name .'" value="' . $value . '"';
	
	// Check for stickiness:
	if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
		echo ' checked="checked"';
	} 
	
	// Complete the element:
	echo " /> $value ";

} // End of create_radio() function.

// This function calculates the cost of the trip.
// The function takes three arguments: the distance, the fuel efficiency, and the price per gallon.
// The function returns the total cost.
function calculate_trip_cost($miles, $mpg, $ppg) {
	
	// Get the number of gallons:
	$gallons = $miles/$mpg;
	
	// Get the cost of those gallons:
	$dollars = $gallons/$ppg;
	
	// Return the formatted cost:
	return number_format($dollars, 2);
	
} // End of calculate_trip_cost() function.

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Minimal form validation:
	if (isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) &&
	 is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency']) ) {
	
		// Calculate the results:
		$cost = calculate_trip_cost($_POST['distance'], $_POST['efficiency'], $_POST['gallon_price']);
		$hours = $_POST['distance']/65;
		
		// Print the results:
		echo '<h2>Total Estimated Cost</h2>
	<p>The total cost of driving ' . $_POST['distance'] . ' miles, averaging ' . $_POST['efficiency'] . ' miles per gallon, and paying an average of $' . $_POST['gallon_price'] . ' per gallon, is $' . $cost . '. If you drive at an average of 65 miles per hour, the trip will take approximately ' . number_format($hours, 2) . ' hours.</p>';
	
	} else { // Invalid submitted values.
		echo '<h2>Error!</h2>
		<p class="error">Please enter a valid distance, price per gallon, and fuel efficiency.</p>';
	}
	
} // End of main submission IF.

?>
						<form action="calculator.php" method="post">
	<p>Distance (in miles): <input type="text" name="distance" value="<?php if (isset($_POST['distance'])) echo $_POST['distance']; ?>" /></p>
	<p>Ave. Price Per Gallon: <span class="input">
	<?php
	create_radio('3.00');
	create_radio('3.50');
	create_radio('4.00');
	?>
	</span></p>
	<p>Fuel Efficiency: <select name="efficiency">
		<option value="10"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo ' selected="selected"'; ?>>Terrible</option>
		<option value="20"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo ' selected="selected"'; ?>>Decent</option>
		<option value="30"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo ' selected="selected"'; ?>>Very Good</option>
		<option value="50"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '50')) echo ' selected="selected"'; ?>>Outstanding</option>
	</select></p>
	<p><input type="submit" name="submit" value="Calculate!" /></p>
</form>
					</div>
				</div>

				<?php include("includes/footer.php"); ?> 

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>