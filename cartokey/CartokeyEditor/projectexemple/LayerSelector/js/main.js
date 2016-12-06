//----------------------------------------------------------------------------------------------------------------




//                                          PRESENTATION



//----------------------------------------------------------------------------------------------------------------


//Cet exemple de carte est un exemple de fonctionnalitée totale pour l'éditeur

//il contiens 1 carte de GEOJSON
    // Une option 1 de selection
    // une option 2 de selection

//il contiens 1 data de pins
    // Avec une position une popup activable ou non 

//il y'a un selecteur des layers a afficher
    //il y a une legende pour chaques selecteur.


//----------------------------------------------------------------------------------------------------------------


//                                          VARIABLES


//----------------------------------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------------------------------------
//                                          VARIABLES
//----------------------------------------------------------------------------------------------------------------
var map; // variable générique pour creer la map
var jsonLocation = 'data/test.geo.json';
var legend = L.control({position: 'bottomleft'});
var Selector;
//----------------------------------------------------------------------------------------------------------------
//                                          ARRAY/OBJECT
//----------------------------------------------------------------------------------------------------------------
var Myjson =[];
var MyMarker =[];

var SelectorArr = ['<a id="LayerB1" >bouton 1</a>','<a id="LayerB2" >bouton 2</a>','<a id="LayerB3" >bouton 3</a>'];
//----------------------------------------------------------------------------------------------------------------
//                                          VAR LAYER
//----------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------
//                                         Custom popup
//----------------------------------------------------------------------------------------------------------------
//cette fonction permet selons les infos du layer d'initialiser la popup
function customPopup()
{};
//--------- HEADER 
var popupHeaderS =    '<div id="header-Popup">'+' <div id="popup-title">' ;
var popupHeaderE =    '</div>'+'</div>';
//--------- FOOTER 
var popupFooterS =  '<div id="popup-footer">'+'<span id="popup-footer-description">';
var popupFooterE = +'</span>'+'<img id="popup-logo" src="http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg">'+'</div>';
//--------- BODY 
var popupCustomS = '<div id="custompopup">'+ '<ul>'
+ ' <li> <span class= "popup-txt-titre" > iso2 : </span> ' + ' <span class="popup-txt-text"> ';
var popupCustomE ='</span ></li>';


var myPopup= popupHeaderS+popupHeaderE+popupCustomS+popupCustomE+popupFooterS+popupFooterE;

console.log(myPopup);
//-----------------------Layer 1

var layer1 =
{
    "loc" : 
    {
        "attr" : "coucou"
    },
    "attr" :
    {
        "attr" : "coucou"
    }

}
;
var layer1attr =  "";
var layer1Popup = "";
var layerLegend = "";


//-----------------------Layer 2
var layer2loc = "data/test.geo.json";




//----------------------------------------------------------------------------------------------------------------
//                                        Layer fonctions spécifique
//----------------------------------------------------------------------------------------------------------------

function LayerB1()
{
    var layer2 = L.geoJson(MyMarker,
    {
        style: function(feature) {return {color: feature.properties.GPSUserColor};
    },
    pointToLayer: function(feature, latlng)
    {
        return new L.CircleMarker(latlng, {radius: 10, fillOpacity: 0.85});
    },
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup(feature.properties.GPSUserName);
    }
}); 

    console.log("test");
    console.log(MyMarker);
    map.addLayer(layer2);
}

//----------------------------------------------------------------------------------------------------------------
//                                        Layers Fonctions Iteration
//----------------------------------------------------------------------------------------------------------------
function  RemoveLayer()
{
    
};
function addjson()
{
    geojson = L.geoJson(Myjson, {style: style,onEachFeature: onEachFeature,});
    map.addLayer(geojson);

}


//----------------------------------------------------------------------------------------------------------------


//                                         Fonctions


//----------------------------------------------------------------------------------------------------------------




//----------------------------------------------------------------------------------------------------------------
//                                         Selector
//----------------------------------------------------------------------------------------------------------------
function addSelector()
{
    Selector = '<ul id="Mselector">';
    $.each(SelectorArr, function(index, val) {
        Selector = Selector + val;
    });
    Selector = Selector + '</ul>';
    
    $("#map").prepend(Selector);
}



