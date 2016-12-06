<?php 

// Okay cette partie va generer mon html en fonction de mon fichier settings. 



$mapname = 'Savesettings';
$URL = '../map/'.$mapname.'/settings.json';
$myfile = fopen($URL,'r');
$myfile = fread($myfile,filesize($URL));
$myfile = json_decode($myfile);
// $myfile2 = fread($myfile,filesize("settings.json"));
echo "<pre>";
print_r($myfile);
echo "</pre>";




//CHAPITRE 1 ----------> HTML
echo "<textarea style='width:100%;height:520px'><!DOCTYPE html>
<html lang='FR-fr'>
<head>
<meta charset='UTF-8'>
<title>".$myfile->TitreCarte."</title>
<meta name='description' content='".$myfile->Description."'/>
<meta name='keywords' content='".$myfile->motCles."'>
";

	// if (0 < 1) // je prepare juste une variable pour generer un email si l'option a été activé
	// {
	// 	echo "<meta name="" content="">";
	// };
echo "

<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css' />
<script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
<script src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
</head>
<body>
</body>
</html>
</textarea>";

//CHAPITRE 1 ----------> JS
echo " JAVASCRIPT --------------------------------------------------------------->";
echo "<br>";

echo "<br>";
echo "<textarea style='width:100%;height:520px'>";
//  I-------------------- LES VARIABLES  --------------------------------------------------------------->";
echo "var Myjson =[];
var map;
var jsonLocation = 'data/test.geo.json';
var geojson;
var legend = L.control({position: 'bottomright'});
";

// CETTE FONCTION PERMET D'ETABLIR LA BASE DE LA GEO SELON UNE CATEGORIE

echo "  function style(feature) {
	return {
		weight: 2,
		opacity: 1,
		color: 'white',
		dashArray: '3',
		fillOpacity: 0.7,
		fillColor: getColor(feature.properties.".$myfile->GeoSelCat.") 
	};
}
";

// CETTE FONCTION REMET LE STYLE DE BASE
echo "        function resetHighlight(e) {
	geojson.resetStyle(e.target);
}
";
// CETTE FONCTION POUR LE HOVER
echo 
"  function highlightFeature(e)
	{
		var layer = e.target;

		layer.setStyle
		({
			weight: 5,
			color: '#FFFFFF',
			dashArray: '',
			fillOpacity: 1
		});
		if (!L.Browser.ie && !L.Browser.opera) 
		{
		layer.bringToFront();
		}
	}
";

//CETTE FONCTION PEMET DE CHOPER LES CATEGORIES
echo " function getColor(d) { 
	switch(d) 
	{" ;
 // ici je génére la séléction  
    $obj = $myfile->{'OptionsCat'};
	$len = count((array)$obj);
	$i = 0;
foreach ($obj as $key => $value) {



	if ($i == $len - 1){
		echo "default:";
		echo "return'#".$value."';";
	}

	else
	{
       echo "case'".$key."':";
		echo "return' #".$value."';";
		echo "break;";
    }

$i++;
}
echo "}";
echo "}";


//CETTE FONCTION PERMET DE FAIRE UNE ACTION AU CLICK DE LA GEO
echo "
function whenClicked(e) 
{
	var isInIFrame = (window.location != window.parent.location);
	if(isInIFrame==true){
  window.parent.Editdata(e); 
  }
};";

//CETTE FONCTION PERMET D'ACTIVER UNE FEATURE A CHAQUES GEOS
echo "
function onEachFeature(feature, layer)
	{
    layer.on({
        click: whenClicked,
        mouseover: highlightFeature,
        mouseout: resetHighlight
    	});
    var custompopup =   ";
    // ICI JE FAIS LOOPER MES OPTIONS DU TABLEAU,LE DERNIER AURA la Virgule en moins
    $obj = $myfile->{'popup'};
    $i = 0;
	$len = count((array)$obj);
foreach ($obj as $key => $value) {

	      if ($i == $len - 1) {
            	echo "'".$key." :   ' + "." feature.properties.".$key."
	;";
          }

          else
          {
          		echo "'</br>".$key." :   ' + "." feature.properties.".$key."
	+ ";
          }
 $i++;

}
    

    echo "
     var customoptions=  {'width': '800','className' : 'coucou'};
    	layer.bindPopup(custompopup, customoptions);}
";

// ICI C'EST LA FONCTION DE LA LEGENDE
echo "
legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
    grades = [";

    $obj = $myfile->{'OptionsCat'};
    $i = 0;
	$len = count((array)$obj);
foreach ($obj as $key => $value) {

	      if ($i == $len - 1) {
            	echo "'".$key."'";
          }

          else
          {
          		echo "'".$key."',";
          }
 $i++;

}





echo" ],   

	labels = [],
    from, to;

    for (var i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];

        labels.push(

            '<i style=\" background:' + getColor(grades[i]) + '\"></i> ' +
            grades[i]) ;
    }

    Legendheader = '<h2>coucou</h2>';
    div.innerHTML = Legendheader+labels.join('<br>');
    return div;
};
";
// HOP LA ON MET LES AUTRES FONCTIONS 

echo "$(document).ready(function() {

//okay la base pour lancer la map avec tout ces parrametres
MapInit();
//ensuite je check si il y'a un fichier json avec un chemin definis
loadjson();


//voilà pour loader le geojson    
function loadjson(){

    jQuery.getJSON(jsonLocation, function(json){
        Myjson.push(json);})
    .done(function() {
        addjson();
    })
    .fail(function() {
        alert( \"error\" );
    })

// $.getJSON('../../data/custom.geo.json',function(json) {
// Myjson = json;
// var myLayer = L.geoJson(Myjson).addTo(map);
// myLayer.addData(Myjson);
};

function addjson()
{

   geojson = L.geoJson(Myjson, {
    style: style,
    onEachFeature: onEachFeature, 
}).addTo(map);
}


function MapInit(){

   map = L.map('map', 
   {
    //Map State 
    center: [51.505, -0.09],
    zoom: 1,
    //interactions
    scrollWheelZoom: false,
    doubleClickZoom:false,
    dragging: true,
    //Control options
    zoomControl: true,
    attributionControl: false,


});
    // ici on charge d'autres modeles de cartes. positron lite, google, personalisée ect.
    L.tileLayer('http://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png').addTo(map);
    // hop ici on initialise le geojson

}




legend.addTo(map);






});";






// $obj = $myfile->{'OptionsCat'};
// foreach ($obj as $key => $value) {
// 	echo $key;
// }


// P
?>