<!DOCTYPE HTML>
<html>
	<head>
		<title>CIS 2336 | Module 3</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/projects/cis2336/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="two-sidebar">
		<div id="page-wrapper">

			<?php include("includes/header.php"); ?>
            
            <!-- Intro -->
				<div id="intro">
					<div class="container">
						<section>
							<header>
								<h2>MySQL and SQL</h2>
							</header>
							<div class="content">
							</div>
						</section>
					</div>
				</div>

			<!-- Main -->
				<div id="main">
					<div class="container">

						<div class="row 200%">

							<!-- Sidebar -->
								<div id="sidebar" class="3u 12u(narrower)">

									<section>
										<header>
											<h2>Content</h2>
										</header>
										<ul class="default">
											<li><a href="http://uh-cis.clarify-it.com/d/rngqcc" target="_blank">Lecture 1</a></li>
                                            <li><a href="http://uh-cis.clarify-it.com/d/ervd7g" target="_blank">Lecture 2</a></li>
                                            <li><a href="https://thenewboston.com/videos.php?cat=49" target="_blank">TheNewBoston MySQL Tutorials</a></li>
                                        </ul>
									</section>
								</div>

							<!-- Content -->
								<div id="content" class="6u 12u(narrower) important(narrower)">
									<article>
										<header>
											<h2>Module 3</h2>
											<span class="byline">In this module we learned all about databases including MySQL and SQL.</span>
										</header>
                                        <p>SQL stands for Structured Query Language. It provides the syntax of commands you send to a database.<br />
                                        
                                        MySQL is a SQL Database Management System (DBMS). MySQL is one of many DBMS that implements SQL.
                                        </p>
                                        <p>
                                            <strong>Personal Experience:</strong> Coming in, I knew very little about databases. I've had experience setting some up for Wordpress sites but I never did one for own purposes.<br /><br />
                                            
                                        Submit the form below to populate my database!
                                            <br /></p>
                                        <?php

define('DB_NAME', 'DB_NAME');
define('DB_USER', 'DB_USER');
define('DB_PASSWORD', 'PASSWORD');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
    die('Cant use ' . DB_NAME . ': ' . mysql_error());
}     

//echo 'Connected Successfully';

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$comments = $_POST['comments'];

$sql = "INSERT INTO data_form_home (name, email, gender, age, comments) VALUES ('$name', '$email', '$gender', '$age', '$comments')";

if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}

mysql_close();

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Minimal form validation:
	if (isset($_POST['name'], $_POST['email']) &&
	 is_numeric($_POST['age']) ) {
		
		echo '<div class="success">
  Thank you, for your submission! I will get back to you as soon as possible.
</div><br />';
	
	} else { // Invalid submitted values.
		echo '<div class="alert"> 
  Error! Please enter correct information.
</div><br />';
	}
}
?>    

                                        <form action="index.php" method="POST">
        <fieldset>
            
        <p><input type="text" name="name" size="20" maxlength="40" placeholder="Name" /></p>
        
        <p><input type="text" name="email" size="40" maxlength="60" placeholder="Email" /></p>
            
        <p><label for="gender">Gender: </label>
            <input type="radio" name="gender" value="M" />Male
            <input type="radio" name="gender" value="F" />Female
            <input type="radio" name="gender" value="Other" />Other
        </p>
            
        <p><input name="age" placeholder="Age" type="text" class="text" /></p>
            
        <p><textarea name="comments" rows="3" cols="40" placeholder="Comments"></textarea></p>
        </fieldset>
        
        <p align="center"><input type="submit" value="Submit" class="button alt" /></p>
            
        </form>

									</article>
								</div>

							<!-- Sidebar -->
								<div id="sidebar2" class="3u 12u(narrower)">

									<section>
										<header>
                                            <h2>Assignments</h2>
										</header>
										<ul class="default">
											<li><a href="/projects/cis2336/docs/W3Schools_SQL_Quiz_Test.pdf" target="_blank">W3Schools SQL Quiz Results</a></li>
                                            <li><a href="ealdana_SELECT.png" target="_blank">SHOW and SELECT SQL</a></li>
                                            <li><a href="ealdana_mytable.png" target="_blank">My Table (Screenshot)</a></li>
                                            <li><a href="myform_EA.php" target="_blank">My Form (with Database)</a></li>
                                            <!--<li><a href="two_db.php">Forms (Two Databases)</a></li>-->
										</ul>
									</section>

								</div>

						</div>
					</div>
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