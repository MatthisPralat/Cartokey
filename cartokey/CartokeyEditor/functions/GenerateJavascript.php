<?php 

// Okay cette partie va generer mon html en fonction de mon fichier settings. 



$mapname = $_POST['mapname'];
$URL = '../map/'.$mapname.'/settings.json';
$myfile = fopen($URL,'r');
$myfile = fread($myfile,filesize($URL));
$myfile = json_decode($myfile);
// $myfile2 = fread($myfile,filesize("settings.json"));
$myjs="";
//CHAPITRE 1 ----------> JS

//  I-------------------- LES VARIABLES  --------------------------------------------------------------->";
$myjs=$myjs. "var Myjson =[];
var map;
var jsonLocation = 'data/test.geo.json';
var geojson;
var legend = L.control({position: 'bottomright'});
";

// CETTE FONCTION PERMET D'ETABLIR LA BASE DE LA GEO SELON UNE CATEGORIE

$myjs=$myjs. "  function style(feature) {
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
$myjs=$myjs. "        function resetHighlight(e) {
	geojson.resetStyle(e.target);
}
";
// CETTE FONCTION POUR LE HOVER
$myjs=$myjs. 
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
$myjs=$myjs. " function getColor(d) { 
	switch(d) 
	{" ;
 // ici je génére la séléction  
    $obj = $myfile->{'OptionsCat'};
	$len = count((array)$obj);
	$i = 0;
foreach ($obj as $key => $value) {



	if ($i == $len - 1){
		$myjs=$myjs. "default:";
		$myjs=$myjs. "return'#".$value."';";
	}

	else
	{
       $myjs=$myjs. "case'".$key."':";
		$myjs=$myjs. "return' #".$value."';";
		$myjs=$myjs. "break;";
    }

$i++;
}
$myjs=$myjs. "}";
$myjs=$myjs. "}";


//CETTE FONCTION PERMET DE FAIRE UNE ACTION AU CLICK DE LA GEO
$myjs=$myjs. "
function whenClicked(e) 
{
	var isInIFrame = (window.location != window.parent.location);
	if(isInIFrame==true){
  window.parent.Editdata(e); 
  }
};";

//CETTE FONCTION PERMET D'ACTIVER UNE FEATURE A CHAQUES GEOS
$myjs=$myjs. "
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
            	$myjs=$myjs. "'".$key." :   ' + "." feature.properties.".$key."
	;";
          }

          else
          {
          		$myjs=$myjs. "'</br>".$key." :   ' + "." feature.properties.".$key."
	+ ";
          }
 $i++;

}
    

    $myjs=$myjs. "
     var customoptions=  {'width': '800','className' : 'coucou'};
    	layer.bindPopup(custompopup, customoptions);}
";

// ICI C'EST LA FONCTION DE LA LEGENDE
$myjs=$myjs. "
legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
    grades = [";

    $obj = $myfile->{'OptionsCat'};
    $i = 0;
	$len = count((array)$obj);
foreach ($obj as $key => $value) {

	      if ($i == $len - 1) {
            	$myjs=$myjs. "'".$key."'";
          }

          else
          {
          		$myjs=$myjs. "'".$key."',";
          }
 $i++;

}





$myjs=$myjs." ],   

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

$myjs=$myjs. "$(document).ready(function() {

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
    L.tileLayer('".$myfile->layerlink."').addTo(map);
    // hop ici on initialise le geojson
Edit(map);
}

";
$myjs=$myjs."function Edit(map){

var isInIFrame = (window.location != window.parent.location); 
if(isInIFrame==true){
 
};
};


legend.addTo(map);






});";

$URL2 = '../map/'.$mapname.'/js/main.js';
$mynewJS = fopen($URL2,'w');
fwrite($mynewJS, $myjs);
?>