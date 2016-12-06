//---------------------------------------------------------------------------------



//                        VARIABLES



//---------------------------------------------------------------------------------

//Voilà mes variables de bases
var MapName; //cette variable me permet de dire quelle map je suis en train de modifier.
var path; // le path me permet de savoir à quel endroit je cherche mon  fichier
var path2; 
var supercontenu; // super contenu me permet de savoir quel js j'ai utilisé donc le nom est nul
var DataTle =[]; // je ne sais pas 
var jsonF; // JsonF est là ou j'enregistre temporairement le json a modifier.
var DataTable;
var JsonMapchange={}; ;// ici je peux avoir l'obet de mon iframe au click.
//Il me faut regarder les changement des jsons toute les 3 secondes afins de ne pas réécrire sur un sujet déjà avancé.
var CompareData;
var CompareSettings;
var popupinfo={};
// l'ideal
var OptionsCat=[]; // ce tableau me permet de definir, toutes les options qui existent sans faire de doublons pour les catégories à ajouter.

//ici c'est moncomparer les data
var oldData; // la data enregistrée
var newData; // la data actualisé toute les 3 secondes

var DataJson={}; // ici c'est les data de la map;
var DataJsonAttr={};//ici c'est le tableau en entier de la data.
var Map; // Le nom Map que je suis en train d'editer
var Path; // l'endoit ou je suis en train de l'éditer
var JsonSettings; // Le Fichier json de mes settings de base. enrengistré dans ma variable.



//---------------------------------------------------------------------------------



//                        FONCTIONS



//---------------------------------------------------------------------------------



//---------------------------------------------------------------------------------

//                        MANIPULATION DU JSON

//---------------------------------------------------------------------------------

//ici Je load mes répértoires de projets 
function LoadRepertory(){};
//ici je load mon json et je le modifie
function LoadJson(){};
function Changejson(){};
function ChangejsonDatabymap(){}; // cette fonction me permet d'activer un php pour remplacer des infos selons une modification dirrectement faite sur la map;
function SaveJsonSettings(){};//ici c'est pour envoyer mon json dans un php pour le changer.
function ShowJson(){};// simple raccourcis de debug  pour voir le json affiché
//ici je génére un js en fonction du json

//---------------------------------------------------------------------------------

//                        ECRITURE/EDITION

//---------------------------------------------------------------------------------

function GenerateJS(){};// hop une petite fonction ajax pour enregister les données dans le main js de la carte.
function GenerateCss(){}; // je ne me suis pas encore posé la question mais il va faloir modifier là mise en forme des textes leurs couleurs ect.
//ici toute le fonctions de ma Map
function CreateMap(){};//je créé une nouvelle map
function DeleteMap(){};//je suprime la map
function PuplishMap(){};// je publie la map
function Savedraft(){};// hop je sauve en brouillon
function Duplicate(){};// hop je duplique 
function Replace(){};// je remplace un fichier par un autre

//ici le fonction de l'édit mode
function DrawPoly(){};    //je déssine des polygons
function EditOnClick(){}; // ici je change les propriété d'un pays en lui cliquant dessus.
function EditPopup(){};  // ici j'édite les donée de mon pays en lui cliquants dessus
// propriété = ses propriété physiques (couleurs, bords, transparences ).
// données = son nom, son contenu, 

function PhpFunction(){}; //Ici je vais vers mon php pour activer une de ses fonction.
function ReloadMapp(){}; // ICI c'est simplement pour recharger une iframe pour garder le contenu à jour.
function ReloadSettings(){}; //reloader le json data.
function Reloaddata(){};//juste pour recharger les données.
function Editdata(){};// Cette partie est pour éditer les data d'un pays lors de son click.
function AddPopupElement(){}; // ici c'est pour avoir tout les elements a trier dans la popup.
function ReInitPopupEl(){}; // ici en fonction du drag.

function BaseGeoOptions(){};// cette fonction me permet de Séléctioner la base géo à afficher.
function BaseGeoSelJSON(){};// cette fonctions me permet de rajouter la valeur dans le setting du json.
function Displaycat(){};//cette fonction d'afficher des catégories.
function LoadDataGeoEl(){}; // ici je load dans ma var mon tableau.
function CatAddjson(){}; // cette fonction me permet de voir toutes les catégories et leurs couleurs.

//---------------------------------------------------------------------------------

//                        ECRITURE/EDITION

//---------------------------------------------------------------------------------
function colorpicker(){};// cette fonction me permet de changer les class en color piker (normalement).

function editmode(){};// voilà le super edit mode.
function ongletSelection(){};// initialisation des onglets.
function loadProject(){};

function DeleteProject(){};// pour supprimer chaque projets.
function resetSettings(){};  // Pour réinitaliser tout les éléments du precedent projet dans l'éditeur
function addpopupel(){}; // juste pour rajouter tout les elements de popup;
function chooseGeoCat(){};
function LayerJson(){};// ici je change les valeurs dans le json.


function lock(){};// bloque tout si un projet n'est pas ouvert.
function unlock(){};// Débloque tout quand un projet est ouvert.
function mapName(){};// Affiche le nom du projet ouvert et débloque tout.
function REFRESH(){};// Remet tout les parrametres a Zero.


//---------------------------------------------------------------------------------

//                        LAYERS

//---------------------------------------------------------------------------------
function GenerateLayer(){}; // pour generer chaque layer.

//---------------------------------------------------------------------------------

//                        SELECTEUR

//---------------------------------------------------------------------------------
function GenerateSelecteur(){}; // pour generer chaque layer.
function SelecteurUpdate(){};// ici je met à jour la selection des layers dans les options 
function PreremplirCalques(){}; // pour preremplir les calques en fonctions du json.
//---------------------------------------------------------------------------------

//                        ACTION IFRAME

//---------------------------------------------------------------------------------
function getzoom(e){}; // ici j'attrape le zoom depuis le zoom de la carte de l'iframe
function getpos(e){};  // ici j'attrape la position depuis le coordonée de la carte de l'iframe


function getzoom(e)
{
$('#MapZoom').val('Zoom'+e);
}

function getpos(e)
{
  $('#lat').val(e['lat']);
  $('#lat').attr('class', 'notempty');
  $('#lon').val(e['lng']);
  $('#lon').attr('class', 'notempty');
}



