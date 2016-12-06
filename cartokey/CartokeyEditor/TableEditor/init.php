<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->




<!-- /*                                         TABLE                                       */ -->




<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->



<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
<!-- /*                                  DESCRIPTION                                        */ -->
<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
<!-- Cet outil génere des tables à partir de fichier json. Dans ce cas particulier le json est lié -->
<!-- avec une autre table geojson -->
<!-- 
  Dans un premier temps, -->





  <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <title>Document</title>
   <!-- Jquery -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
   <script src="jquery.dragtable.js"></script>
   <script src="stupidtable.js?dev"></script>
   <link rel="stylesheet" type="text/css" href="http://akottr.github.io/css/reset.css" />
   <!--   <link rel="stylesheet" type="text/css" href="http://akottr.github.io/css/akottr.css" /> -->
   <link rel="stylesheet" type="text/css" href="dragtable.css" />
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="../js/Bootstrap/css/bootstrap.min.css">
   <!-- Optional theme -->
   <link rel="stylesheet" href="../js/Bootstrap/css/bootstrap-theme.min.css">
   <!-- Latest compiled and minified JavaScript -->
   <script src="../js/Bootstrap/js/bootstrap.min.js"></script>

   <!-- Latest compiled and minified CSS -->

   <!--Google Icons-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <script src="js/main.js"></script>
 </head>
 <body>



  <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->



  <!-- /*                                  NAVIGATION                                        */ -->



  <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->


  <nav id="mainnav" class="navbar">
    <button id="show-json"><i class="material-icons">code</i></button>
    <div id="searchbox">
      <i class="material-icons">search</i><input type="text" id="search" placeholder="Type to search..." />
    </div>
    <div class="dropdown">

      <button type="button" id="MainNavBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
        <i class="material-icons">  menu  </i>
      </button>

      <ul class="dropdown-menu" aria-labelledby="MainNavBtn">

        <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

        <!-- /*                                  OPTIONS                                        */ -->

        <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

        <li class="showjson">
          Voir le  " JSON " 
        </li>
        <li class="save">
          sauver
        </li>
        <li>
          changer
        </li>
        <li>
          exporter
        </li>
        <li>
          fussioner
        </li>

      </ul>
    </div>

  </nav>  



<!-- 
<button class="showjson">           montrer le json                         </button>
<button class="NewCol">             Nouvelle collone                        </button>
-->

</nav>


<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

<!-- /*                                  VARIABLES                                        */ -->

<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
$map = $_GET['map'];
$filename = "../map/".$map."/data/data.json";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
$arr = json_decode($contents, true);

?>

<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
<!-- /*                                  Container                                        */ -->
<!--/* //////////////////////////////////////////////////////////////////////////////////// */-->


<div id='container' >
  <table id='onlyHeaderTable' class='' cellspacing='1'>
    <div class='mycheck'>


      <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
      <!-- /*                                  Boucle                                             */ -->
      <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->


      <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
      <!-- /*                          AFFICHER LES COLONNES                                      */ -->
      <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
      <?php
      foreach ($arr[1] as $key => $value) {

        echo "<span><label for=".$key.">".$key."</label>
        <input type='checkbox' name=".$key." checked></span>
        ";
      }


      echo "</div>";
      $max = count($arr);

      echo "<thead>";
      echo "<tr>";
      echo "<th></th>";


// <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
// <!--                           TABLES HEADERS                                       -->
// <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

      foreach ($arr[0] as $key => $value) {
// <!--//////////////////////////ADMIN-FR //////////////////////////////////////////  -->
        if($key == 'admin_fr'){
          echo "<th data-sort='string' style='background-color:#f1413c;'data-properties=".$key." headers='data'><div class='some-handle'></div>";
          echo "<div class='th-name'>";
          echo ($key);
          echo "</div>";
          echo "<span class='resizecol '></span>";
          echo "<span class='sortbtn mybtn'><i class='material-icons md-18'>&#xE053;</i></span>";
          echo "</th>";
        }
  // <!--///////////////////////AUTRES//////////////////////////////////////  -->
        else{
          echo "<th data-sort='string' data-properties=".$key." headers='data'><div class='some-handle'></div>";
          echo "<div class='th-name'>";
          echo ($key);
          echo "</div>";
          echo "<span class='resizecol '></span>";
          echo "<span class='NewCol  mybtn'><i class='material-icons md-18'>content_copy</i></span>";
          echo "<span class='deletecol mybtn'><i class='material-icons md-18'>delete</i></span>";
          echo "<span class='sortbtn mybtn'><i class='material-icons md-18'>&#xE053;</i></span>";
          echo "</th>";
        }
      }
      echo "<th data-sort='string'   data-properties='type' headers='test' class='GeoData'>type</th>";
      echo "<th data-sort='string'   data-properties='coordinates'  headers='test' class='GeoData' >coordinates</th>";
      echo "</tr>";



      echo "</thead>";
      echo " <tbody>";
