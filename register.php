<?php
require  "connection.php";
$signUpDetails = json_decode(file_get_contents("php://input"));
$mobile = $signUpDetails->mobile;
$fname = $signUpDetails->fname;
$lname = $signUpDetails->lname;
$password = $signUpDetails->password;
$type = $signUpDetails->type;

if (empty($mobile)) {
    echo "please enter your mobile number.";
} elseif (strlen($mobile) != 10) {
    echo "Please enter 10 digit mobile number";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
    echo "Invalid mobile number";
} elseif (empty($fname)) {
    echo "Pleasse enter your first name";
} elseif (empty($lname)) {
    echo "Please enter your last name";
} elseif (empty($password)) {
    echo "Please enter your Password";
} elseif (empty($type)) {
    echo "Please select user type";
} else {
    $r = Database::search("SELECT * FROM `users` WHERE `mobile`='" . $mobile . "'");
    if ($r->num_rows > 0) {
        echo "User with the same mobile number already exists";
    } else {
        Database::iud("INSERT INTO `users`(`fname`,`lname`,`mobile`,`password`,`user_type`)VALUES('" . $fname . "','" . $lname . "','" . $mobile . "','" . $password . "','" . $type . "')");
        echo "1";
    }
}