function Preremplirlegend()
{
  function Legendloop(e)
  {
    DescN = 0 ;
    $.each(e, function(index, val){
      console.log(index);

      if(index == 'carre')
      {
        console.log('VALLLLL' + val);
        if ( val["text"] == '' ||  val["text"] == undefined ||  val["text"] == null  || val["text"] == "undefined" ) 
          {
            var carresel = ""
          }
          else
          {
            var carresel = "notempty"
          }

        $('#staticlegend').append(''
          +'<li class="SquareCol" >'
          +'<span class="handle"><i class="material-icons dragleg">open_with</i> <i onclick=" DelLegendel($(this))" class=" delLegendel material-icons">clear</i></span>'
          +'<div>'
          +'<div class="group col-xs-8">'
          +'<input type="text" name="ColorText" id="ColorText" class="ColorText  '+carresel+'" onChange="ValEmptyAddClass($(this));" value="'+val["text"]+'">'
          +'<span class="highlight"></span>'
          +'<span class="bar"></span>'
          +'<label for="ColorText">Legende attribut</label>'
          +'<div class="clearfix"></div>'
          +'</div>'
          +' <div class="form-group col-xs-3">'
          +'<input type="text" class="cp-input" id="Colorinput" value="'+val["color"]+'" >'
          +'</div>'
          +'<div class="clearfix"></div>'

          +'</div>'
          +'<div class="clearfix"></div>'
          +'</li>');
      }     

      if(index == 'desc')
      {

    $('#staticlegend').append('<li class="Mtextedit" ><span class="handle2"><i onclick=" DelLegendel($(this))" class=" delLegendel material-icons">clear</i></span><div class="tinymceM"><textarea class="tmce" ></textarea></div></li>');
  tinymce.init({  
    mode : "specific_textareas",
    editor_selector : "tmce",
    plugins: [
    'searchreplace visualblocks code fullscreen',
    'advlist autolink lists link image charmap print preview anchor',
    'insertdatetime media table contextmenu paste code',
    'textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    textcolor_cols: "15",
    textcolor_map: [
    "000000", "Black",
    "292929","",
    "545454","",
    "7d7d7d","",
    "9c9c9c","",
    "b5b5b5","",
    "cccccc","",
    "dedede","",
    "f1f0f0","",
    "ffffff","",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FFFFFF", "White",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum"
    ],
    content_css: [
    '//www.tinymce.com/css/codepen.min.css'
    ]

  });

  console.log( $('#parametres').find('.tinymceM'));
  if ( $('#parametres').find('.tinymceM') != undefined )
  {
  var last =  $('#parametres').find('.tinymceM').length;
  }
  var n = 0 ;
  console.log(last);
  console.log("Last");
 $('.tmce').each(function(index, el) {
   n++;
   if (n == last)
   {

    var div = document.createElement("div");
    var text =  $("<div/>").html(val).text();

/*
    var div = document.createElement('div');
    var text = document.createTextNode(val);
    div.appendChild(text);*/

    console.log($(this));
    var Idtinymce = $(this).attr('id');
    tinyMCE.get(Idtinymce).setContent(text);
   };
   
 });





}     

if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
{
  Legendloop(val);
}



});


}


Legendloop(JsonSettings['legendStatique']);


}


function DelLegendel(e)
{
  console.log(e);
  e.closest('li').remove();
}
function Creerhtml()
{
  $('#staticlegend').append('<li class="Mtextedit" ><span class="handle2"> <i onclick=" DelLegendel($(this))" class=" delLegendel material-icons">clear</i></span><div class="tinymceM"><textarea class="tmce" ></textarea></div></li>');
  tinymce.init({  
    mode : "specific_textareas",
    editor_selector : "tmce",
    plugins: [
    'searchreplace visualblocks code fullscreen',
    'advlist autolink lists link image charmap print preview anchor',
    'insertdatetime media table contextmenu paste code',
    'textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    textcolor_cols: "15",
    textcolor_map: [
    "000000", "Black",
    "292929","",
    "545454","",
    "7d7d7d","",
    "9c9c9c","",
    "b5b5b5","",
    "cccccc","",
    "dedede","",
    "f1f0f0","",
    "ffffff","",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FFFFFF", "White",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum"
    ],
    content_css: [
    '//www.tinymce.com/css/codepen.min.css'
    ]

  });
getLegendElement()

}

function CreerCarre( e , generate )
{

  $('#staticlegend').append(''
    +'<li class="SquareCol" >'
    +'<span class="handle"><i class="material-icons dragleg">open_with</i> <i onclick=" DelLegendel($(this))" class=" delLegendel material-icons">clear</i></span>'
    +'<div>'
    +'<div class="group col-xs-8">'
    +'<input type="text" name="ColorText" id="ColorText" class="ColorText" onChange="ValEmptyAddClass($(this));">'
    +'<span class="highlight"></span>'
    +'<span class="bar"></span>'
    +'<label for="ColorText">Legende attribut</label>'
    +'<div class="clearfix"></div>'
    +'</div>'

    +' <div class="form-group col-xs-3">'
    +'<input type="text" class="cp-input" id="Colorinput" value="rgba(0,0,0,1)" >'
    +'</div>'
    +'<div class="clearfix"></div>'

    +'</div>'
    +'<div class="clearfix"></div>'
    +'</li>'

    );


  ColorinputRGBA();
  SortableRefresh();
  console.log(tinyMCE.editors.length);
  getLegendElement()
}

function getLegendElement()
{

  var obj=[]
  var i=0;

  $('#staticlegend').find('li').each(function(index, el){

    if( $(this).attr('class') == 'SquareCol' )
    {
      obj[i]= { "carre":{} }
      obj[i]["carre"]["color"] = $(this).find('.cp-input').val();
      obj[i]["carre"]["text"]  = $(this).find('.ColorText').val();
    }
    if( $(this).attr('class') == 'Mtextedit')
    {
          // tinyMCE.get('yourTextAreaId').getContent();
          var TmceID = $(this).find('.tmce').attr('id');
          var content = tinyMCE.get(TmceID).getContent();
          console.log(content);

    var div = document.createElement('div');
    var text = document.createTextNode(content);
    div.appendChild(text);

          obj[i]={'desc' : div.innerHTML };

        }
        i++;
      });

  JsonSettings["legendStatique"] = obj;

}

function InitLegend()
{


  ColorinputRGBA();
}

function PreremplirCalques(){


  console.log('-------------------------------------------------------------------------------------------BEGGGGGGINNNNNS---------------------------------------------------------------------------------------------------------------');


//-1 je dois lire setting.json
// je compare avec mon html
// si un calques = mon conteneur de calques je remplace toute les valeurs en desous.



// pour toute les options cat je selectionne la bonne valeur.
// je selectionne les bonnes popup.




function readjson(e)
{
  $.each(e, function(index, val) {

    if(index == "Layers")
    {
      console.log("FOUND");
      AutocompleteLayer(val);
    }

    if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
    {
      readjson(val);
    }

  })
}
readjson(JsonSettings);


function AutocompleteLayer(sel){

  $.each( sel , function(index, val) {

    var LayerSelector = '#'+index ;

    $('#calques').find(LayerSelector).find('.chooseGeoCat').val(val.GeoSelCat);

    chooseGeoCat(  $('#calques').find(LayerSelector).find('.chooseGeoCat'));
    // en fonction de la selection je dois generer les couleurs.

    $.each(val['popup'], function(index, val) {
      console.log('index:'+index+"val:"+val);
      var mval= '#'+index
      console.log(mval);
      if(val == true || val == 'true' )
      {

       $('#calques').find(LayerSelector).find(mval).prop( "checked", true );
     }
     else
     {
       $('#calques').find(LayerSelector).find(mval).prop( "checked", false );

     }

   });

  });



  InitLegend();



}


console.log('END---------------------------------------------------------------------------------------------------------------');




}



function lock()
{
  $('.json-btn').addClass('lock');
  $('.onglet').addClass('lock');
  $('.tablepopup').addClass('lock');
}

function unlock()
{
  $('.json-btn').removeClass('lock');
  $('.onglet').removeClass('lock');
  $('.tablepopup').removeClass('lock');
}


function mapName()
{
  $('#map-name').text(MapName);
  unlock();
};


function SelecteurUpdate()
{
  $('.chosselayer').html('');
  $('.chosselayer').each(function(index, el){
    var Thatchosselayer = $(this);
    console.log(Thatchosselayer);


    $.each(JsonSettings['Layers'] , function(index, val) {
      var L = index;
      console.log('index');
      var WhatBtn = Thatchosselayer.closest('.accordeonRubrique').attr('id');

      console.log('SELESCTEURAZE');
      console.log(index);
      console.log(WhatBtn);

      if(WhatBtn != undefined){

        console.log(JsonSettings['Selecteur'][WhatBtn]['Sel']);
        var Arrlayer =  JsonSettings['Selecteur'][WhatBtn]['Sel'];

        if ( jQuery.inArray(index, Arrlayer) !== -1 )
        {
         Thatchosselayer.append('<div class="col-xs-12"><label for="'+ index+'">'+val['Name']+'</label>'+'<input id="'+ index+'" type="checkbox" checked></div>');
       }
       else
       {
         Thatchosselayer.append('<div class="col-xs-12"><label for="'+ index+'">'+val['Name']+'</label>'+'<input id="'+ index+'" type="checkbox"></div>');
       }
     }
   });






  });

}

function ColorinputRGBA()
{
  $(function() {
    $('.cp-input').colorpicker({
      colorFormat: ['RGBA'],
      buttonColorize: true,
      showNoneButton: true,
      alpha: true,
      parts: 'full',
      showOn: 'both'
    });
  });
}

function InitSelecteur()
{
  // d'abord je supprime ce qui était là avant.
  $('#SelecteurContnair').html('');
  console.log('Fonction InitSelecteur');
  // ici je prévois l'initialisation des selecteurs en fonctions du json de base.

  // 1-je lis le json
  function readjson(e)
  {
    $.each(e, function(index, val) {

      if(index == "Selecteur")
      {
        console.log("FOUND");
        // 2 - j'ai trouvé un bouton
        GenerateSelecteur(val);
      }

      if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
      {
        readjson(val);
      }

    })
  }
  readjson(JsonSettings);
  SelecteurUpdate();
}

function GenerateSelecteur(e)
{


  console.log('generattte');
  $.each(e, function(index, val) {
   var namelayer = index;
   var Nlayer = val['Name'];
   var node = document.getElementById("SelecteurModel").cloneNode(true);
   var children = node.childNodes;


   function TreeNode(e)
   {
    for (var i = 0; i < e.length; i++) {


      if(e[i].hasChildNodes() && e[i].id != 'titreCalque')
      {
       TreeNode(e[i].childNodes);
     }

     if( e[i].className == 'accordeonRubrique')
     {
      e[i].id = namelayer ;
    }

    if( e[i].id == 'titreCalque')
    {
      e[i].childNodes[0].nodeValue = Nlayer ;
    }
    if( Nlayer == 'Bouton0' &&  e[i].className == 'CalqueDel')
    {
      console.log('FINDD');
     e[i].remove() ;
    }
  };
}

TreeNode(node.childNodes);
node.id = namelayer; // Don't forget :)

  var div = document.createElement('div');
  // modify node contents with DOM manipulation
  div.appendChild(node);
  document.getElementById('SelecteurContnair').appendChild(div);
  SelecteurUpdate();

});








};





function AddSelecteur()
{

  var Nbtn="";
  var myObjLayer = JsonSettings['Selecteur']; 
  var myObjLayerlenght = Object.keys(myObjLayer).length; // le nombre de mes layers 
  var okay = 'B';
  var Nlayer;

  for (var i = 0;  i < 300; i++)
  {
    var NewLayerName ='Bouton'+i;
    if (JsonSettings["Selecteur"][NewLayerName] == undefined)
    {
      Nlayer = NewLayerName;
      break;
    }
    
  };

  JsonSettings['Selecteur'][Nlayer] = { "Name":Nlayer , "Sel":[] };
  var obj ={};
  obj[Nlayer] = { "Name":"" , "Sel":[] } ;
  obj[Nlayer]["Name"] = Nlayer;

  $('#json').html( JSON.stringify(JsonSettings,null,4)); // on Réaffiche les changement 
  SortableRefresh();
  GenerateSelecteur(obj);


}








function DeleteSelecteur(e)
{
  //là je dois prévoir le bb
  var todel = e.closest(".accordeonRubrique").attr('id');
  console.log(JsonSettings["Selecteur"][todel]);
  delete JsonSettings["Selecteur"][todel];
  $('#SelecteurContnair').find("#"+todel).remove();
  ShowJson();



};



 // A la base pour tenter de rester propre il faut que je limite mes fonctions et que je repére les répétitions 
 // pour pouvoir encore diviser et simplifier le travail.


 function CalqueDel(e)
 {

  var todel = e.closest(".accordeonRubrique").attr('id');
  console.log(JsonSettings["Layers"][todel]);
  delete JsonSettings["Layers"][todel];
  $('#calquesCont').find("#"+todel).remove();
  ShowJson();

}

function REFRESH()
{

  // ici je dois changer toutes les valeurs de mon json settings par les moddification de l'utilisateur.
  // Geo cat sel 
  // toutes les couleurs séléctionnés 
  //l'ordre des popups
  getLegendElement()
  SaveJsonSettings();
  GenerateJS();
  var FirstIterraction =true;
  var Firstname;
  $('#calquesCont').find('.accordeonRubrique').each(function(index, el) {
    name = $(this).attr('id');
    Firstname =name;

    if (Firstname != name) 
    {
      FirstIterraction =true;
    };

    if (FirstIterraction == true) 
    {
      JsonSettings["Layers"][name]['popup'] = {};
      FirstIterraction = false;
    };




    var Nname = $(this).prev('.accordeonSelecteur').find('#titreCalque').html();
    console.log(JsonSettings["Layers"][name]['Name']);
    JsonSettings["Layers"][name]['Name'] = $(this).prev('.accordeonSelecteur').find('#titreCalque').html();
    JsonSettings["Layers"][name]['type'] = 'GEO';

    JsonSettings["Layers"][name]['GeoSelCat'] = $(this).find('.chooseGeoCat').val();

    $(this).find('#OptionsCat').find('input').each(function(index, el) {
     JsonSettings["Layers"][name]['OptionsCat'][$(this).attr('name')] = $(this).val();
   });

    console.log('TEST SORTABLE')
    $(this).find('.sortable').find('input').each(function(index, el) {
     var inputName = $(this).attr('id');
     console.log($(this));
     JsonSettings["Layers"][name]['popup'][inputName] = $(this).is(":checked");
   });





  });

$('#selecteurLayer').find('.accordeonRubrique').each(function(index, el) {
  var Btnname = $(this).attr('id');
  var Editname = $(this).prev('.accordeonSelecteur').find('#titreCalque').html();
  JsonSettings["Selecteur"][Btnname]['Name'] = Editname;
  JsonSettings["Selecteur"][Btnname]['Sel']=[];

  $(this).find('.chosselayer').find('input').each(function(index, el) {

   var Inputid = $(this).attr('id');
   console.log(Inputid)
   console.log('INNNNPUUUUUT');
   console.log($(this).is(":checked") );
   console.log(Btnname);
   console.log(JsonSettings["Selecteur"][Btnname]['Sel']);
   if($(this).is(":checked") == true)
     JsonSettings["Selecteur"][Btnname]['Sel'].push(Inputid);


 });



});

SaveJsonSettings();
GenerateJS();
ShowJson();
InitSelecteur();
SelecteurUpdate();
};


function chooseGeoCat(e){
  console.log(e.val());
  e.closest('.accordeonRubrique').find('#OptionsCat').html('');
  console.log(e.closest('.accordeonRubrique').children('#OptionsCat'));

  console.log(DataJson);
  console.log(popupinfo);
  var SelLayer = e.closest('.accordeonRubrique').attr('id'); 

  var sel = e.val();
  var comparator = [];

  function Loopel(Arr)
  {


   $.each(Arr, function(index, val) {

    var inArr = $.inArray(val, comparator);
    console.log(inArr);
    if (inArr == -1){

      if(index == sel )
      {        
        comparator.push(val)  
        console.log(val);
        console.log(comparator);
        var toappend;
        console.log(SelLayer);


        if(JsonSettings['Layers'][SelLayer]['OptionsCat'][val] != undefined || JsonSettings['Layers'][SelLayer]['OptionsCat'][val] != 'undefined'  )
        {
         e.closest('.accordeonRubrique').find('#OptionsCat').append(
          '<div class="form-group">'+
          '<label for="'+val+'"> '+val+' </label></br>'+
          '<input id="'+val+'" name="'+val+'"type="text" class="GeoColor" value="'+JsonSettings['Layers'][SelLayer]['OptionsCat'][val]+'">'+
          '</div>');
       }
       else
       {
        e.closest('.accordeonRubrique').find('#OptionsCat').append(
          '<div class="form-group">'+
          '<label for="'+val+'"> '+val+' </label></br>'+
          '<input id="'+val+'" name="'+val+'"type="text" class="GeoColor" value="none">'+
          '</div>');
      }
      console.log();

     /*   e.closest('.accordeonRubrique').find('#OptionsCat').append(
          '<div class="form-group">'+
          '<label for="'+val+'"> '+val+' </label></br>'+
          '<input id="'+val+'" name="'+val+'"type="text" class="GeoColor" value="none">'+
          '</div>');*/
}
};
if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
{
  Loopel(val);
}

});

}

function  GeocatInJson(e)
{
  console.log(e);
  
};

Loopel(DataJson);
GeocatInJson(e);
colorpicker();
};



function Aftersort(E)
{
  console.log('AZE');
  $('calquesCont .accordeon-selecteur-contenu').each(function(index, el) {
    console.log($(this).id);   
  });
}

function resetSettings(){

  $('.Mtextedit').each(function(index, el) {
          var TmceID = $(this).find('.tmce').attr('id');
          tinymce.execCommand('mceRemoveControl', true, TmceID);
  });


  $('input').val('');
  $('textarea').val('');
  $('#calquesCont').html('');
  $('.sortable').html('');
};




function GenerateLayer(){

 function loopobject(e)
 {

  $.each(e, function(index, val) {

      // console.log(val);
      if(index == "Layers")
      {
        // console.log( Object.keys(val) )
        GenerateLayers(val)
      }

      if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
      {
        loopobject(val);
      }

    });
}

function GenerateLayers(e)
{
  $.each(e, function(index, val) {
    console.log(val);
    /* iterate through array or object */
    console.log(val)
    var Namelayer = index;
    var Nlayer = val['Name'];
  //--------------------------------------------------------------------------------
  
  // AJOUT DANS L'EDITEUR
  
  //--------------------------------------------------------------------------------
  var node = document.getElementById("Basemodelhtml").cloneNode(true);
  var children = node.childNodes;


  function TreeNode(e)
  {
    for (var i = 0; i < e.length; i++) {


      if(e[i].hasChildNodes() && e[i].id != 'titreCalque')
      {
       TreeNode(e[i].childNodes);
     }

     if( e[i].className == 'accordeonRubrique')
     {
      console.log('coucou')
      e[i].id = Namelayer ;

    }

    if( e[i].id == 'titreCalque')
    {
      e[i].childNodes[0].nodeValue = Nlayer ;

    }
  };
}

TreeNode(node.childNodes);
node.id = Namelayer; // Don't forget :)


  var div = document.createElement('div');
  // modify node contents with DOM manipulation
  div.appendChild(node);
  document.getElementById('calquesCont').appendChild(div);

});

}








loopobject(JsonSettings);

};


function AccordeonClick(e)
{
  console.log(e);
  console.log($(this).attr('class'));
};


function loadProject(e)
{

  resetSettings();

  MapName = $(e).text();
  path =  'map/'+MapName+'/index.html';
  path2 = 'map/'+MapName;
  path3 = 'map/'+MapName+'/index.html';

  Loadmap();
  Loadjson($(e));


};


function DeleteProject(e)
{

};

function ongletSelection(e)
{

  $('.onglet').removeClass('active');
  e.addClass('active');
  ongAttr =  e.attr('data-toggle') ;
  ongSel ='#'+ ongAttr;

  $('.ongletContainer').css('display', 'none');
  $(ongSel).css('display','block');

};


//  <!--////////////////////////////////////////////////////////////////////////////// -->

//  <!--                 STUPID sorting                                                -->

//  <!--////////////////////////////////////////////////////////////////////////////// -->


$(function(){
      // Helper function to convert a string of the form "Mar 15, 1987" into
      // a Date object.
      var date_from_string = function(str){
        var months = ["jan","feb","mar","apr","may","jun","jul",
        "aug","sep","oct","nov","dec"];
        var pattern = "^([a-zA-Z]{3})\\s*(\\d{2}),\\s*(\\d{4})$";
        var re = new RegExp(pattern);
        var DateParts = re.exec(str).slice(1);
        var Year = DateParts[2];
        var Month = $.inArray(DateParts[0].toLowerCase(), months);
        var Day = DateParts[1];
        return new Date(Year, Month, Day);
      }
      var moveBlanks = function(a, b) {
        if ( a < b ){
          if (a == "")
            return 1;
          else
            return -1;
        }
        if ( a > b ){
          if (b == "")
            return -1;
          else
            return 1;
        }
        return 0;
      };
      var moveBlanksDesc = function(a, b) {
        // Blanks are by definition the smallest value, so we don't have to
        // worry about them here
        if ( a < b )
          return 1;
        if ( a > b )
          return -1;
        return 0;
      };
      var table = $("table").stupidtable({
        "date":function(a,b){
          // Get these into date objects for comparison.
          aDate = date_from_string(a);
          bDate = date_from_string(b);
          return aDate - bDate;
        },
        "moveBlanks": moveBlanks,
        "moveBlanksDesc": moveBlanksDesc,
      });
      table.on("beforetablesort", function (event, data) {
        // data.column - the index of the column sorted after a click
        // data.direction - the sorting direction (either asc or desc)
        $("#msg").text("Sorting index " + data.column)
      });
      table.on("aftertablesort", function (event, data) {
        var th = $(this).find("th");
        th.find(".arrow").remove();
        var dir = $.fn.stupidtable.dir;
        var arrow = data.direction === dir.ASC ? "&uarr;" : "&darr;";
        th.eq(data.column).append('<span class="arrow">' + arrow +'</span>');
      });
      $("tr").slice(1).click(function(){
        $(".awesome").removeClass("awesome");
        $(this).addClass("awesome");
      });
    });



//  <!--////////////////////////////////////////////////////////////////////////////// -->

//  <!--                 STUPID sorting                                                -->

//  <!--////////////////////////////////////////////////////////////////////////////// -->





function editmode(map){

  drawnItems = L.featureGroup().addTo(map);
  map.addControl(new L.Control.Draw({
    edit: {
      featureGroup: drawnItems,
      poly : {
        allowIntersection : false
      }
    },
    draw: {
      polygon : {
        allowIntersection: false
      }
    }
  }));
  var polygon = L.polygon([[51.509, -0.08],[51.503, -0.06],[51.51, -0.047]]).addTo(map);
  polygon.bindPopup("I am a polygon.");
  drawnItems.addLayer(polygon);
  map.on('draw:created', function(event) {

    var popupC ='id';
    var layer = event.layer,
    type = event.layerType;

    var NewGeojson= new Array();
    function test(e)
    {
      var type = {};
      var coordinate={};
      var geometry={};
      console.log(e)
      if (e.layerType === 'polygon' || e.layerType === 'rectangle' ) 
      {
        $.each(e.layer._latlngs, function(index, val) {
          var arr = [];
          arr.push(val.lat);
          arr.push(val.lng);
                        // console.log() e.LatLng;
                        // console.log(val['L.LatLng']);
                        
                        NewGeojson.push(arr);
                      })
        console.log('new ' ,NewGeojson);
      }

    }

    test(event);
        // $.each(event, function(index, val) {

        //      console.log(val);
        //      if(Val)


        //      });

  layer.on("click", function (e) {
    console.log(e);

  });

  drawnItems.addLayer(layer);
});

};




function GenerateJS()
{
  $.ajax({
    url: 'functions/GenerateJs.php',
    type: 'POST',
    data: {mapname: MapName },
  })
  .done(function(e) {
    console.log("success");
    console.log(e);
    ReloadMapp();
  })
  .fail(function() {
    console.log("error");

  })
  .always(function() {
    console.log("complete");
  });
  
}



function SaveJsonSettings()
{
  var Npath =  'map/'+MapName+'/settings.json';
  var Njson = JSON.stringify(JsonSettings)
  $.ajax({
    url: 'functions/SaveJsonSettings.php',
    type: 'POST',
    data: { 
      content: Njson,
      map : MapName
    },
  })
  .done(function(e) {
    console.log("success");
    console.log(e);
    Reloadmap();
  })
  .fail(function(e) {
    console.log("error");
    console.log(e);


  })
  .always(function(e) {
    console.log("complete");

  });

};




function CatAddjson(){

  $('#OptionsCat').find('input').each(function(index, el) {
  // console.log($(this).val());
  OptionsCat[$(this).attr('id')] = $(this).val();
});
  JsonSettings['OptionsCat'] = OptionsCat
  console.log(OptionsCat)
  ShowJson();
// console.log(Myinput)

//  for (var i = 0; i < Things.length; i++) {
//  OptionsCat[];
// };

}; // cette fonction me permet de voir toutes les catégories et leurs couleurs




function Displaycat(e){
  OptionsCat ={};
  var myprop = e;
  var obj = DataJson.features;
  console.log(DataJson);

  for (var i = 0; i < obj.length; i++) {
    obj2 = obj[i]['properties'][myprop] ;
  // console.log(obj2);
  if( obj[i]['properties'][myprop] != 'undefined' )
  {
    console.log('found it');
    console.log(obj[i]['properties'][myprop])

    if( jQuery.inArray(obj2 , OptionsCat) === -1 )
    {
     OptionsCat[obj2]= "fe9810";
   }
 }
};
console.log(OptionsCat);
$('#OptionsCat').html('');

$.each(OptionsCat, function(index, val) {
 /* iterate through array or object */

  // console.log(index(selector/element))
  if(index === "")
  {
    $('#OptionsCat').prepend(
      '<div class="form-group">'+
      '<label for="other"> other </label></br>'+
      '<input id="other" name="other" type="text" class="GeoColor" value="fe9810">'+
      '</div>'
      );
  }
  else
  {
    Escapedindex = escapeHtml(index);
    $('#OptionsCat').append(
      '<div class="form-group">'+
      '<label for="'+Escapedindex+'"> '+Escapedindex+' </label></br>'+
      '<input id="'+Escapedindex+'" name="'+Escapedindex+'"type="text" class="GeoColor" value="fe9810">'+
      '</div>'
      );
  }
});

colorpicker();
};

function ShowJson(){
  $('#json').html( JSON.stringify(JsonSettings,null,4));
  GenerateJS();
};



function BaseGeoSelJSON(e){
  JsonSettings['GeoSelCat'] = e;
};

function BaseGeoOptions(){
  $('.chooseGeoCat').html('<option>none</option>')
  $.each(popupinfo, function(index, val) {
   $('.chooseGeoCat').append("<option value='"+index+"''>"+index+"</option>")
 });
};

function ReInitPopupEl(e)
{
  tinyMCE.execCommand("mceRepaint");
  console.log('begin')
  JsonSettings['popup'] = 'a';
  var nobj ={}
  $('#calquesCont').find('.sortable').find('input').each(function(index, el)
  {
    var a = $(this).attr('id') ;
    var b = $(this).prop('checked');
    nobj[a]=b;
  });
   // [a] 
   console.log(nobj);
   JsonSettings['popup'] = nobj ;
   console.log(JsonSettings);
   ShowJson();
}; // ici en fonction du drag


function LoadDataGeoEl()
{
  var Npath =  'map/'+MapName+'/data/data.json';
  $.getJSON(Npath, function(json, textStatus) {
    DataJson = json;
    PreremplirCalques();
  });
}

function AddPopupElement()
{

  var Npath =  'map/'+MapName+'/data/data.json';
  jQuery.getJSON(Npath, function(json, textStatus) {


   var obj = json;
   obj = obj[0];


   $.each(obj, function(index, val) {
    // $('.sortable').append('<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input id="'+index+'" type="checkbox"></input>'+index+'</li>');
    // $('.ui-state-default').sortable();
    $('#calquesCont').find('.sortable').append('<li class="ui-state-default" > <span class="ui-icon ui-icon-arrowthick-2-n-s"></span> <input id="'+index+'" type="checkbox"></input>'+index+'</li>');

    popupinfo[index]= 'false';

  });
   if( JsonSettings['popup'] != popupinfo)
   {
     JsonSettings['popup'] = popupinfo;
   }
   console.log(JsonSettings);
   BaseGeoOptions();
   SortableRefresh();

 });




};

function SortableRefresh(){
  $('.sortable').sortable();
  $( ".sortable" ).disableSelection();
  colorpicker();
  $('.sortable')
  .sortable({
   revert       : true,
   handle: '.handle',
   connectWith  : ".sortable",
   stop         : function(event,ui){
    Aftersort(event,ui);
  }
});
};


function Editdata(e)

{   
 IframeObject= {};
 IframeObject = e.target.feature.properties;
};



function escapeHtml(html)
{
  var text = document.createTextNode(html);
  var div = document.createElement('div');
  div.appendChild(text);
  div.innerHTML.replace(/'/g, '&#39;');
  div.innerHTML.replace(/"/g, '&#34;');
  div.innerHTML.replace(/</g, '&#60;');
  div.innerHTML.replace(/>/g, '&#62;');
  return div.innerHTML;
}





function EditOnMapData()
{


  $('#myModal2').find('.Projet').html('<form action="sharer.php" method="POST"></form>');

  function loopZZ(e)
  {
    $.each(e, function(index, val) {
      if (index === 'cartodb_id')
      {
      }
      else if (index === 'admin_fr')
      {
        $('#myModal2').find('.Projet').children('form').append("<div class='form-group'><label for="+index+">" + index + "</label><input type='text' disabled class='form-control' id='"+index+"' value='"+ val + "'></div>");

      }
      else
      {



       var Escaped = escapeHtml(val);
       $('#myModal2').find('.Projet').children('form').append("<div class='form-group'><label for="+index+">"+index+"</label><input type='text' class='form-control' id='"+index+"' value='"+ Escaped+"'></div>");
     }

     if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
     {
      loopZZ(val);
    }
  });
  }
  loopZZ(IframeObject);
  $('#myModal2').find('.Projet').append('<button  onclick="ChangejsonDatabymap()" class="btn btn-default">Valider</button>');
  $('#myModal2').modal('show');

};
function ChangejsonDatabymap()
{
  var JsonMapchange={};
  $("form :input").each(function() {
    var id = ($(this).attr('id'));
    JsonMapchange[id] = $(this).val();
  });
  var Npath =  'map/'+MapName+'/data/data.json';
  $.ajax({
    url: 'functions/ChangejsonDatabymap.php',
    type: 'POST',
    data: {json: JsonMapchange,
      path:Npath},
    })
  .done(function(e) {
    console.log(e);
    Reloadmap();
  })
  .fail(function(e) {
    console.log("error");

  })
  .always(function(e) {
    console.log("complete");

  });
  

};

function Loadmap()
{

  var npath = 'http://localhost/Matthis/CartokeyEditorV3-leaflet/AlphaProj/'+path;
  $('#iframe').attr('src',path);
  var dataUrl = 'map/'+MapName+'/data/data.json';

  $.ajax({
    url: dataUrl,
  })
  .done(function(e) {
    DataJsonAttr = JSON.parse(e);
  })
  .fail(function(e) {
    console.log("error");
  })
  .always(function(e) {
    console.log("complete");
  });

  var xhr = $.ajax({
    url: dataUrl,
    success: function(response) {
      oldData =  xhr.getResponseHeader("Last-Modified");
      console.log(oldData+'AAAAA')
      // DataJsonAttr(response);
    }
  });

}

function Reloadmap()
{
  var mapPath ='map/'+MapName+'/index.html';
  $('#iframe').attr('src', mapPath);
}

function Loadjson(e)//Dés que j'ai séléctionné une map je la load ici
{

  MapName = $(e).text()
  path =  'map/'+MapName+'/settings.json';
  $.ajax({
    url: 'functions/ManipulateJson.php',
    type: 'GET',
    data: {'path': path , 
    'action':'decode' },
  })
  .done(function(e) {
    $('#json').html(e);
    initialiseMenu(e);
    GenerateLayer();
    InitSelecteur();
    LoadDataGeoEl();
    mapName();
    Preremplirlegend();

  })
  .fail(function(e) {
    console.log("error" + e);
  })
  .always(function() {
    console.log("complete");
  });
}

function Changejson(e)//text
{
  // cette fonctions est spécifique aux textes
  var valeur= e.val();
  var id = e.attr('id');
  console.log(valeur);
  var path;
  var path2;
  var path3;

  function loopobject(e)
  {

    $.each(e, function(index, val) {

      if (index === id)
      { 

        e[index] = valeur;
        console.log(JsonSettings);
      }

      if(jQuery.type(val) == "object" || jQuery.type(val) == "array")
      {
        loopobject(val);
      }

    })

  }

  loopobject(JsonSettings);
  $('#json').html( JSON.stringify(JsonSettings,null,4));
  GenerateJS();
}

function ChangejsonInput(e)//input
{
  // cette fonctions est spécifique aux textes
  var valeur= e.prop('checked')
  var id = e.attr('id');
  var path=[];

  function loopobject(e)
  {
    $.each(e, function(index, val) {
      if (index === id)
      {       
        JsonSettings[index]= valeur;
      }
    })
  }
  loopobject(JsonSettings);
  $('#json').html( JSON.stringify(JsonSettings,null,4));
  GenerateJS();
}

function ChangejsonInputPopUp(e)//input
{
  // cette fonctions est spécifique aux textes
  var valeur= e.prop('checked')
  var id = e.attr('id');
  var path=[];

  function loopobject(e)
  {
    $.each(e, function(i, val) {
      if (i === id)
      {       
        JsonSettings['popup'][i] = valeur;
      }
    })
  }
  loopobject(JsonSettings.popup);
  $('#json').html( JSON.stringify(JsonSettings,null,4));
  GenerateJS();
}

function checkinput()
{
  $(':input').each(function() {
    ValEmptyAddClass($( this ));
  });
}


function elmtSelectionne(e)
{
  console.log("ElmtSelectionne");
  if( e.attr('class') == 'accordeonSelecteur selected' )
  {
    console.log(e);
    e.attr('class','accordeonSelecteur')
  }
  else
  {
   console.log(e);
   e.attr('class','accordeonSelecteur selected')
 }
 $('#calquesCont').find('.accordeonRubrique').each(function(index, el){
  console.log(el);
  console.log(index);
});
}

function ValEmptyAddClass(e)
{
  if( !e.val() )
  {
    console.log('test');
    e.removeClass('notempty') ;
  }
  else
  {
   console.log('e');
   e.addClass('notempty');
 }

}

function initialiseMenu(e)
{

  JsonSettings = jQuery.parseJSON( e ) ; 



  function loopobject(e)
  {

    $.each(e, function(index, val) {
      if ( jQuery.type( val ) === "object" || jQuery.type( val ) === "array")
      {
        loopobject(val);
      }
      else
      {
        if($('#'+index).attr('type') == 'checkbox')
        {
          if (val === 'true')
          {
           $('#'+index).prop('checked', true).change();
         }
         else
         {
           $('#'+index).prop('checked', false).change();
         }

       }
       else if ( $('#'+index).length > 0 ) 
       {
        $('#'+index).val(val);
      };

    }
  })
  }



  loopobject(JsonSettings);
  AddPopupElement();
  checkinput();



}

//--------------------------------------------------------------------------------


//            RECHARGER SI DIFFERENT 


//--------------------------------------------------------------------------------


window.setInterval(function(){

  if( typeof MapName !== 'undefined'){
    var dataUrl = 'map/'+MapName+'/data/data.json';
    var xhr = $.ajax({
      url: dataUrl,
      success: function(response) {
        newData =  xhr.getResponseHeader("Last-Modified");
        if( newData !== oldData)
        {
          oldData = newData;
          loadProject($('#map-name'));
          Reloadmap();
        }

      }
    });
  };
}, 5000);

function colorpicker(){

  ColorinputRGBA();
  $('.GeoColor').colorpicker({
    parts:          'full',
    alpha:          false,
    showOn:         'both',
    buttonColorize: true,
    showNoneButton: true
  });
};


$(document).ready(function() {


 $.ajaxSetup({ cache: false });

 colorpicker();


 $('.OptionsCat').click(function(event) {
   CatAddjson();
 });


/*

  $('.chooseGeoCat2').change(function(event) {
    BaseGeoSelJSON($(this).val());
    Displaycat($(this).val());
  });

  $('.chooseGeoCat').change(function(event) {
    console.log($(this));
    BaseGeoSelJSON($(this).val());
    Displaycat($(this).val());
  });
*/

$('.Basemap').click(function(event) {

  $('.Basemap').removeClass('selected');
  $(this).addClass('selected');
  layerlink = $('#layerlink').val($(this).data('layer'));
  layerattribute = $('#layerattribute').val($(this).data('attr'))
  Changejson(layerlink); 
  Changejson(layerattribute); 
});




$('.tablepopup').click(function(event) {
  var url = 'TableEditor/table.php?map='+MapName ;
  window.open( url, null ,'width=710,height=555,left=160,top=170');
});



$('.sortable ').click(function(event) {


  $('#calquesCont').find('.sortable').find('input').each(function(index, el)
  {
    console.log($(this).prop('checked'));
    console.log(el);
    ChangejsonInputPopUp($(this))
  });
});

$('input').change(function(event) { 
  console.log('COUACK');
  ValEmptyAddClass($(this));
  if( $(this).attr('type') == 'checkbox')
  {
   ChangejsonInput($(this))
 }
 if( $(this).attr('type') == 'text')
 {
  Changejson($(this)); 
}


});



$('textarea').change(function(event) { 
  ValEmptyAddClass($(this));
  Changejson($(this)); 
  ValEmptyAddClass($(this));
});
$('select').change(function(event) { 
  Changejson($(this));
  ValEmptyAddClass($(this)); 
});



$('#NouveauProjet').click(function(event) {
  var MapName = $('#newMapName').val();
  $.ajax({
    url: 'functions/createmap.php',
    type: 'GET',
    data: {'mapname' : MapName },
  })
  .done(function(e) {
    console.log(e);
    console.log("success");
    var path = 'map/'+MapName+'/index.html';
    $('#projetList').load('Menu.php');

    console.log(path);
    $('#iframe').load('src', path);

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

});



$('#submit').click(function(event) {
  /* Act on the event */
  var color = document.getElementById("Geo-Color").value;
  $.ajax({
    url: 'functions/generateCartojs.php',
    type: 'GET',
    data: {'path': path2 , 'color':color },
  })
  .done(function(e) {
    supercontenu = e;
    test();

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

});

function test()
{
  $.ajax({
    url: 'functions/replacejs.php',
    type: 'GET',
    data: {'path': path2 , 'content': supercontenu },
  }).done(function(e) {console.log(e); 
    document.getElementById('iframe').contentWindow.location.reload(true);

  })
}


$('.Geo-opacity').change(function(event) {
  console.log( $(this).val() );
  $('.Geo-opacity').val($(this).val());
});

//ici c'est juste pour faire du sorting
$(function() {
  $( ".sortable" ).sortable();
  $( ".sortable" ).disableSelection();
  $('.sortable')
  .sortable({
   revert       : true,
   handle: '.handle',
   connectWith  : ".sortable",
   stop         : function(event,ui){ReInitPopupEl(event);}
 });
});

$('#save').click(function(event) {
  SaveJsonSettings();  /* Act on the event */
});


$('#apply-form input').blur(function()          //whenever you click off an input element
{                   
    if( !$(':input').val() ) {                      //if it is blank. 
     $(this).attr('class','empty');    
   }
 });

$('.accordeon-selecteur-contenu').click(function(event) {
  console.log($(this).parent('.accordeonSelecteur'));
  elmtSelectionne($(this).parent('.accordeonSelecteur'));  /* Act on the event */
});



$('.json-btn').click(function(event) {
  console.log();
  if ( $('#jsonParent').css('display') == 'block'){
    $('#jsonParent').css({
      'display': 'none',
      'max-height': '0px'
    });

  }
  else{
    $('#jsonParent').css({
      'display': 'block',
      'max-height': '3000px'
    });
  }
});


$("table").stupidtable();
$(function(){
      // Helper function to convert a string of the form "Mar 15, 1987" into
      // a Date object.
      var date_from_string = function(str){
        var Split = str.split( /\//);

        var Day = Split[0];
        var Month = Split[1];

        var SplitYear = Split[2].split(/\s/);

        var Year = SplitYear[0];
        var Split02 =  SplitYear[1].split( /:/ );
        var Hour = Split02[0];
        var Minutes = Split02[1];
        console.log(Split02);
/*        var pattern = "^([a-zA-Z]{3})\\s*(\\d{2}),\\s*(\\d{4})$";
        var re = new RegExp(pattern);

        var DateParts = re.exec(str); //.slice(1)
        console.log (DateParts)
        var Year = DateParts[2];
        var Month = $.inArray(DateParts[0].toLowerCase(), months);
        var Day = DateParts[1];*/
        return new Date(Year, Month, Day, Hour, Minutes);
      }
      var moveBlanks = function(a, b) {
        if ( a < b ){
          if (a == "")
            return 1;
          else
            return -1;
        }
        if ( a > b ){
          if (b == "")
            return -1;
          else
            return 1;
        }
        return 0;
      };
      var moveBlanksDesc = function(a, b) {
        // Blanks are by definition the smallest value, so we don't have to
        // worry about them here
        if ( a < b )
          return 1;
        if ( a > b )
          return -1;
        return 0;
      };
      var table = $("table").stupidtable({
        "date":function(a,b){
          // Get these into date objects for comparison.
          aDate = date_from_string(a);
          bDate = date_from_string(b);
          return aDate - bDate;
        },
        "moveBlanks": moveBlanks,
        "moveBlanksDesc": moveBlanksDesc,
      });
      table.on("beforetablesort", function (event, data) {
        // data.column - the index of the column sorted after a click
        // data.direction - the sorting direction (either asc or desc)
        $("#msg").text("Sorting index " + data.column)
      });
      table.on("aftertablesort", function (event, data) {
        var th = $(this).find("th");
        th.find(".arrow").remove();
        var dir = $.fn.stupidtable.dir;
        var arrow = data.direction === dir.ASC ? "&uarr;" : "&darr;";
        th.eq(data.column).append('<span class="arrow">' + arrow +'</span>');
      });
      $("tr").slice(1).click(function(){
        $(".awesome").removeClass("awesome");
        $(this).addClass("awesome");
      });
    });


$('.onglet').click(function(event) {
  ongletSelection($(this));
});

$('#creerProjet').click(function(event) {
  $('#CreerProjet').modal('show');        
});

ongletSelection($('.onglet.active'));


$('.layer-hide').click(function(event) {
  event.preventDefault();
});

$('#add-Geo').click(function(event) {

  var Nlayer="";
  var myObjLayer = JsonSettings['Layers']; 
  var myObjLayerlenght = Object.keys(myObjLayer).length; // le nombre de mes layers
  var Nlayer ;
  //'layer' + (myObjLayerlenght + 1); // le nouveau nom de mon layer
  
  var okay = 'B';

  for (var i = 0;  i < 300; i++)
  {
    var NewLayerName ='layer'+i;
    if (JsonSettings["Layers"][NewLayerName] == undefined)
    {
      Nlayer = NewLayerName;
      break;
    }
    

  };

  //--------------------------------------------------------------------------------
  
  // AJOUT DANS L'EDITEUR
  
  //--------------------------------------------------------------------------------
  var node = document.getElementById("Basemodelhtml").cloneNode(true);
  children = node.childNodes;

// EXPLICATION TREE TRAVERSING
//--------------------------------------------------------------------------------
// node.childNodes[1].childNodes[3].childNodes[3].nodeValue = "test";
// console.log(node.childNodes);
// console.log(node.childNodes[1].childNodes[3].childNodes[3].childNodes[0].nodeValue);
// node.childNodes[1].childNodes[3].childNodes[3].childNodes[0].nodeValue ="coucou" ;
//--------------------------------------------------------------------------------



function TreeNode(e)
{
  for (var i = 0; i < e.length; i++) {

    console.log(e[i].className );

    if(e[i].hasChildNodes() && e[i].id != 'titreCalque')
    {
     TreeNode(e[i].childNodes);
   }

   if( e[i].className == 'accordeonRubrique')
   {
    console.log('coucou')
    e[i].id = Nlayer ;

  }

  if( e[i].id == 'titreCalque')
  {
    e[i].childNodes[0].nodeValue = Nlayer ;
  }
};
}


TreeNode(node.childNodes);
node.id = Nlayer ; // Don't forget :)


var div = document.createElement('div');
  // modify node contents with DOM manipulation
  div.appendChild(node);
  document.getElementById('calquesCont').appendChild(div);

  //--------------------------------------------------------------------------------
  
  // AJOUT DANS LE JSON
  
  //--------------------------------------------------------------------------------

  // je créé le nouveau layer avec toutes ces propriétées
  JsonSettings['Layers'][Nlayer] = {"type":"GEO", "Name":Nlayer,"Ltype": "geojson",
  "GeoSelCat": "",
  "popup": {},"OptionsCat": {} };

  $('#json').html( JSON.stringify(JsonSettings,null,4)); // on Réaffiche les changement 
  SortableRefresh();


});



lock();
ColorinputRGBA();


});



