<html>
<head>
    <title>Form Feedback</title>
</head>
<body>
<?php
# handle_form_printing.php
//Print the submitted information.
    if ( !empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email']) ) {
        echo "<p>Thank you, <strong>{$_POST['name']}</strong>, for the following comments:<br />
        <tt>{$_POST['comments']}</tt></p>
        <p>We will reply to you at <em>{$_POST['email']}</em>.</p>\n";
    } else { //Missing form value.
        echo '<p>Please go back and fill out the form again.</p>';
    }
    
?>
</body>

</html>