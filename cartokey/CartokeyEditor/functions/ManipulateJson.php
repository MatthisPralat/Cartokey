<?php 

$path = $_GET['path'];
$action =$_GET['action'];
// if($_GET['json'])
// 	{
// 		echo $_GET['json'];
// 	};

if( $action === 'decode')
	{
		decode($path);
	};

if( $action === 'encode')
	{
		encode();
	};
if( $action === 'replace')
	{
		encode();
	};



function decode($path)
{
	$mysjon =  file_get_contents('../'.$path);
	echo $mysjon ;
}


 ?>