<html>
<head>
    <title>Checkout | Choose Address</title>
    <link rel="stylesheet" type="text/css" href="handle-with-validation.css" />
</head>
<body>
    
    <form action="handle-with-validation.php" method="post">
        <fieldset><legend><h1>Checkout</h1></legend>
    <p>Thank you for your order! Where shall we ship your items to?</p>
        <p><label for="address">Choose An Address:</label><br />
        <input type="radio" name="address" value="432 Pecan Lane Houston, TX 77027" />432 Pecan Lane Houston, TX 77027<br />
        <input type="radio" name="address" value="3021 Lakeshore Blvd Houston, TX 77002" />3021 Lakeshore Blvd Houston, TX 77002<br />
        <input type="radio" name="address" value="492 Tamarisk St Houston, TX 77032" />492 Tamarisk St Houston, TX 77032<br />
     </p>
     <p align="center"><input type="submit" value="Submit" /></p>
    
</body>
</html>