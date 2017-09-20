<html>
    <head>
    <title>Handle with validation</title>
    <link rel="stylesheet" type="text/css" href="handle-with-validation.css" />
    </head>
<body>
<?php
    // using http://uh-cis.clarify-it.com/d/kxqdaw as example

    // first, create the address variable
    if (isset($_REQUEST['address'])) {
        $address = $_REQUEST['address'];
    } else {
        $address = NULL;
        echo '<p class="error">You forgot to choose an address.</p>';
    }
    
    //print submitted information
    if ($address) {
    echo "Thank you for choosing: <br />" . "<strong>$address</strong>" . "<br />" . " as your shipping address.<br /><br />" . "We will ship your items and send you tracking information as soon as possible!";
    } else { // missing form value
        echo "Please press the back button and try again.";
    }
    
?>
</body>
</html>