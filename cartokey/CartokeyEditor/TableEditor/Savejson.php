<?php 

$content =  $_POST['content'];
$mapname = $_POST['map'];
$URL = '../map/'.$mapname.'/data/data.json';
$myfile = fopen($URL, "w");
fwrite($myfile, $content);
fclose($myfile);
clearstatcache();


 ?>