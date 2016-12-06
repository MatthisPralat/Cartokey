<?php 

//$tochange =  array('aaa_name_fr' =>'Matthis est le meilleur', 'aaa_pays_fr_pays' =>'Suède'  ,'admin' =>'Sweden'  ,'cartodb_id' =>'35'  ,'Harry_Potter' => ''  ,'fips' =>'SW'  ,'formal_en' =>'Kingdom of Sweden'  ,'iso2' =>'SE'  ,'iso3' =>'SWE'  ,'name' =>'Sweden'   );
$path = $_POST['path'];
//$path = 'map/Launchbtn/data/test.geo.json';
$tochange= $_POST['json'];
//json_encode($newJson);
$mysjon = json_decode( file_get_contents('../'.$path));
$id = $tochange['cartodb_id'];
// $mysjon -> 
// print_r($mysjon );
echo('<pre>');
// echo $mysjon['features']['properties'];
// print_r($mysjon->features[1]->properties) ;

$result = count($mysjon->features);
echo $result;


for ($i=0; $i <$result ; $i++) { 
	// echo "coucou";
	echo "<br>";
	$test =
	print_r($mysjon->features[$i]->properties->cartodb_id);
	if ($id === $mysjon->features[$i]->properties->cartodb_id ) {

		echo "c'est lui";
		$mysjon->features[$i]->properties = $tochange ;
	}
else
{
	echo "c'est paslui";
}

}
// var_dump($mysjon);


// for ($i=0; $i < ; $i++) { 
// 	# code...
// }
//print_r($mysjon ) ;
echo('</pre>');

 ?>