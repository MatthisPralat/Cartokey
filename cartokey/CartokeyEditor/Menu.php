<?php 


//	<!--////////////////////////////////////////////////////////////////////////////// -->

//	<!-- 					       MENU									   			   -->

//	<!--////////////////////////////////////////////////////////////////////////////// -->

// DESCRIPTION -------------------------------------------------------------------------->
// Ce menu regarde chaque documents dans un dossier spécifique. Il retiens les nom,
// les dates et les ajoutes dans un tableau qui pourra être trié

// end DESCRIPTION ---------------------------------------------------------------------->
date_default_timezone_set('Europe/Paris');
$dir    = 'map';
$files1 = scandir($dir);
$content = '';
$date= '';
$path= '';

/*sort($files1,SORT_NATURAL | SORT_FLAG_CASE);*/

$content .= '<table id="mytable"><thead><tr>' .
'<th id="th-name" data-sort="string" class="caseSort">Nom </th>' .
'<th id="th-date" data-sort="date">Date</th> ' .
'<th id="th-options" >Options</th>'.
'</tr></thead>' ;

$content .=  "<tbody>";
foreach ($files1 as $key) {



	if ($key != '..' && $key != '.' && $key != '_DS_Store' && $key != '.DS_Store') {
		$key2  = escapeshellcmd($key);
		$path = $dir.'/'. $key2 .'/index.html' ;
		$date = date("c", filemtime($path));
		$datetmy=  date("t/m/y", filemtime($path));
		$dateH =  date("H:i", filemtime($path));
		$content .=  "<tr>";
		$content .=  "<td class='td-name' onclick='loadProject(this)' >" . $key . '</td>';
		$content .=  "<td class='td-date'  data-date='". $date ."'>".$datetmy ."&nbsp;".$dateH.'</td>';
		$content .=  "<td class='td-options' > " . '<button> <i class="material-icons">mode_edit</i> </button>' .  '<button> <i class="material-icons">content_copy</i> </button>' . '<button> <i class="material-icons">delete_forever</i> </button>'  .    '</td>';
		$content .=  "</tr>";
	}
}
$content .=  "</tbody>";
$content .= "</table>";




echo $content;
?>