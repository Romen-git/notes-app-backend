<?php

require  "connection.php";
$noteDetails = json_decode(file_get_contents("php://input"));
$title = $noteDetails->title;
$description = $noteDetails->description;
$category = $noteDetails->category;

if (empty($title)) {
    echo "please enter a title";
} elseif (empty($description)) {
    echo "Please enter a description";
} elseif (empty($category)) {
    echo "Please select category";
}else{
    Database::iud("INSERT INTO `notes`(`title`,`description`,`category`)VALUES('" . $title . "','" . $description . "','" . $category . "')");
    echo "1";
}
