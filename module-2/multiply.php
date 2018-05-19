<html>
	<head>
		<title>Multiplication Calculator</title>
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
								<h2>Multiplication Calculator</h2>
							</header>
						</section>
                        <?php # Script 3.10 - multiply.php

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Minimal form validation:
	if (isset($_POST['val1'], $_POST['val2']) &&
	 is_numeric($_POST['val1']) && is_numeric($_POST['val2']) ) {
	
		// Calculate the results:
		$product = $_POST['val1'] * $_POST['val2'];
		
		// Print the results:
		echo '<h2>Results</h2>
	<p>The two values multiplied together = ' . $product . '.</p>';
	
	} else { // Invalid submitted values.
		echo '<h2>Error!</h2>
		<p class="error">Please enter two valid numbers.</p>';
	}
	
} // End of main submission IF.

// Leave the PHP section and create the HTML form:
?>
						<form action="multiply.php" method="post">
	<p>First Number: <input type="text" name="val1" value="<?php if (isset($_POST['val1'])) echo $_POST['val1']; ?>" /></p>
	<p>Second Number: <input type="text" name="val2" value="<?php if (isset($_POST['val2'])) echo $_POST['val2']; ?>" /></p>
    
	<p><input type="submit" name="submit" value="Calculate" /></p>
</form>
					</div>
				</div>

				<?php include('includes/footer.php'); ?> 

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>