<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact Form</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<?php include("includes/header.php"); ?>
            
            <!-- start content -->
            
				<div id="contact">
					<div class="container">
                    <p class="left"><a href="/module-5/" class="button alt">&larr; Go Back to Module 5 Home</a></p>
						<section>
							<header>
								<h2>Contact Me</h2>
							</header>
						</section>
						<form action="MAILTO:ealdana@uh.edu" method="post" enctype="test/plain">
							<div class="row 50%">
								<div class="6u 12u(narrower)">
									<input name="name" placeholder="Name" type="text" class="text" />
								</div>
								<div class="6u 12u(narrower)">
									<input name="email" placeholder="Email" type="text" class="text" />
								</div>
							</div>
							<div class="row 50%">
								<div class="12u">
									<textarea name="message" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="row 50%">
								<div class="12u">
									<a href="contact.php" class="button alt">Send Message</a>
								</div>
							</div>
                            <?php
                        // minimal validation
                        $name = $_POST['name'];
                        if (isset($_POST['name'])) {
                                echo '<div class="success">
                                Thank you ' . $name . ', for signing up! Please proceed to creating your profile below!
                                </div><br />';
                            }  
                        ?>
						</form>
					</div>
				</div>
            
            <!-- end content -->
            
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