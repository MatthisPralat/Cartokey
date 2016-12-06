<?php 

// PREPARATION -------------------------------------- //
//Voilà les parametres de mon json qui seront ensuite transmis dans le js du projet
	//Je recupere les preferences de l'utilisateur dans le fichier qu'il à modifié.
	//
$path = $_GET['path'];
$color = $_GET['color'];
$json_string = '../'.$path.'/settings.json';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
// echo "<pre>";
//  print_r($obj);
// echo $obj["main"]["tiles_loader"] ;
$maindata =$obj["main"];
$sqlStartData =$obj["SQLstart"];
//
// Script -------------------------------------- //
//Etapes 1.
	//je dois ecrire un fichier js avec des if partout
	//en fonction du choix de l'utilisateur je modifie le cartocss

//Pour commencer quand l'utilisateur initialise ça map 


//-I - Toujours ecrire la base jquery
//C'est dans Sql start que j'initialise les parametres de l'utilisateurs.
// echo $sqlStartData["cartocss"]["couleur"];
echo "$(document).ready(function(){
var SQLstart = true;";

//2-INITIALISATION DE LA MAP------------
 echo "
 function main() 
   {
      cartodb.createVis( 'map' , 'https://cartokey.cartodb.com/api/v2/viz/c741bd68-1e84-11e6-8e79-0e674067d321/viz.json', {
      tiles_loader: ".$maindata["tiles_loader"].",
      center_lat: ".$maindata["center_lat"].",
      center_lon: ".$maindata["center_lon"].",
      share: ".$maindata["share"].",
      search:".$maindata["search"].",
      zoom: ".$maindata["zoom"].",
    })
    .done(function(vis, layers) {
          var subLayer = layers[1].getSubLayer(0);
            createSelector(subLayer);
        })
    .error(function(err) {
      console.log(err);
    });
  };
main();
";
//       cartocss =".'"'.#carte_du_monde_des_financements_europeens_1_merge{polygon-fill:".$sqlStartData["cartocss"]["couleur"];.";polygon-opacity:".$sqlStartData["cartocss"]["opacity"];.";line-color:".$sqlStartData["cartocss"]["boder"];.";line-width: 0.5;line-opacity:".$sqlStartData["cartocss"]["boder-opacity"];.";}";

//3-INITIALISATION DE LA GEOMETRIE------------
echo "
function createSelector(layer)
  { 
    if(SQLstart == true)
      {
        query =".'"'.$sqlStartData["query"].'"'.";
        cartocss =".'"'."#carte_du_monde_des_financements_europeens_1_merge{polygon-fill:".$color.";}".'"'.";

         layer.setSQL(query);
        layer.setCartoCSS(cartocss);
        SQLstart =false;
      }
  }";
echo "});";



 ?>