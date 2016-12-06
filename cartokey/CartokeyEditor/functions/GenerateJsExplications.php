<?php

$set = file_get_contents("settings.json");
$json =  json_decode($set, true) ;

echo "<meta charset='UTF-8'>";
echo '<style> textarea{ width:100%; height:200px;} </style>';


//------------------------------------------------------------------------------------------------------------------------------------------------






//                                VARIABLES






//------------------------------------------------------------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------------------------------------------------------------------------


//                                Variables GENERAL


//------------------------------------------------------------------------------------------------------------------------------------------------
// Cette variable contient les variables de qui ne sont pas pilotés par 
// settings.json 
$varNoChange = 
'
var isInIFrame = (window.location != window.parent.location);
var editButton ="";
var ready = false;
var map; // variable générique pour creer la map
var layer;
var BaseGeoLoc = "data/test.geo.json"; 
var BaseData = []; 
var BaseGeo  = []; 
var BaseCompil  = {"type": "FeatureCollection","features":[]}; 
var Param;

//------------------------------------------------LAYERS----------------------------------------------------------------
var Myjson =[];
var MyMarker = [];
var EditMark ={
	"type": "FeatureCollection",
	"features": []
};
//------------------------------------------------LAYERS EDIT MARKER----------------------------------------------------------------
var BaseMarkerGeojson={
	"type": "FeatureCollection",
	"features": [],
};

//------------------------------------------------POPUP----------------------------------------------------------------

var popupshadow= "<div class='."'".'popup-shadow'."'".'></div>";
//--------- HEADER 
var popupHS = "<div id='."'".'.header-Popup'."'".'>"+"<div id='."'".'popup-title'."'".'>" ;
var popupHE = "</div>"+"</div>";
//--------- FOOTER 
var PopupFS =  "<div id='."'".'popup-footer'."'".'>"+"<span id='."'".'popup-footer-description'."'".'>";
var popupFE = "</span>"+"<img id='."'".'popup-logo'."'".' src='."'".'http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg'."'".'>"+"</div>";
//--------- CONTENT 
var popupCS = "<div id='."'".'custompopup'."'".'>"+"<ul>";
var popupCE = "</ul></div >";
//--------- Options
var popupOp = {"width": "800","className" : "coucou"};
//
var popup =  popupHS + popupHE + popupCS + popupCE + PopupFS + popupFE + popupshadow  ;

//------------------------------------------------LEGEND----------------------------------------------------------------


//                                     S = START         E = END


//--------- VAR LEGEND 
grades = [];   
gradesColors =[];
labels = [];
//--------- HEADER 
legendH = 
"<div id='."'".'header-legend'."'".'>"
+" <div id='."'".'title-Legend'."'".'> Les pays par couleurs dans une ambiance sobre et expérimentale </div>"
+"</div>";

//--------- CONTENT
for (var i = 0 ; i < grades.length; i++) {
		// 
	labels.push(
		"<li> <i style='."'".' background-color:"+gradesColors[i]+";'."'".'></i>" 
		+ "<span class='."'".' label-legend '."'".'>" + grades[i] + "</span>" + "</li>")
};
legendC = "";
LegendD = "description";

//--------- FOOTER
legendF =
"<div id='."'".'footer-legend'."'".'>"
+"<span id='."'".'legend-footer-description'."'".'>"+ "une déscription plus ou moins aléatoire pour dire quelque chose de spécifique mais désactivable" +"</span>"
+"<img id='."'".'legend-logo'."'".' src='."'".'http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg'."'".'>"+
"</div>";


var  Legend = "<div id='."'".'legend-Contnair'."'".'>" +legendH + labels + LegendD + legendF + "</div>" ;
';



//------------------------------------------------LAYER----------------------------------------------------------------
// ici je fais une super boucle pour générer plusieures variables d'objet pour le projet.



//----------------------------------------------------------------------------------------------------------------


