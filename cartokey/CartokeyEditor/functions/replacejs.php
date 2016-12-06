<?php 

$path = $_GET['path'];
$content = $_GET['content'];
$URL = '../'.$path;
$myfile = fopen($URL."/js/main.js", "w") or die("Unable to open file!");
fwrite($myfile, $content);



 ?>