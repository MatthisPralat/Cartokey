<?php include("header.php"); ?>

<body>
	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!-- 					         TABLE BOUTTON									   -->



	<!--////////////////////////////////////////////////////////////////////////////// -->
	<button class="round-button tablepopup"> <i class="material-icons">border_all</i> <span>Table</span></button>
	<button class="round-button json-btn"> <i class="material-icons">code</i> <span>settings</span></button>


	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!-- 					          NAVIGATION									   -->



	<!--////////////////////////////////////////////////////////////////////////////// -->
	<nav id="mainnav" class="navbar">

		
		<div class="navBtnLat" id="sauver" > <i class="material-icons">save</i> <span onclick="REFRESH()">sauver</span></div>
		
		<div class="dropdown">

			<button type="button" id="MainNavBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">	
				<i class="material-icons">	menu 	</i>
			</button>

			<ul class="dropdown-menu" aria-labelledby="MainNavBtn">

				<li>
					<i class="material-icons">	folder 	</i> 
					<span data-toggle="modal" data-target="#myModal">Projets</span>
				</li>

				<li role="separator" class="divider"></li>

				<li>
					<i class="material-icons"> publish	</i> 
					<span data-toggle="modal" data-target="#myModal">Publier</span> 
				</li>

				<li>
					<i class="material-icons">	file_download	</i>
					<span data-toggle="modal" data-target="#myModal">Telecharger</span>
				</li>

			</ul>
		</div>
		<div id="map-name"></div>
	</nav>
	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!-- 					          MENULATERAL									   -->



	<!--////////////////////////////////////////////////////////////////////////////// -->
	<div id="menuLateral" >
		<!--////////////////////////////////////////////////////////////////////////////// -->



		<!-- 					          ONGLET PARAMETRE									   -->



		<!--////////////////////////////////////////////////////////////////////////////// -->
		<div class="onglet active" data-toggle="parametres">
			<i class="material-icons right">settings </i> 
		</div>
		<div class="onglet" data-toggle="calques">
			<i class="material-icons right">layers </i> 
		</div>
		<div class="onglet" data-toggle="selecteurLayer">
			<i class="material-icons">view_list</i>
		</div>
		<div class="clearfix"></div>
		
		<div id="parametres" class="ongletContainer">

			<!--////////////////////////////////////////////////////////////////////////////// -->

			<!-- 					          ACTIONS									   	   -->

			<!--////////////////////////////////////////////////////////////////////////////// -->


			<!--////////////////////////////////////////////////////////////////////////////// -->


			<!-- 					          Description									   -->


			<!--////////////////////////////////////////////////////////////////////////////// -->

			<div class="accordeonSelecteur">
				<div class="accordeon-selecteur-contenu">
					Description 

					<i class="material-icons material-animated right">keyboard_arrow_down </i> 
				</div>
			</div>
			<div class="accordeonRubrique">
				<div class="group col-xs-12">      
					<input type="text" name="TitreCarte" id="TitreCarte">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label for="TitreCarte">Titre de la carte</label>
				</div>
				<div class="group col-xs-12">      
					<input type="text" name="Auteur"  id="Auteur">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label for="Auteur">Auteur</label>
				</div>
				<div class="group col-xs-12">      
					<input type="text" name="copyright" id="copyright">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label for="copyright">copyright</label>
				</div>


				<div class="group col-xs-12">      
					<textarea class="col-xs-12" name="Description" id="Description"	rows="10" cols="30"> </textarea>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label for="TitreCarte6">Description</label>
				</div>		


				<div class="group col-xs-12">      
					<input type="text" name="copyright" id="redirection">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label for="redirection">Redirection URL</label>
				</div>


			</div>

			<!--////////////////////////////////////////////////////////////////////////////// -->


			<!-- 					         PROPRIETE CARTE									   -->


			<!--////////////////////////////////////////////////////////////////////////////// -->
			<div class="accordeonSelecteur">
				<div class="accordeon-selecteur-contenu">
					Propriété de carte

					<i class="material-icons material-animated right">keyboard_arrow_down </i> 
				</div>
			</div>		
			<div class="accordeonRubrique">
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<!-- 					         Boutons basemap								   -->
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<button class="col-xs-12 material-button-popup " data-toggle="modal" data-target="#modalBasemap"> <i class="material-icons">folder</i> <span > Basemap  </span> </button>

				<!--////////////////////////////////////////////////////////////////////////////// -->
				<!-- 					         Taille fenetre									   -->
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<label class="label-card">Taille de la fenetre</label>
				<div class="material-card">
					<div class="group col-xs-6">      
						<input type="number" name="copyright" id="tailleCarteWidth">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="copyright">largeur</label>
					</div>

					<div class="group col-xs-6">      
						<input type="number" name="copyright" id="tailleCarteHeight">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="copyright">hauteur</label>
					</div>
				</div>

				<!--////////////////////////////////////////////////////////////////////////////// -->
				<!-- 					        Zoom							   -->
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<label class="label-card" for="zoom">zoom</label>
				<div class="material-card">
					<div class="form-group">  
						<select id="MapZoom" class="form-control">
							<option value="Zoom0">0</option>
							<option value="Zoom1">1</option>
							<option value="Zoom2">2</option>
							<option value="Zoom3">3</option>
							<option value="Zoom4">4</option>
							<option value="Zoom5">5</option>
							<option value="Zoom6">6</option>
							<option value="Zoom7">7</option>
							<option value="Zoom8">8</option>
							<option value="Zoom8">9</option>
							<option value="Zoom8">10</option>
							<option value="Zoom8">11</option>
							<option value="Zoom8">12</option>
							<option value="Zoom8">13</option>
						</select>
					</div>
				</div>
				<button class="material-button" id="GetZoom"> Obtenir le zoom de la carte</button>
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<!-- 					       Position							   -->
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<label class="label-card" >Position</label>
				<div class="material-card">
					<div class="group col-xs-6">      
						<input type="number" name="positionX" id="lat">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="positionX">latitude</label>
					</div>

					<div class="group col-xs-6">      
						<input type="number" name="PositionY" id="lon">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="PositionY">longitude</label>
					</div>

				</div>
				<button class="material-button" id="GetPos"> Obtenir les coordonées de la carte</button>

			</div>
			<!--////////////////////////////////////////////////////////////////////////////// -->


			<!-- 					        OPTIONS CARTE									   -->


			<!--////////////////////////////////////////////////////////////////////////////// -->
			<div class="accordeonSelecteur">
				<div class="accordeon-selecteur-contenu">
					OPTIONS de carte
					<i class="material-icons material-animated right">keyboard_arrow_down </i> 
				</div>
			</div>		
			<div class="accordeonRubrique">

				<div class="top-15" ></div>
				<!--////////////////////////////////////////////////////////////////////////////// -->

				<!-- 					     OPTIONS CARTE						   				   -->

				<!--////////////////////////////////////////////////////////////////////////////// -->


				<!-- TITRE ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6 col-xs-offset-3">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="titre" name='titre'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="PositionY">Titre</label>
					</div>
				</div>
				<!-- PARTAGER ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="partager" name='partager'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="PositionY">partager</label>
					</div>
				</div>
				<!-- PLEINS ECRANS ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="pleinEcrans" name='pleinEcrans'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="pleinEcrans">Plein écrans</label>
					</div>
				</div>

				<!-- CONTROLE DU ZOOM ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="zoomcontrol" name='zoomcontrol'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="PositionY">Controles du zoom</label>
					</div>
				</div>

				<!-- SE DEPLACER ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="deplacement" name='deplacement'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="deplacement">Se déplacer</label>
					</div>
				</div>

				<!-- ZOOM MOLETTE ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="molletteZoom" name='molletteZoom'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="molletteZoom">zoom molette</label>
					</div>
				</div>

				<!-- CALQUES SELECTIONS ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="selecteur" name='selecteur'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="selecteur">Selection des calques</label>
					</div>
				</div>

				<!-- LEGENDE ////////////////////////////////////////////////////////////////////////////// -->

				<div class="col-xs-6">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="legend" name='Legende'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="legend">Legende</label>
					</div>
				</div>


				<!-- End options ////////////////////////////////////////////////////////////////////////////// -->
			</div>


			<!--////////////////////////////////////////////////////////////////////////////// -->

			<!-- 					      SELECTEUR									  		   -->

			<!--////////////////////////////////////////////////////////////////////////////// -->

			<div class="accordeonSelecteur">
				<div class="accordeon-selecteur-contenu">
					Legende
					<i class="material-icons material-animated right">keyboard_arrow_down </i> 
				</div>
			</div>		
			<div class="accordeonRubrique">
			

				<!--/// Ici j'ai besoin d'avoir une liste avec description et input de couleur -->
				<div class="top-15" ></div>

				

				<div class="material-card">
					<div id="staticlegend" class="sortable" >
				
					</div>
					<button onclick="CreerCarre()">Carré</button>
					<button onclick="Creerhtml()">Html</button>
					

				</div>


				<div class="clearfix"></div>

				<div class="top-15" ></div>
				<!-- ACTIVER SELECTEUR ////////////////////////////////////////////////////////////////////////////// -->
				<div class="col-xs-6 col-xs-offset-3">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="selecteur" name='selecteur'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="Legende">Legende</label>
					</div>
				</div>

				<div class="clearfix"> </div>


				<!-- end SELECTEUR ////////////////////////////////////////////////////////////////////////////// -->
			</div>	


			<!--////////////////////////////////////////////////////////////////////////////// -->











			<!-- 					          ONGLET 2									   	   -->
			<!-- 					          CALQUES									   	   -->










			<!--////////////////////////////////////////////////////////////////////////////// -->
		</div>

		<div id="calques" class="ongletContainer">

			<div class="ajtCalq">
				<button class="ajtBtn" id="add-Geo">
					<i class="material-icons">language</i>		
				</button>
				<button class="ajtBtn" id="add-Mark">
					<i class="material-icons">add_location</i>		
				</button>
		<!-- 		<button class="ajtBtn" id="add-pin">
			<i class="material-icons">remove</i>	
		</button>
		<button class="ajtBtn" id="add-pin">
			<i class="material-icons">signal_cellular_null</i>
		</button> -->
	</div>

	<div id="calquesCont">
		<!--////////////////////////////////////////////////////////////////////////////// -->

		<!-- 					       GEOMETRIE CARTE									   -->

		<!--////////////////////////////////////////////////////////////////////////////// -->
		<div class="accordeonSelecteur">
			<button class="layer-hide">
				<i class="material-icons">visibility</i>
			</button>
			<div class="accordeon-selecteur-contenu">
				<i class="material-icons">language</i>
				Mon Geojson 1
				<i class="material-icons material-animated  right">keyboard_arrow_down </i> 	
			</div>	
		</div>		


		<div class="accordeonRubrique">



			<div class="col-xs-12 row"><h4>categories</h4></div>

			<div class="form-group col-xs-12 row">
				<div class="materialcard">
					<select id="chooseGeoCat2" class="col-xs-12">
						<option value="none">none</option>
						<h3>BaseMap</h3>
					</div>
					<div class="clearfix"></div>
					<div class="btn tablepopup">Table</div>
					<div class="col-xs-12 row"></div><h4>popup</h4>
					<ul class="sortable"></ul> <!-- comment  C'est ici qu'on load les syteme de popup-->
					<div class="col-xs-12 row"><h3>Geometry</h3></div>
					<div class="col-xs-12 row"><h4>Base color</h4></div>
					<div class="form-group">
						<input id="base-GeoColor" type="text" class="GeoColor" value="fe9810">
					</div>

				</select>
			</div>
			<div id="OptionsCat2"></div>
		</div>
		<!--////////////////////////////////////////////////////////////////////////////// -->

		<!-- 					      EX GEOJSON 2									   -->

		<!--////////////////////////////////////////////////////////////////////////////// -->
		<div class="accordeonSelecteur">
			<button class="layer-hide">
				<i class="material-icons">visibility</i>
			</button>
			<div class="accordeon-selecteur-contenu">
				<i class="material-icons">language</i>
				Mon Geo json 2
				<i class="material-icons material-animated  right">keyboard_arrow_down </i> 		
			</div>
		</div>		


		<div class="accordeonRubrique">

			<label class="label-card" for="zoom">Collone à afficher</label>
			<div class="material-card">
				<div class="form-group">  
					<select class="chooseGeoCat" class="form-control">

					</select>
				</div>
			</div>
			<div class="form-group">
				<input id="base-GeoColor" type="text" class="GeoColor" value="fe9810">
			</div>
			<div id="OptionsCat"></div>
			<div class="clearfix"></div>






		</div>

		<!--////////////////////////////////////////////////////////////////////////////// -->

		<!-- 					       PINS	 Test 								   -->

		<!--////////////////////////////////////////////////////////////////////////////// -->
		<div class="accordeonSelecteur">
			<button class="layer-hide">
				<i class="material-icons">visibility</i>
			</button>
			<div class="accordeon-selecteur-contenu">
				<i class="material-icons">place</i>
				Marqueurs 1 
				<i class="material-icons material-animated right">keyboard_arrow_down </i> 
			</div>
		</div>
		<div class="accordeonRubrique">

			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					      HEADER 								  			   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<label class="label-card">Header</label>
			<div class="material-card">
				<div class="col-xs-12">
					<div class="group">      
						<input type="checkbox"  data-toggle="toggle" id="headerPopup" name='Legende'>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label for="headerPopup">Header de la popup</label>
					</div>

					<label class="label-card" for="zoom">Collone à afficher</label
						<div class="form-group">  
							<select class="chooseGeoCat" class="form-control">

							</select>
						</div>

					</div>
				</div>
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<!-- 					      CONTENU 								  			   -->
				<!--////////////////////////////////////////////////////////////////////////////// -->
				<label class="label-card" for="zoom">Collone à afficher</label>
				<div class="material-card">
					<div class="form-group">  
						<select class="chooseGeoCat" class="form-control">

						</select>
					</div>
				</div>
				<div class="form-group">
					<input id="base-GeoColor" type="text" class="GeoColor" value="fe9810">
				</div>
				<div id="OptionsCat"></div>
				<div class="clearfix"></div>





			</div>
		</div>

		<!--////////////////////////////////////////////////////////////////////////////// -->









		<!-- 					          ONGLET 3									   	   -->
		<!-- 					          SELECTEUR									   	   -->










		<!--////////////////////////////////////////////////////////////////////////////// -->
		<div class="clearfix"></div>
		<div id="selecteurLayer" class="ongletContainer">

			<div id="SelecteurContnair" >

				<div class="accordeonSelecteur">
					<div class="accordeon-selecteur-contenu">
						Affichage de base 

						<i class="material-icons material-animated right">keyboard_arrow_down </i> 
					</div>
				</div>
				<div class="accordeonRubrique">

					<label class="label-card" for="zoom">Collone à afficher</label>
					<div class="material-card">
						<div class="form-group">  
							<div class="chosselayer">

							</div>
						</div>
					</div>


				</div>

				<button onclick="AddSelecteur()"> + </button>
			</div>
			<div class="clearfix"></div>
			<button class="col-xs-12 dft-btn" onclick="AddSelecteur()">+ bouton</button>

		</div>







		<!--////////////////////////////////////////////////////////////////////////////// -->









		<!-- 					          END NAV									   	   -->










		<!--////////////////////////////////////////////////////////////////////////////// -->



	</div>








	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!-- 					          CONTENEUR									   	   -->



	<!--////////////////////////////////////////////////////////////////////////////// -->

	<div id='ArticleConteneur'>
		<iframe id="iframe" src="" frameborder="0"></iframe>
	</div>



	<!--////////////////////////////////////////////////////////////////////////////// -->
	<!--////////////////////////////////////////////////////////////////////////////// -->
	<!--////////////////////////////////////////////////////////////////////////////// -->







	<!-- 					         	 MODAL								   	  	   -->







	<!--////////////////////////////////////////////////////////////////////////////// -->
	<!--////////////////////////////////////////////////////////////////////////////// -->
	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!--////////////////////////////////////////////////////////////////////////////// -->

	<!-- 					         	 MODAL	1							   	  	   -->

	<!--////////////////////////////////////////////////////////////////////////////// -->
	<div class="container">
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Mes Projets</h4>
					</div>
					<div class="modal-body">
						<div class="Projet" id="projetList">
							<?php 
							include 'Menu.php';
							?>
						</div>
					</div>
					<div class="modal-footer">
						<button id="creerProjet"><i class="material-icons">create_new_folder</i><span>Nouveau projet</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--////////////////////////////////////////////////////////////////////////////// -->

	<!-- 					         	 MODAL	2							   	  	   -->

	<!--////////////////////////////////////////////////////////////////////////////// -->
	<div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Informations du pays</h4>
				</div>
				<div class="modal-body">
					<div class="Projet">

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div id="jsonParent" class="preformatted" style="display:none;">
		<div id="json"></div>
	</div>
	<!--////////////////////////////////////////////////////////////////////////////// -->

	<!-- 					         	 MODAL	BASEMAP							   	   -->

	<!--////////////////////////////////////////////////////////////////////////////// -->
	<div class="modal fade" id="modalBasemap" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Base map</h4>
				</div>
				<div class="modal-body">
					<h4>fond de couleur</h4>

					<label for="layerlink"> liens de la map </label>
					<input type="text" id="layerlink">
					<label for=""> Attibution </label>
					<input type="layerattribute" id="layerattribute">

					<div class="form-group">
						<input id="base-GeoColor" type="text" class="GeoColor" value="fe9810">
					</div>
					<!--////////////////////////////////////////////////////////////////////////////// -->
					<!-- 					         	 TLE						   	  			   -->
					<!--////////////////////////////////////////////////////////////////////////////// -->
					<h4>touteLeurope</h4>

					<div class="Basemap selected col-xs-3" data-img="" data-href="" data-description=""><div class="BasemapDescription">coucou</div></div>
					<div class="clearfix"></div>

					<!--////////////////////////////////////////////////////////////////////////////// -->
					<!-- 					         	 CARTODB						   	   		   -->
					<!--////////////////////////////////////////////////////////////////////////////// -->
					<h4>Cartodb</h4>
					<div class="basemapcontnair">
						<div class="Basemap col-xs-3" data-img="" data-layer="http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png" 		       		data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(http://a.basemaps.cartocdn.com/light_nolabels/6/30/24.png)"	                data-description=""><div class="BasemapDescription">Positron</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="http://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png" 		       		data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(http://a.basemaps.cartocdn.com/dark_nolabels/6/30/24.png)"	                data-description=""><div class="BasemapDescription">Dark matter</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="http://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png"          	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(https://cartodb-basemaps-a.global.ssl.fastly.net/light_all/6/30/24.png)"	data-description=""><div class="BasemapDescription">Positron (lite)</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="http://{s}.basemaps.cartocdn.com/dark_nolabels/{z}/{x}/{y}.png"           	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(http://a.basemaps.cartocdn.com/dark_nolabels/6/30/24.png)"	                data-description=""><div class="BasemapDescription">Dark matter (lite)</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-antique/{z}/{x}/{y}.png"  	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(https://cartocdn_a.global.ssl.fastly.net/base-antique/6/30/24.png)"			data-description=""><div class="BasemapDescription">CartoDB World Antique</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-eco/{z}/{x}/{y}.png"      	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(https://cartocdn_a.global.ssl.fastly.net/base-eco/6/30/24.png)"	            data-description=""><div class="BasemapDescription">CartoDB World Eco</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-flatblue/{z}/{x}/{y}.png" 	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(https://cartocdn_a.global.ssl.fastly.net/base-flatblue/6/30/24.png)"	    data-description=""><div class="BasemapDescription">CartoDB World Flat Blue</div></div>
						<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-midnight/{z}/{x}/{y}.png" 	data-attr="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors, &copy; <a href='https://cartodb.com/attributions'>CartoDB</a>"	style="background-image:url(https://cartocdn_a.global.ssl.fastly.net/base-midnight/6/30/24.png)"	    data-description=""><div class="BasemapDescription">CartoDB World base-midnight</div></div>

						<div class="clearfix"></div>

					</div>
					<!--////////////////////////////////////////////////////////////////////////////// -->
					<!-- 					         	 NOKIA						   	   -->
					<!--////////////////////////////////////////////////////////////////////////////// -->
					<h4>Nokia</h4>
					<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-midnight/{z}/{x}/{y}.png" 		data-attr="<div class='leaflet-control-attribution leaflet-control'>©2016 HERE <a href='http://here.net/services/terms' target='_blank'>Terms of use</a>"style="background-image:url(https://1.maps.nlp.nokia.com/maptile/2.1/maptile/newest/normal.day/6/30/24/256/png8?lg=eng&token=A7tBPacePg9Mj_zghvKt9Q&app_id=KuYppsdXZznpffJsKT24)"	data-description=""><div class="BasemapDescription">CartoDB World base-midnight</div></div>
					<div class="Basemap col-xs-3" data-img="" data-layer="https://cartocdn_{s}.global.ssl.fastly.net/base-midnight/{z}/{x}/{y}.png" 		data-attr="<div class='leaflet-control-attribution leaflet-control'>©2016 HERE <a href='http://here.net/services/terms' target='_blank'>Terms of use</a>"style="background-image:url(https://1.maps.nlp.nokia.com/maptile/2.1/maptile/newest/normal.day/6/30/24/256/png8?lg=eng&token=A7tBPacePg9Mj_zghvKt9Q&app_id=KuYppsdXZznpffJsKT24)"	style="background-image:url(https://1.maps.nlp.nokia.com/maptile/2.1/maptile/newest/normal.night/6/30/24/256/png8?lg=eng&token=A7tBPacePg9Mj_zghvKt9Q&app_id=KuYppsdXZznpffJsKT24)"	data-description=""><div class="BasemapDescription">CartoDB World base-midnight</div></div>

					<div class="clearfix"></div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!--////////////////////////////////////////////////////////////////////////////// -->



	<!-- 					         	 MODAL ACTIONS								   -->



	<!--////////////////////////////////////////////////////////////////////////////// -->


	<!--////////////////////////////////////////////////////////////////////////////// -->

	<!-- 					         	 CREERPROJET								   	  	   -->

	<!--////////////////////////////////////////////////////////////////////////////// -->
	<div class="modal fade" id="CreerProjet" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nom du projet</h4>
				</div>
				<div class="modal-body">
					<div class="Projet">
						<!-- ///////////////////////////////// TEXTE  NOM ///////////////////////////////// -->
						<div class="group col-xs-12">      
							<input type="text" name="newMapName" id="newMapName">
							<span class="highlight"></span>
							<span class="bar"></span>
							<label for="newMapName">Entrez le nom du projet</label>
						</div>
					</div>
				</div>
				<div class="clearfix">	</div>
				<div class="modal-footer">
					<button id="NouveauProjet" class="Validate">	Valider </button>
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				</div>
			</div>
		</div>
	</div>


	<div id="Basemodelhtml">
		<div class="accordeonSelecteur " onclick="elmtSelectionne($(this))">
			<button class="layer-hide">
				<i class="material-icons">visibility</i>
			</button>
			<div class="accordeon-selecteur-contenu">
				<i class="material-icons">language</i>
				<span id="titreCalque" contenteditable="true">
					Mon Geo json 2
				</span>
				<i class="material-icons material-animated  right">keyboard_arrow_down </i> 		
			</div>
		</div>		


		<div class="accordeonRubrique">

			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	SEL COLLONE							   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<label class="label-card" for="zoom" >Collone à afficher</label>
			<div class="material-card">
				<div class="form-group">  
					<select class="chooseGeoCat" class="form-control" onchange="chooseGeoCat($(this))">

					</select>
				</div>
			</div>
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	 CHOISIR LES COULEURS						   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->

			<div class="form-group">
			</div>


			<label class="label-card" for="zoom">Couleurs Geometrie</label>
			<div class="material-card">
				<div class="form-group" id="OptionsCat">  

				</div>
			</div>

			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	 SEL POPUP								   	  	   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<label class="label-card" for="zoom"> popup</label>
			<div class="material-card">
				<div class="form-group">  
					<div class="sortable"></div>
				</div>
			</div>


			<button class="CalqueDel" onclick="CalqueDel($(this))"> Supprimer</button>

			<div class="clearfix"></div>






		</div>
	</div>

	<div id="Basemodelhtml">
		<div class="accordeonSelecteur " onclick="elmtSelectionne($(this))">
			<button class="layer-hide">
				<i class="material-icons">visibility</i>
			</button>
			<div class="accordeon-selecteur-contenu">
				<i class="material-icons">language</i>
				<span id="titreCalque" contenteditable="true">
					Mon Geo json 2
				</span>
				<i class="material-icons material-animated  right">keyboard_arrow_down </i> 		
			</div>
		</div>		


		<div class="accordeonRubrique">

			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	SEL COLLONE							   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<label class="label-card" for="zoom" >Collone à afficher</label>
			<div class="material-card">
				<div class="form-group">  
					<select class="chooseGeoCat" class="form-control" onchange="chooseGeoCat($(this))">

					</select>
				</div>
			</div>
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	 CHOISIR LES COULEURS						   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->

			<div class="form-group">
			</div>


			<label class="label-card" for="zoom">Couleurs Geometrie</label>
			<div class="material-card">
				<div class="form-group" id="OptionsCat">  

				</div>
			</div>

			<!--////////////////////////////////////////////////////////////////////////////// -->
			<!-- 					         	 SEL POPUP								   	  	   -->
			<!--////////////////////////////////////////////////////////////////////////////// -->
			<label class="label-card" for="zoom"> popup</label>
			<div class="material-card">
				<div class="form-group">  
					<div class="sortable"></div>
				</div>
			</div>


			<button class="CalqueDel" onclick="CalqueDel($(this))"> Supprimer</button>

			<div class="clearfix"></div>






		</div>
	</div>
	<!--////////////////////////////////////////////////////////////////////////////// -->
	
	<!-- 					         	 MODELE SELECTION							   -->
	
	<!--////////////////////////////////////////////////////////////////////////////// -->

	<div id="SelecteurModel">


		<div class="accordeonSelecteur" onclick="elmtSelectionne($(this))">
			<div class="accordeon-selecteur-contenu">
				<span id="titreCalque" contenteditable="true">
					Mon Geo json 2
				</span>
				<i class="material-icons material-animated right">keyboard_arrow_down </i> 
			</div>
		</div>
		<div class="accordeonRubrique">

			<label class="label-card" for="zoom">Calques à afficher</label>
			<div class="material-card">
				<div class="form-group">  
					<div class="chosselayer">

					</div>
				</div>
			</div>
			<button class="CalqueDel" onclick="DeleteSelecteur($(this))"> Supprimer</button>

			<div class="clearfix"></div>
		</div>	

	</div>

</body>
</html>
<!-- 