// <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->
// <!--                           TABLES CELL                                       -->
// <!--/* //////////////////////////////////////////////////////////////////////////////////// */-->

      for ($i= 0 ; $i < $max ; $i++) { 
        echo "<tr>";
        echo "<td>".( $i + 1) ."</td>";

        foreach ($arr[$i] as $key => $value) {
         if($key == 'admin_fr')
         {
          echo "<td class='properties'   contenteditable='false' data-properties=".$key.">";
          echo htmlentities($value);
          echo "</td>";
        }
        else{
          echo "<td class='properties' contenteditable='true' data-properties=".$key.">";
          echo htmlentities($value);
          echo "</td>";
        }
      }
      echo "<td class='type' data-properties='type' >";
      echo($arr['features'][$i]['geometry']['type']);
      echo "</td>";

      echo "</tr>";
    }
    ?>
  </tbody>
</table>
</div>

<div id="jsonParent" class="preformatted" style="display:none;">
  <div id="json" ></div>
</div>


<script>

$('.NewCol').click(function(event) {
  var newname = prompt("Hop, entre un nouveau nom pour la collone", "ex:Harry Potter");
  if (newname != null) {
    newname = newname.split(' ').join('_');
    $('thead').find('tr').each(function(){
      $(this).append(
        '<th data-sort="string" data-properties="'+newname+'" headers="data">'
        +' <div class="some-handle">'
        +'</div>'
        +' <div class="th-name">'
        +newname
        +'   </div>'
        +'<span class="resizecol ">'
        +'</span>'
        +' <span class="NewCol  mybtn">'
        +'<i class="material-icons md-18">'
        +'content_copy</i>'
        +'</span>'
        +' <span class="deletecol mybtn">'
        +'        <i class="material-icons md-18">'
        +'delete'
        +'</i>'
        +'</span>'
        +'<span class="sortbtn mybtn">'
        +'<i class="material-icons md-18">'
        +''
        +' </i>'
        +'</span>'
        + '</th>') ;


        $('tbody').find('tr').each(function(){
          $(this).append(
            '<td class="properties" contenteditable="true" data-properties="'+newname+'"></td>'
            );
        });
      });
    }
  });


// $('.duplicatecol').click(function(event) {
//   var clone = $(this).parents('td').clone();
//   clone.find('selector')
//   console.log(clone)
//   $('tbody').prepend(clone);
// });


$('.dupliquerlaligne').click(function(event) {
  var clone = $(this).parents('tr').clone();
  clone.find('selector')
  console.log(clone)
  $('tbody').prepend(clone);
});


$('#onlyHeaderTable').dragtable({maxMovingRows:1,dragHandle:'.some-handle'});
$("#onlyHeaderTable").stupidtable();
$("#search").keyup(function(){
  _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#onlyHeaderTable tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
         else
           $(this).show();                
       });
      }); 

