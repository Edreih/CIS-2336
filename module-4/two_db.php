<?php

define('DB_NAME', 'ealdana_CIS2336');
define('DB_USER', 'cis2336');
define('DB_PASSWORD', 'speedy13');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
    die('Cant use ' . DB_NAME . ': ' . mysql_error());
} else {
    // echo 'Connected Successfully';
}    

// set variables for form elements
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['password'];

// form 2 variables
$color = $POST['color'];
$food = $POST['food'];
$activity = $POST['activity'];
$number = $POST['number'];

$sql = "INSERT INTO data_form_signup (name, email, password) VALUES ('$name', '$email', '$password')";
$sql2 = "INSERT INTO data_form_profile (color, food, activity, number) VALUES ('$color', '$food', '$activity', '$number')";

// check for query errors
if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}
if (!mysql_query($sql2)) {
    die('Error: ' . mysql_error());
}

// gather database/table output table 1
$query="SELECT * FROM data_form_signup WHERE name IS NOT NULL"; // table = data_form_signup
$result=mysql_query($query);
$num=mysql_numrows($result);

// gather database/table output table 2
$query2="SELECT * FROM data_form_profile ORDER BY id"; // table = data_form_profile
$result2=mysql_query($query2);
$num2=mysql_numrows($result2);


//mysql_close();

// Leave the PHP section and create the HTML page:
?>

<html>
	<head>
		<title>Forms Connected to Two Databases</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">
            <?php include('includes/header.php'); ?>
			
			<!-- Contact -->
				<div id="contact">
					<div class="container">
                    <p class="left"><a href="/module-4/" class="button alt">&larr; Go Back to Module 4 Home</a></p><br />
						<section>
							<header>
								<h2>Forms Connected to Two Databases</h2>
							</header>
						</section>
                        
                        <header>
								<h2>Create an Account</h2>
				        </header>
                        
                        <!-- form 1 -->
                        <form action="two_db.php" method="POST">
                            <fieldset>
                            <p><input type="text" name="name" size="20" maxlength="40" placeholder="Username" /></p>
                            <p><input type="text" name="email" size="40" maxlength="60" placeholder="Email" /></p>
                            <p><input type="password" name="password" size="40" maxlength="60" placeholder="Password (Please DO NOT use a real one)" /></p>
                            </fieldset>
                            <p align="center"><input type="submit" value="Submit" class="button alt" /></p>
                        <?php
                        // minimal validation
                        if (isset($_POST['name'])) {
                                echo '<div class="success">
                                Thank you ' . $name . ', for signing up! Please proceed to creating your profile below!
                                </div><br />';
                            }  
                        ?>
                        </form><br />
					
                        <!-- output HTML table -->
                        <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            echo '<header><h3>Database Output</h3><header><br />
                                    <table class="default">
                                        <tr>
                                            <td>
                                                <strong>Username</strong>
                                            </td>
                                            <td>
                                                <strong>Email</strong>
                                            </td>
                                            <td>
                                                <strong>Password</strong>
                                            </td>
                                        </tr>';
                            $i = 0;
                            while ($i < $num) {
                                    $f1=mysql_result($result,$i,"name"); 
                                    $f2=mysql_result($result,$i,"email");
                                    $f3=mysql_result($result,$i,"password");
                            echo '<tr>
                                    <td>' 
                                        . $f1 .
                                    '</td>
                                    <td>'
                                        . $f2 .
                                    '</td>
                                    <td>'
                                        . $f3 .
                                    '</td>
                                    </tr>';
                                $i++; 
                            }
                            echo '</table>';
                        } 
                        ?> 
                        <!-- end table 1 -->
                        
                        <!-- form 2 -->
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            echo '<header>
                                    <h2>Complete Your Profile</h2>
                            </header>
                            <form action="two_db.php" method="POST">
                                <fieldset>
                                <p><input type="text" name="color" size="20" maxlength="40" placeholder="Favorite Color?" /></p>
                                <p><input type="text" name="food" size="40" maxlength="60" placeholder="Favorite Food?" /></p>
                                <p><input type="text" name="activity" size="40" maxlength="60" placeholder="Favorite Activity?" /></p>
                                <p><input type="text" name="number" size="20" maxlength="40" placeholder="Favorite Number?" /></p>
                                </fieldset>
                            <p align="center"><input type="submit" value="Submit" class="button alt" /></p>';
                        }
                        
                        // minimal validation
                        if (isset($_POST['color'])) {

                            echo '<div class="success">
                            Thank you for completing your profile! See recently created profiles below.
                            </div><br />';

                        }
                        
                        echo '</form><br />'; 
                    
                            
                        // output HTML table 2 -->
                         
                        if (isset($_POST['color'])) {
                            echo '<header><h3>Profile Output</h3><header><br />
                                    <table class="default">
                                        <tr>
                                            <td>
                                                <strong>Color</strong>
                                            </td>
                                            <td>
                                                <strong>Food</strong>
                                            </td>
                                            <td>
                                                <strong>Activity</strong>
                                            </td>
                                            <td>
                                                <strong>Number</strong>
                                            </td>
                                        </tr>';
                            $x = 0;
                            while ($x < $num2) {
                                    $f4=mysql_result($result2,$x,"food"); 
                                    $f5=mysql_result($result2,$x,"color");
                                    $f6=mysql_result($result2,$x,"activity");
                                    $f7=mysql_result($result2,$x,"number");
                            echo '<tr>
                                    <td>' 
                                        . $f4 .
                                    '</td>
                                    <td>'
                                        . $f5 .
                                    '</td>
                                    <td>'
                                        . $f6 .
                                    '</td>
                                    <td>'
                                        . $f7 .
                                    '</td>
                                    </tr>';
                                $x++; 
                            }
                            echo '</table>';
                        } 
                        ?> 
                        <!-- end table 2 -->
                        
                        </div>
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