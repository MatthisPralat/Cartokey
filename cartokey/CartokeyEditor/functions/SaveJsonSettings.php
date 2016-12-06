<?php 


$content =  $_POST['content'];
$mapname = $_POST['map'];
$URL = '../map/'.$mapname.'/settings.json';
$myfile = fopen($URL, "w");
fwrite($myfile, $content);
echo "<pre>";
echo $content;
echo "</br>";
echo $URL;
echo "</br>";
echo $mapname;


 ?>