$(function(){
        // Helper function to convert a string of the form "Mar 15, 1987" into a Date object.
        var date_from_string = function(str) {
          var months = ["jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec"];
          var pattern = "^([a-zA-Z]{3})\\s*(\\d{1,2}),\\s*(\\d{4})$";
          var re = new RegExp(pattern);
          var DateParts = re.exec(str).slice(1);
          var Year = DateParts[2];
          var Month = $.inArray(DateParts[0].toLowerCase(), months);
          var Day = DateParts[1];
          return new Date(Year, Month, Day);
        }
        var table = $("table").stupidtable({
          "date": function(a,b) {
            // Get these into date objects for comparison.
            aDate = date_from_string(a);
            bDate = date_from_string(b);
            return aDate - bDate;
          }
        });
        table.on("beforetablesort", function (event, data) {
          // Apply a "disabled" look to the table while sorting.
          // Using addClass for "testing" as it takes slightly longer to render.
          $("#msg").text("Sorting...");
          $("table").addClass("disabled");
        });
        table.on("aftertablesort", function (event, data) {
          // Reset loading message.
          $("#msg").html("&nbsp;");
          $("table").removeClass("disabled");
          var th = $(this).find("th");
          th.find(".arrow").remove();
          var dir = $.fn.stupidtable.dir;
          var arrow = data.direction === dir.ASC ? "&uarr;" : "&darr;";
          th.eq(data.column).append('<span class="arrow">' + arrow +'</span>');
        });
      });
$(function() {
  var pressed = false;
  var start = undefined;
  var startX, startWidth;

  $(".resizecol").mousedown(function(e) {
    start = $(this).parent('th');
    pressed = true;
    startX = e.pageX;
    startWidth = $(this).parent('th').width();
    startWidth2 = $('table').width();
    $(start).addClass("resizing");
  });

  $(document).mousemove(function(e) {
    if(pressed) {
      $(start).width(startWidth+(e.pageX-startX));
      console.log(startX);
      $('table').width( startWidth2+(e.pageX-startX))
    }
  });

  $(document).mouseup(function() {
    if(pressed) {
      $(start).removeClass("resizing");
      pressed = false;
    }
  });
});
</script>

<script>
$("[name='coordinates']").attr('checked', false); // Unchecks it
$("[data-properties='coordinates']").hide();
$("[name='type']").attr('checked', false); // Unchecks it
$("[data-properties='type']").hide();



$(':checkbox').change(function(event) {
   // console.log(event); /* Act on the event */
   // if ($(this).attr()= 'checked'){
   //  console.log('checked');
     // };
     var dataProperties = $(this).attr('name');
     


     if($(this).context.checked === false)
     {
      console.log('pas check');
      $("[data-properties="+dataProperties+"]").hide();
    }
    if($(this).context.checked === true)
    {
      console.log('c\'est chécké');
      $("[data-properties="+dataProperties+"]").show();
    }

    if($(this).context.checked === false)
    {
      console.log('pas check');
      $("[data-properties="+dataProperties+"]").hide();
    }
    if($(this).context.checked === true)
    {
      console.log('c\'est chécké');
      $("[data-properties="+dataProperties+"]").show();
    }

  });
</script>


<script>


var MapDir = <?php echo '"'. $_GET['map'] . '"'?>;
var Newjson={}; // ici pour avoir l'entiereté de mon json

$('.suprRow').click(function(event) {
 $(this).parents('tr').remove();
});

$('.deletecol').click(function(event) {
 dataProperties = $(this).parents('th').attr('data-properties');
 $("[data-properties="+dataProperties+"]").remove()

});

function SaveJson()
{
  var test =JSON.stringify(Newjson);
  var newmap = <?php echo '"' . $map . '"' ;?> ;
  $.ajax({
    url: 'Savejson.php',
    type: 'POST',
    data: { 
      content:test, 
      map: newmap
    }
  })
  .done(function(e) {
    console.log(e + "success");
    Newjson = $.parseJSON(test);
  })
  .fail(function(e) {
    console.log("error");
  })
  .always(function(e) {
    console.log(e);
    console.log("complete");
  });
  
}





$('.save').click(function(event) {
 createJSON();
 SaveJson();
});




$('#show-json').click(function(event) {

  createJSON();

});


function createJSON() {

Newjson=[];          // ici pour avoir l'entiereté de mon json

var objname;
var objvalue;


$('tbody').find('tr').each(function(index, el){
  i = index;
  Newjson[i] = {};

  console.log(Newjson);
  $(this).children('td').each(function(index, el) {

    if ($(this).attr('class') === 'properties'){
      objname = $(this).attr("data-properties");
      objvalue =  $(this).text();
      Newjson[i][objname] = objvalue; 
    }

  })

});

Newjson.shift();
console.log(JSON.stringify(Newjson));

$('#json').html(JSON.stringify(Newjson));
}




</script>

</body>
</html>