//----------------------------------------------------------------------------------------------------------------
//                                         FILL COLOR
//----------------------------------------------------------------------------------------------------------------
function style(feature) {
	return {
		weight: 2,
		opacity: 1,
		color: 'white',
		dashArray: '3',
		fillOpacity: 0.7,
		fillColor: getColor(feature.properties.iso2) 
	};
}


function getColor(d){ 

    switch(d) 
    {
        case'BY':return' #001DE5';break;
        case'HR':return' #131ACE';break;
        case'DK':return' #2617B7';break;
        case'ES':return' #3914A0';break;
        case'EE':return' #4C1289';break;
        case'FI':return' #5F0F72';break;
        case'CY':return' #720C5B';break;
        case'GR':return' #850A44';break;
        case'GD':return' #98072D';break;
        case'IE':return' #AB0416';break;
        case'HU':return' #BF0200';break;
        case'BG':return' #BF0200';break;
        case'IS':return' #AB1402';break;
        case'AL':return' #982704';break;
        case'AT':return' #853A06';break;
        case'AD':return' #724D09';break;
        case'BE':return' #5F600B';break;
        case'IT':return' #4C730D';break;
        case'DE':return' #398610';break;
        case'RU':return' #269912';break;
        case'TR':return' #13AC14';break;
        case'GB':return' #00BF17';break;
        case'MC':return' #001DE5';break;
        case'UA':return' #131ACE';break;
        case'FR':return' #2617B7';break;
        case'CZ':return' #3914A0';break;
        case'LI':return' #4C1289';break;
        case'LU':return' #5F0F72';break;
        case'PT':return' #720C5B';break;
        case'LV':return' #850A44';break;
        case'SE':return' #98072D';break;
        case'NL':return' #AB0416';break;
        case'NO':return' #AB1402';break;
        case'PL':return' #982704';break;
        case'CH':return' #853A06';break;
        case'LT':return' #724D09';break;
        default:return'#fe9810';
    }
}

//----------------------------------------------------------------------------------------------------------------
//                                         HOVER
//----------------------------------------------------------------------------------------------------------------