function MakeLayer($myobj)
{
	global $VarLayers;
	foreach ($myobj as $key => $value)
	{	
		// tant que je ne trouve pas je fais boucler le tableau
		if ( is_array($value) || is_object($value)) 
		{
			findobj($value);
		}
		//j'ai trouvé !
		if ( $key == "Layers")
		{
			if ( is_array($value) || is_object($value)) 
			{	
				foreach ($value as $key2 => $value2)
				{
					$VarLayers .= 'var ' . $key2 . ' = ';
					$VarLayers .=  "{";
					$VarLayers .=  
					'
					"title" :
					{ 
						"dynamic":"['."'".'feature'."'".']['."'".'properties'."'".']['."'".$value2['GeoSelCat']."'".']"
					},
					"name":"'.$value2['Name'].'",
					';
					$VarLayers .=  
					'
					"Options":
					{
						"popupHeader":"true",
						"popupDescription":"none",
						"popupActivated":"yes"
					},
					';
					
					$VarLayers .=  ' "onEach": {';
					$VarLayers .=  ' "popup": "yes", ';
					// popup el -------------------		
					$VarLayers .=  ' "popupEl": [ ';
					$i = 0;
					$numItems = 0;

					foreach ($value2['popup'] as $key => $test) {
						if ( $test == true)
						{
							$numItems++;
						}
					}

					foreach ($value2['popup'] as $key => $value) {
						$i++;
						if ($value == true) 
						{	
							$VarLayers .=  "{";
							$VarLayers .=  '
							"title": "'.$key.'",
							"el": " feature.properties.'.$key.'"';
							$VarLayers .=  "}";

						if ($i != $numItems)
						{

							$VarLayers.= ',';
						}
						
						}
						
					}
					$VarLayers .=  ']';
					$VarLayers .=  '},';

					$VarLayers .=  ' "style": {';
					// Style -------------------		
					$VarLayers .=  ' "selector": "'.$value2['GeoSelCat'].'",';
					$VarLayers .=  ' "case": {';
					$i = 0;
					$numItems = count($value2['OptionsCat']);
					foreach ($value2['OptionsCat'] as $key => $value)
					{
						$i++;
						$VarLayers .=  '"'.$key.'":'.'"'.$value.'"';
						if ($i < $numItems) 
						{	
						$VarLayers .= ',';	
						}
					}
					$VarLayers .=  '}';
					$VarLayers .=  '}';
					$VarLayers .=  '} ;';


				}
			}

		}

	}
}

MakeLayer($json);

//------------------------------------------------SELECTOR----------------------------------------------------------------

$VarSelector ='var SelS = "<ul id='."'".'Mselector'."'".' >";';
$VarSelC = 'var SelC = '."'".'';
$initSelBoll = false; 

function findobj($myobj)
{
	global $initSel;
	global $initSelBoll;
	global $VarSelC;

	foreach ($myobj as $key => $value)
	{	
		// tant que je ne trouve pas je fais boucler le tableau
		if ( is_array($value) || is_object($value)) 
		{
			findobj($value);
		}
		//j'ai trouvé !
		if ( $key == "Selecteur")
		{
			if ( is_array($value) || is_object($value)) 
			{	
				foreach ($value as $key2 => $value2)
				{
					global $prop;
					$prop = "";						
					$Start = '<a onClick="initLayer(';

						$i = 0;
						$numItems = count($value2['Sel']);

						foreach ( $value2['Sel'] as $key3 => $value3) {
							$i++;

							if($i == $numItems)
							{
								$prop .= $value3 .']';
							}
							else if($i == 1)
							{
								$prop .= '['.$value3. ',' ;
							}
							else{
								$prop .=  $value3 . ',';
							}

						}
						if ($initSelBoll == false)
						{
							$initSelBoll = true;
							$initSel = $prop.',[]';

						}
						$VarSelC .= '<a onClick="initLayer('.$prop.',[]);)"> '. $value2["Name"].'</a>';

}
}

}

}
}

findobj($json);


$varSel = ' 
//------------------------------------------------SELECTOR----------------------------------------------------------------
var SelS = "<ul id='."'".'Mselector'."'".'>"; 
var SelE = "</ul>";
var Selector = SelS + SelC + SelE ;
var activeLayer = [];
';
$VarSelC .= "';" ;






//------------------------------------------------------------------------------------------------------------------------------------------------






//                                Fonctions






//------------------------------------------------------------------------------------------------------------------------------------------------

$initF = '

//------------------------------------ FUNCTION INITLAYER GEO ------------------------------------------------
function initLayerGeo()
{
	initLayer('.$initSel.');
}
//------------FUNCTION INIT
function initLayer(sel, par)
{
	Removelayer();
	for (var i = 0; i < sel.length; i++)
	{
		AddLayer(sel[i],par[i]);
	}
}

//------------------------------------ MAP INIT ------------------------------------------------------------

function MapInit(){

	map = L.map("map", 
	{
	//Map State 
	center: [51.505, -0.09],
	zoom: 4,
	//interactions
	scrollWheelZoom: true,
	doubleClickZoom: true,
	dragging: true,
	//Control options
	zoomControl: true,
	attributionControl: true,
});

	L.tileLayer("http://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png").addTo(map);
	mergeGeo();
	$("body").prepend(Legend);	

}


