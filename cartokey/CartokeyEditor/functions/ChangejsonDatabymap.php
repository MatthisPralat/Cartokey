<?php 

$path = $_POST['path'];
$tochange = $_POST['json'];
$mysjon = json_decode( file_get_contents('../'.$path));
$id = $tochange['admin_fr'];





	for ($i = 0 ; $i < count($mysjon) ; $i++) { 

	    if ( $mysjon[$i] -> admin_fr == $id)
	    {
	    	$mysjon[$i] = $tochange;
	    }

	}


print_r( $mysjon );



// var_dump($mysjon)

// for ($i=0; $i < $result ; $i++) { 

// 	if ($id === $mysjon->features[$i]->properties->admin_fr ) {
// 		$mysjon->features[$i]->properties = $tochange ;
// 	}

// }

$newjson = json_encode($mysjon);
$URL = '../'.$path ;

$myfile = fopen($URL, "w");

fwrite($myfile, $newjson);
fclose($myfile);
clearstatcache();


 ?>