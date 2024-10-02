<?php

require  "connection.php";
$loginDetails = json_decode(file_get_contents("php://input"));
$mobile = $loginDetails->mobile;
$password = $loginDetails->password;

if (empty($mobile)) {
    echo "please enter your mobile number.";
}elseif (strlen($mobile) != 10) {
    echo "Please enter 10 digit mobile number";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
    echo "Invalid mobile number";
}elseif (empty($password)) {
    echo "Please enter your Password";
}else{
    $r = Database::search("SELECT * FROM `users` WHERE `mobile`='" . $mobile . "' AND `password`='" . $password . "'");
    if ($r->num_rows > 0) {
        echo "1";
    } else {
        echo "Please check your username and password";
    }
}
