
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

var popupshadow= "<div class='popup-shadow'></div>";
//--------- HEADER 
var popupHS = "<div id='.header-Popup'>"+"<div id='popup-title'>" ;
var popupHE = "</div>"+"</div>";
//--------- FOOTER 
var PopupFS =  "<div id='popup-footer'>"+"<span id='popup-footer-description'>";
var popupFE = "</span>"+"<img id='popup-logo' src='http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg'>"+"</div>";
//--------- CONTENT 
var popupCS = "<div id='custompopup'>"+"<ul>";
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
"<div id='header-legend'>"
+" <div id='title-Legend'>Le taux de chômage en Europe</div>"
+"</div>";

//--------- CONTENT
legendC = " " ; 
Legendphp = ""+"&lt;div style=\"margin: 15px;\"&gt;\n&lt;h1 style=\"text-align: center;\"&gt;Le taux de ch&amp;ocirc;mage en Europe&lt;\/h1&gt;\n&lt;p style=\"text-align: center;\"&gt;&lt;em&gt;Avec 21,4 millions de personnes sans emploi, le taux de ch&amp;ocirc;mage dans l'Union europ&amp;eacute;enne atteint 8,8% en mars 2016. Il s'agit du taux le plus faible enregistr&amp;eacute; depuis avril 2009, selon les estimations de l'Office europ&amp;eacute;en de statistiques : Eurostat. La France, elle, affiche un taux de ch&amp;ocirc;mage de 10%, soit le 8e taux le plus &amp;eacute;lev&amp;eacute; de l'Union europ&amp;eacute;enne.&lt;\/em&gt;&lt;\/p&gt;\n&lt;\/div&gt;"+'&lt;div style=\' margin: 5px auto; text-align:center;\'&gt; &lt;i style=\'background:rgba(255,220,151,1) ;width:15px;height:15px;display:block; float:left; margin-left:15px;\'&gt;&lt;/i&gt;Inf&eacute;rieur &agrave; 5% &lt;/div&gt;'+'&lt;div style=\' margin: 5px auto; text-align:center;\'&gt; &lt;i style=\'background:rgba(238,139,19,1) ;width:15px;height:15px;display:block; float:left; margin-left:15px;\'&gt;&lt;/i&gt;Entre 5 et 10% &lt;/div&gt;'+'&lt;div style=\' margin: 5px auto; text-align:center;\'&gt; &lt;i style=\'background:rgba(255,33,0,1) ;width:15px;height:15px;display:block; float:left; margin-left:15px;\'&gt;&lt;/i&gt;Entre 10 et 15% &lt;/div&gt;'+'&lt;div style=\' margin: 5px auto; text-align:center;\'&gt; &lt;i style=\'background:rgba(119,0,13,1) ;width:15px;height:15px;display:block; float:left; margin-left:15px;\'&gt;&lt;/i&gt;Supp&eacute;rieur a 15% &lt;/div&gt;';

       var div = document.createElement("div");
    	 var text =  $("<div/>").html(Legendphp).text();

 LegendD = text ;



legendF =
"<div id='footer-legend'>"
+"<span id='legend-footer-description'>"+ "e" +"</span>"
"</div>";


var  Legend = "<div onclick='MselectorHide($(this))' id='MenuLegend'><span id='MlegendArrow'></span></div><div id='legend-Contnair'>" +legendH + LegendD + legendF + "</div>" ;

//------------------------------------------------EDIT----------------------------------------------------------------
// cette var stoque le point de départ dun marker déplacé
var DragS = "";
var MarkerEditListener= false;
var editable = false;
var layer1 = {
					"title" :
					{ 
						"dynamic":"['feature']['properties']['Tauxcolor']"
					},
					"name":"layer1",
					
					"Options":
					{
						"popupHeader":"true",
						"popupDescription":"none",
						"popupActivated":"yes"
					},
					 "onEach": { "popup": "yes",  "popupEl": [ {
							"title": "admin_fr",
							"el": " feature.properties.admin_fr"}]}, "style": { "selector": "Tauxcolor", "case": {"1":"ffce43","2":"d37900","3":"e80303","4":"660101","5":"ffffff","":"ffffff"}}} ;var SelC = '<a onClick="initLayer( [BaseCompil],[layer1])"> Taux de chômage</a><a onClick="initLayer( [BaseCompil],[layer1])"> Bouton1</a><a onClick="initLayer( [BaseCompil],[layer1])"> Bouton2</a><a onClick="initLayer( [BaseCompil],[layer1])"> Bouton3</a><a onClick="initLayer( [BaseCompil],[layer1])"> Bouton4</a>'; 
//------------------------------------------------SELECTOR----------------------------------------------------------------
	var SelS = "<ul id='Mselector' ><li onclick='MselectorHide($(this))' id='Menuselector'><i class='material-icons'>view_list</i><span id='MselectorArrow'></span></li><div class='MselectorOverflow'>";
	var SelE = "</div></ul>";
	var Selector = SelS + SelC + SelE ;
	var activeLayer = [];
	

