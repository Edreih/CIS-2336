<?php
error_reporting(0);
require 'db/connect.php';
require 'functions/security.php';

$records = array();

if(!empty($_POST)) {
    if(isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['bio'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $gender = trim($_POST['gender']);
        $bio = trim($_POST['bio']);
        
        if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($gender) && !empty($bio)){
            $insert = $db->prepare("INSERT INTO people (first_name, last_name, email, gender, bio, created) VALUES (?, ?, ?, ?, ?, NOW())");
            $insert->bind_param('sssis', $first_name, $last_name, $email, $gender, $bio);
            
            if($insert->execute()) {
                header('Location: index.php');
                die();
            }
        }
    }
}

if($results = $db->query("SELECT * FROM people")) {
    if($results->num_rows) {
        while($row = $results->fetch_object()) {
            $records[] = $row;
        }
        $results->free();
    }
}

?>

<html>
    <head>
        <title>People</title>
    </head>
    <body>
        <h3>People</h3>
        <?php
        if(!count($records)) {
            echo 'No records';
        } else {
        ?>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Bio</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($records as $r) {
                ?>
                <tr>
                    <td><?php echo escape($r->first_name); ?></td>
                    <td><?php echo escape($r->last_name); ?></td>
                    <td><?php echo escape($r->email); ?></td>
                    <td><?php echo escape($r->gender); ?></td>
                    <td><?php echo escape($r->bio); ?></td>
                    <td><?php echo escape($r->created); ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>
        
        <hr>
        
        <form action="" method="post">
            <div class="field">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" autocomplete="off">
            </div>
            
            <div class="field">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" autocomplete="off">
            </div>
            
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off">
            </div>
            
            <div class="field">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value=""></option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
            </div>
            
            <div class="field">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio"></textarea>
            </div>
            
            <input type="submit" value="Insert">
        
        </form>
        
    </body>
</html>