//----------------------------------------------------------------------------------------------------------------

//                         FUSSIONER LES DATAS AVEC LE GEOJSON MODELE

//----------------------------------------------------------------------------------------------------------------

function mergeGeo()
{


	for (var i = 0; i < BaseGeo.features.length; i++) 
	{
		for (var i2 = 0; i2 < BaseData.length; i2++) 
		{

			if( BaseGeo.features[i].properties.admin_fr == BaseData[i2].admin_fr )
			{
				var nvar = $.extend(BaseGeo.features[i].properties , BaseData[i2] );

				// BaseCompil["features"][i2] = {"type": "Feature"};
				BaseCompil["features"][i2] = {"properties": nvar};
				BaseCompil["features"][i2]["geometry"] = BaseGeo["features"][i]["geometry"] ;
				BaseCompil["features"][i2]["geometry"]["type"] = BaseGeo["features"][i]["geometry"]["type"];
				BaseCompil["features"][i2]["type"] = BaseGeo["features"][i]["type"]; 


			}

		}
	}
			//ici les layer de geojson
			initLayerGeo();
		}


';

$FunctionAddLayer =
'
function AddLayer(TheLayers, Parametres)
{ 
	Param = "";
	Param = Parametres;
	TheLayer = L.geoJson( TheLayers ,{
		style: style,
		onEachFeature: onEachFeature,
	});
	(TheLayer).addTo(map);
	activeLayer.push(TheLayer);
}
';

$FunctionRemovelayer =
'
function Removelayer()
{

	$.each(activeLayer, function(i, val) 
	{
		map.removeLayer(val);
		activeLayer.indexOf(val);
		if ( activeLayer.length >= i  ) 
		{
			activeLayer=[];
		}
	});

}

';
$FunctionStyle =
'
	function style(feature, layer)
	{
		var Ncase = Object.keys(Param["style"]["case"]);
		if(feature.geometry.type == "MultiPolygon" || feature.geometry.type == "Polygon" )
		{
			for (var i = 0 ; i < Object.keys(Param["style"]["case"]).length; i++)
			{
				if(feature.properties.fips == Ncase[i] ) 
				{
					return {color: Param["style"]["case"][Ncase[i]] };
				}
				if(  (i+1) == Ncase.length  )
				{
					return {color: Param["style"]["case"]["else"] };
				}
			}
		}

	}
';

$FunctionpopupTitleReturn =
'
function popupTitleReturn(layer)
	{
		
		if (typeof Param["title"] != "undefined")
		{

			if( typeof Param["title"]["dynamic"] != "undefined")
			{			
				var stringEL = "layer" + Param["title"]["dynamic"] ;
				return eval(stringEL);
			}	
			if(typeof Param["title"]["static"] != "undefined")
			{
				return Param["title"]["static"];
			} 		
		}
	}
';

