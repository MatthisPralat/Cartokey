<?php 

$FolderName = $_GET['mapname'];
//$_GET['mapname'];


$URL = '../map/'.$FolderName;
mkdir($URL);
mkdir($URL.'/css');
mkdir($URL.'/js');
mkdir($URL.'/data');

$myfile = fopen($URL."/index.html", "w") or die("Unable to open file!");
$html = file_get_contents('BaseModel/index.html');
fwrite($myfile, $html);

$myfile = fopen($URL."/settings.json", "w") or die("Unable to open file!");
$json = file_get_contents('BaseModel/settings.json');
fwrite($myfile, $json);

$myfile = fopen($URL."/js/main.js", "w") or die("Unable to open file!");
$js = file_get_contents('BaseModel/main.js');
fwrite($myfile, $js);

$myfile = fopen($URL."/css/style.css", "w") or die("Unable to open file!");
$css = file_get_contents('BaseModel/style.css');
fwrite($myfile, $css);

$myfile = fopen($URL."/data/data.json", "w") or die("Unable to open file!");
$data = file_get_contents('BaseModel/data.json');
fwrite($myfile, $data);




?>