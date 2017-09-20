<html>
<head>
    <title>Form Feedback</title>
</head>
<body>
<?php
# handle_form_printing.php
//Print the submitted information.
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $comments = $_REQUEST['comments'];
    
    //$name=$_REQUEST['age'];
    //$name=$_REQUEST['gender'];
    //$name=$_REQUEST['submit'];
    
    // Print information
    echo "<p>Thank you, <strong>$name</strong>, for the following comments:<br />
    <tt>$comments</tt></p>
    <p>We will reply to you at <em>$email</em>.</p>\n";
?>
</body>

</html>