<?php
$db = new mysqli('localhost', 'ealdana1_edreih', 'speedy13', 'ealdana1_app');

if($db->connect_errno) {
    echo $db->connect_error;
    die('Sorry, we are having some problems.');
}
//echo 'Success';

?>