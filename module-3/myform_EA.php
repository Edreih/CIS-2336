<?php

define('DB_NAME', 'ealdana1_CIS2336');
define('DB_USER', 'ealdana1_edreih');
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
$gender = $_POST['gender'];
$age = $_POST['age'];
$comments = $_POST['comments'];

$sql = "INSERT INTO data_form1 (name, email, gender, age, comments) VALUES ('$name', '$email', '$gender', '$age', '$comments')";

// check for query errors
if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}

// gather database/table output
$query="SELECT * FROM data_form1 ORDER BY id"; // table = data_form1
$result=mysql_query($query);
$num=mysql_numrows($result);


mysql_close();

// Leave the PHP section and create the HTML page:
?>

<html>
	<head>
		<title>My Form with Database</title>
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
                    <p class="left"><a href="/module-3/" class="button alt">&larr; Go Back to Module 3 Home</a></p><br />
						<section>
							<header>
								<h2>My Form (with Database support)</h2>
							</header>
						</section>
                        <form action="myform_EA.php" method="POST">
                            <fieldset>

                            <p><label>Name:</label> <input type="text" name="name" size="20" maxlength="40" /></p>

                            <p><label>Email Address:</label> <input type="text" name="email" size="40" maxlength="60" /></p>

                            <p><label for="gender">Gender: </label>
                                <input type="radio" name="gender" value="M" />Male
                                <input type="radio" name="gender" value="F" />Female
                                <input type="radio" name="gender" value="Other" />Other
                            </p>

                            <p><label>Age: </label> 
                            <select name="age">
                                <option value="0-29">Under 30</option>
                                <option value="30-60">Between 30 and 60</option>
                                <option value="60+">Over 60</option>
                            </select></p>

                            <p><label>Comments: </label> <textarea name="comments" rows="3" cols="40"></textarea></p>
                            </fieldset>
        
                            <p align="center"><input type="submit" value="Submit" class="button alt" /></p>
                        <?php
                        // Check for form submission, validate fields & post success/fail message
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_POST['name'], $_POST['email']) /*&&
                             is_numeric($_POST['age'])*/ ) {

                                echo '<div class="success">
                                Thank you ' . $name . ', for your submission! I will get back to you as soon as possible.
                                </div><br />';

                            } else { // Invalid submitted values.
                                echo '<div class="alert">
                                Error! Please enter correct information.
                                </div><br />';
                            }

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
                                                <strong>Name</strong>
                                            </td>
                                            <td>
                                                <strong>Email</strong>
                                            </td>
                                            <td>
                                                <strong>Gender</strong>
                                            </td>
                                            <td>
                                                <strong>Age</strong>
                                            </td>
                                            <td>
                                                <strong>Comments</strong>
                                            </td>
                                        </tr>';
                            $i = 0;
                            while ($i < $num) {
                                    $f1=mysql_result($result,$i,"name"); 
                                    $f2=mysql_result($result,$i,"email");
                                    $f3=mysql_result($result,$i,"gender");
                                    $f4=mysql_result($result,$i,"age");
                                    $f5=mysql_result($result,$i,"comments");
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
                                    <td>'
                                        . $f4 .
                                    '</td>
                                    <td>'
                                        . $f5 .
                                    '</td>
                                </tr>';
                                $i++; 
                            }
                        } 
                        echo '</table>' ?> 
                        <!-- end table 1 -->
                        
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