<?php
$email = $_POST["email"];
$category = $_POST["category"];
$title = $_POST["title"];
$text = $_POST["text"];

$file = "announcements/$category/$title.txt";
file_put_contents($file, $text);

header("Location: index.php");
exit();
?>