<?php
$db = new mysqli('localhost', 'DB_USER', 'PASSWORD', 'DB_NAME');

if($db->connect_errno) {
    echo $db->connect_error;
    die('Sorry, we are having some problems.');
}
//echo 'Success';

?>