function highlightFeature(e){

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



function resetHighlight(e) {
	geojson.resetStyle(e.target);
}



//----------------------------------------------------------------------------------------------------------------
//                                        CLICK
//----------------------------------------------------------------------------------------------------------------


function whenClicked(e) 
{
 var isInIFrame = (window.location != window.parent.location);
 if(isInIFrame==true){
  window.parent.Editdata(e); 
}
};

//----------------------------------------------------------------------------------------------------------------
//                                        CLICK
//----------------------------------------------------------------------------------------------------------------



function onEachFeature(feature, layer){
    layer.on({
        click: whenClicked,
        mouseover: highlightFeature,
        mouseout: resetHighlight
    });



    var custompopup =  
    // -------- Header --------------------------------
    '<div id="header-Popup">'
    +' <div id="popup-title"> Les pays par couleurs dans une ambiance sobre et expérimentale </div>'
    +'</div>'
    // -------- Interieur popup --------------------------------
    +'<div id="custompopup">'
    + '<ul>'
    + ' <li> <span class= "popup-txt-titre" > iso2 : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.iso2 + '</span ></li>'
    + ' <li> <span class= "popup-txt-titre" > cartodb_id : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.cartodb_id + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > aaa_pays_fr_pays : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.aaa_pays_fr_pays + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > formal_en : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.formal_en + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > admin : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.admin + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > aaa_name_fr : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.aaa_name_fr + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > name : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.name + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > Matchs : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.Matchs + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > coucou2 : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.coucou2 + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > iso2 : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.iso2 + '</span ></li>'
    + ' <li> <span class= "popup-txt-titre" > cartodb_id : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.cartodb_id + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > aaa_pays_fr_pays : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.aaa_pays_fr_pays + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > formal_en : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.formal_en + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > admin : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.admin + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > aaa_name_fr : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.aaa_name_fr + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > name : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.name + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > Matchs : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.Matchs + '</span ></li>'  
    + ' <li> <span class= "popup-txt-titre" > coucou2 : </span> ' + ' <span class="popup-txt-text"> ' + feature.properties.coucou2 + '</span ></li>' 

    + '</ul>' 
     // -------- Popup footer ----------------------------------------
     +'<div id="popup-footer">'
     +'<span id="popup-footer-description">'+ 'une déscription plus ou moins aléatoire pour dire quelque chose de spécifique mais désactivable' +'</span>'
     +'<img id="popup-logo" src="http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg">'+
     '</div>'
     ;
     var customoptions=  {'width': '800','className' : 'coucou'};
     layer.bindPopup(custompopup, customoptions);
 }



//----------------------------------------------------------------------------------------------------------------
//                                          LAYER
//----------------------------------------------------------------------------------------------------------------



//----------------------------------------------------------------------------------------------------------------
//                                          Popup
//----------------------------------------------------------------------------------------------------------------



//----------------------------------------------------------------------------------------------------------------
//                                          Legend
//----------------------------------------------------------------------------------------------------------------
legend2 =  'coucou';
legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
    grades = ['BY','HR','DK','ES','EE','FI','CY','GR','GD','IE','HU','BG','IS','AL','AT','AD','BE','IT','DE','RU','TR','GB','MC','UA','FR','CZ','LI','LU','PT','LV','SE','NL','NO','PL','CH','LT','RO' ];   
    labels = [];
    

    for (var i = 0 ; i < grades.length; i++) {
        // 
        labels.push(
            '<li> <i style=" background:'+ getColor(grades[i]) + '"></i>' 
            + '<span class="label-legend">' + grades[i] + '</span>' + '</li>')};

        legendHeader = 
        '<div id="header-legend">'
        +' <div id="title-Legend"> Les pays par couleurs dans une ambiance sobre et expérimentale </div>'
        +'</div>';

        legendFooter =
        '<div id="footer-legend">'
        +'<span id="legend-footer-description">'+ 'une déscription plus ou moins aléatoire pour dire quelque chose de spécifique mais désactivable' +'</span>'
        +'<img id="legend-logo" src="http://www.touteleurope.eu/fileadmin/_TLEv3/euro2016/img/TleLogo.svg">'+
        '</div>';

        console.log(labels);
        div.innerHTML = legendHeader+'<ul>'+labels.join("")+legendFooter+'</ul>';
        return div;
    };



//----------------------------------------------------------------------------------------------------------------




//                                          READY



//----------------------------------------------------------------------------------------------------------------




$(document).ready(function() {

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
        console.log( "error" );
    })

    jQuery.getJSON('data/marker.geo.json', function(json){
        MyMarker.push(json);})
    .done(function() {
        addjson();
    })
    .fail(function() {
        console.log( "error" );
    })


};





$('body').click(function(event) {
    RemoveLayer();   /* Act on the event */
});

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
    L.tileLayer('https://cartocdn_{s}.global.ssl.fastly.net/base-flatblue/{z}/{x}/{y}.png').addTo(map);
    // hop ici on initialise le geojson
    Edit(map);
}


//----------------------------------------------------------------------------------------------------------------
//                                         EDIT MODE
//----------------------------------------------------------------------------------------------------------------
// Communication avec le fichier parent pour lui envoyer des informations et éditer en live.

function Edit(map){
    var isInIFrame = (window.location != window.parent.location); 
    if(isInIFrame==true)
    {

    };
};

$('#layer1').click(function(event) {
    layerAZE();    /* Act on the event */
});
//----------------------------------------------------------------------------------------------------------------
//                                        ADD LEGEND/SELECTOR
//----------------------------------------------------------------------------------------------------------------
legend.addTo(map);
// map.addLayer(legend);
// map.removeLayer(legend);
    // map.addLayer(legend2);
    addSelector();
    console.log(map);
    $('#LayerB1').click(function(event) {
       console.log('chouette');   /* Act on the event */
       LayerB1();
   });

    console.log(layer1)



});