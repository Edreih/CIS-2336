<!DOCTYPE>
<html>
<head>
    <title>Images</title>
    <script type="text/javascript" charset="utf-8" src="js/function.js"></script>
</head>

<body>
    <p>Click on an image to view it in a seperate window.</p>
    <ul>
    <?php
        //This script lists the images in the uploads directory
        //This version now shows each image's file size and uploaded date and time.
        
        //set default timezone
        date_default_timezone_set ('America/New_York');
        $dir = '../uploads'; //define the directory to view
        $files = scandir($dir); //read all the images into an array.
        
        //display each image caption as a link to the JS function:
        foreach($files as $image) {
            if(substr($image, 0, 1) != '.') { //Ignore anything starting with a period.
            
            //get the image size in pixels:
            $image_size = getimagesize ("$dir/$image");
            //calculate the image's size in kb
            $file_size = round ( (filesize ("$dir/$image")) / 1024) . "kb";
            //Determine the images upload date and time
            $image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));
            //make the image's name URL safe:
            $image_name = urlencode($image);
            //print the information:
            echo "<li><a href=\"javascript:create_window('$image_name', $image_size[0], $image_size[1])\">$image</a> $file_size ($image_date)</li>\n";
            } // end of the IF
        } // end of the foreach loop.
        ?>
    </ul>
</body>
</html>