$FunctionOnEachFeature = 
'
function onEachFeature(feature, layer)
	{		
		layer.on({
			click: whenClicked,
		});
		
		var Ncase = Object.keys(layer.feature.properties);
		var arrPopup ;

			
			var list;

						//POUR LES POPUP
			if(layer.feature.geometry.type == "Point")
			{

				if( MarkerEditListener == true)
				{
					layer.options.draggable = true;
				}
				layer.on("dragend", markerDragend);
				layer.on("dragstart", markerDragstart);
				layer.on("click", markerclick)
			}

			//GENERAL
			layer.bindPopup( 
				popupHS + 
				popupTitleReturn(layer)+
				popupHE +
				popupCS +
				popupListReturn(layer) +
				popupCE	+
				editButton +
				popupshadow 

				);
';

$FunctionMarkerDragend =
 '
 var DragE = e["target"]["_latlng"];
		for (var i = 0; i < EditMark["features"].length; i++) {
			if( EditMark["features"][i]["geometry"]["coordinates"][0] == DragS.lng && EditMark["features"][i]["geometry"]["coordinates"][1] == DragS.lat)
			{
				EditMark["features"][i]["geometry"]["coordinates"][0] = DragE.lng;
				EditMark["features"][i]["geometry"]["coordinates"][1] = DragE.lat;
			}
		};

 ';

$FunctionMarkerDragstart =
 '
 	function markerDragstart(e)
	{
		DragS = e["target"]["_latlng"];
	}

 ';

//----------------------------------------------------------------------------------------------------------------
	
//                         PARTIE EDITION
	
//----------------------------------------------------------------------------------------------------------------

 $FunctionEdit=
 '
 function Edit(map){
		var isInIFrame = (window.location != window.parent.location); 
		if(isInIFrame==true)
		{
			//------------- Affiche dans chaques pop up un onglet editable.
			window.parent.Editdata(e); 
			window.parent.$("#add-pin").trigger("click")
			{

			}

		}
	};
 ';
  
  $FunctionAddmarker=
 '
 function Addmarker(e)
	{

		Nmark = {
			"type": "Feature",
			"geometry": {
				"type": "Point",
				"coordinates": []
			},
			"properties": {
				"popup":"coucou"
			}
		};
		Nmark["geometry"]["coordinates"] = [e.latlng.lng , e.latlng.lat ];
		
		EditMark["features"].push(Nmark);

		initLayer([EditMark],[LayerGeo2]);

	}
 ';
  
  $FunctionWhenClicked=
 '
 function whenClicked(e) 
	{
		console.log(e);
		console.log("-------");

	
		if(isInIFrame==true){
			window.parent.Editdata(e); 
		}
			
	};

 ';

  $Functionlistener=
 '
 	function listener()
	{

		map.on("click", function(event) {

			if (MarkerEditListener == true )
			{
				Addmarker(event);
			}

	});


	}

 ';


	//----------------------------------------------------------------------------------------------------------------
	
	//                                       DOC READY

	//----------------------------------------------------------------------------------------------------------------




  $FunctionDocReady=
 '

	$(document).ready(function() {

 	function loadjson(){

	//  MAIN LOAD
	//------------------------------------------------BASE GEO----------------------------------------------------------------
	$.getJSON("../../../cartokeyPublic/base-geo/carte_du_monde_low.geo.json",  function(json)
	{
		BaseGeo = json;
	})
	.done(function()
	{
		console.log("done")
		//------------------------------------------------BASE DATA----------------------------------------------------------------
		$.getJSON("data/data.json?Edit",  function(json)
		{
			BaseData = json ;
			
		})
		.done(function()
		{
			console.log("done")
			MapInit();
			listener();

		})
		.fail(function()
		{
			console.log("un fichier n\'as pas pus etre chargé merci de relancer la page");
		})
	})
	.fail(function() {
		console.log("un fichier n\'as pas pus etre chargé merci de relancer la page");
	})

}
loadjson();

$("#add-pin", top.document).click(function(event) {
	MarkerEditListener = true;
});

$(".stop").click(function(event) {
	MarkerEditListener = false;
});

$(".play").click(function(event) {
	MarkerEditListener = true;
});

$("#map").prepend(Selector);

// Au démarage il repere si il est une iframe et active le Edit btn

if (isInIFrame == true )
{
	editButton="<button class='."'".'btn-edit-from-popup'."'".' onclick='."'".'window.parent.EditOnMapData()'."'".' >Edit</button>"
}

});
 ';





echo
'<h2>settings</h2>' 
. '<p> Voilà le tableau json qui va être interprété pour générer un javascript du projet </p>' 
. ('<textarea>'  .  json_encode($json) . '</textarea>') ;

echo
'<h2>Var varNoChange </h2>' 
. '<p> la variable générée pour les variables qui ne changent pas </p>' 
. ('<textarea>'  .  $varNoChange  . '</textarea>') ;


echo
'<h2>Variables de layers</h2>' 
. '<p> là variable de selections </p>' 
. ('<textarea>'  .  $VarLayers . '</textarea>') ;

echo
'<h2>Selecteur</h2>' 
. '<p> là variable de selections </p>' 
. ('<textarea>'  .  $varSel .$VarSelC  . '</textarea>') ;

echo
'<h2>Initialisation Fonctions</h2>' 
. '<p> là variable de selections </p>' 
. ('<textarea>'  .  $initF   . '</textarea>') ;


echo '<h2>Total</h2>' 
. '<p> là variable de selections </p>' 
. ('<textarea>'  
	.	$varNoChange 
	.	$VarLayers 
	.	$varSel 
	.	$VarSelC 
	.	$initF 
    .	$FunctionAddLayer 
    .	$FunctionRemovelayer 
    .	$FunctionStyle 
    .	$FunctionpopupTitleReturn
    .	$FunctionOnEachFeature 
    .	$FunctionMarkerDragend 
    .	$FunctionMarkerDragstart
    .	$FunctionEdit
    .	$FunctionAddmarker
    .	$FunctionWhenClicked
    .	$Functionlistener
    .	$FunctionDocReady

	.'</textarea>') ;
;




?>