//------------------------------------ FUNCTION INITLAYER GEO ------------------------------------------------
	function initLayerGeo()
	{


		initLayer([BaseCompil],[layer1]);
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
$("#map").prepend(Legend);	

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
								var nvar =  BaseData[i2] ;

			    //BaseCompil["features"][i2] = {"type": "Feature"};
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


function style(feature, layer)
{

	var Ncase = Object.keys(Param["style"]["case"]);
	var ColSel = Param["style"]["selector"];


	if(feature.geometry.type == "MultiPolygon" || feature.geometry.type == "Polygon" )
	{
		if ( ColSel == "none" || ColSel == "" )
		{

			return { fillOpacity: 0 ,opacity: 1,  weight: 0.1, color: "#000000"}
		} 

		for (var i = 0 ; i < Object.keys(Param["style"]["case"]).length; i++)
		{

			if(feature["properties"][ColSel] == Ncase[i] ) 
			{

				return {weight:0.1, fillOpacity: 0.6, color: "#" + Param["style"]["case"][Ncase[i]]};

			}
			else if(  (i+1) == Ncase.length  )
			{

				return {color: Param["style"]["case"]["else"] };
			}
		}
	}

}

function popupTitleReturn(layer)
{

	if (typeof Param["title"] != "undefined")
	{

		if( typeof Param["title"]["dynamic"] != "undefined")
		{			
			var stringEL = "layer" + Param["title"]["dynamic"] ;	
			if( eval(stringEL) == "undefined")
			{
				return "a";
			}
			else
			{
				return (eval(stringEL));
			}
		}	
		if(typeof Param["title"]["static"] != "undefined")
		{
			return Param["title"]["static"];
		} 	
		else 
		{
			return "a";

		}	
	}
	else 
	{
		return "a";

	}
}

function popupListReturn(layer)
{
	if (typeof Param != "undefined")
	{
		var ArrLen = Object.keys( Param["onEach"]["popupEl"]);
		var Rinfo = "";




		for (var i = 0; i < ArrLen.length ; i++) 
		{

			var stringTITRE = Param["onEach"]["popupEl"][i]["title"];
			var stringEL = "layer."+Param["onEach"]["popupEl"][i]["el"];
			Rinfo = Rinfo
			+ "<li>"
			+"<span class='popup-txt-text'>"
			+ eval(stringEL) 
			+ "</span>"
			+"</li>"

			;

			if (i+1 == ArrLen.length ){
				return Rinfo;
			};
		}

	}
}

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
				// popupTitleReturn(layer)+
	popupHE +
	popupCS +
	popupListReturn(layer) +
	popupCE	+
	editButton +
	popupshadow 

	);
}

function markerDragend(e)
{
	var DragE = e["target"]["_latlng"];
	for (var i = 0; i < EditMark["features"].length; i++) {
		if( EditMark["features"][i]["geometry"]["coordinates"][0] == DragS.lng && EditMark["features"][i]["geometry"]["coordinates"][1] == DragS.lat)
		{
			EditMark["features"][i]["geometry"]["coordinates"][0] = DragE.lng;
			EditMark["features"][i]["geometry"]["coordinates"][1] = DragE.lat;
		}
	};

}

function markerDragstart(e)
{
	DragS = e["target"]["_latlng"];
}
function markerclick(e)
{

}

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

	initLayer([EditMark],[layer1]);

}

function whenClicked(e) 
{
	if(isInIFrame==true){
		window.parent.Editdata(e); 
	}

};


function listener()
{

	map.on("click", function(event) {

		if (MarkerEditListener == true )
		{
			Addmarker(event);
		}

	});


}

function MselectorHide(e)
{
  if( $(e).attr("class") == "Menuhide")
{
  $(e).attr("class", "");
}
else
{
  $(e).attr("class", "Menuhide");
}

}

function getzoom()
{
var Gzoom = map.getZoom();
console.log(Gzoom);
parent.getzoom(Gzoom);
}

function getposition()
{
var Gpos = map.getCenter();
console.log(Gpos);
parent.getpos(Gpos);
}



$(document).ready(function() {

	$.ajaxSetup({ cache: false });


	window.parent.$("#GetZoom").click(function(event)
{
	getzoom();
});
window.parent.$("#GetPos").click(function(event)
{
	getposition();
});


	function loadjson(){

	//  MAIN LOAD
	//------------------------------------------------BASE GEO----------------------------------------------------------------
		$.getJSON("../../../cartokeyPublic/base-geo/carte_du_monde_low.geo.json",  function(json)
		{
			BaseGeo = json;
		})
.done(function()
{

		//------------------------------------------------BASE DATA----------------------------------------------------------------
	$.getJSON("data/data.json?Edit",  function(json)
	{
		BaseData = json ;

	})
.done(function()
{

	MapInit();
	listener();
})
.fail(function()
{

})
})
.fail(function() {

})

}
loadjson();

$("#add-pin", top.document).click(function(event) {
	// MarkerEditListener = true;
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
	editButton="<button class='btn-edit-from-popup' onclick='window.parent.EditOnMapData()' >Edit</button>"
}

});
