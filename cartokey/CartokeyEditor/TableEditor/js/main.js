$(document).ready(function() {


 $.ajaxSetup({ cache: false });


	$('#show-json').click(function(event) {
		console.log($('#jsonParent').css('display') );

		if ( $('#jsonParent').css('display') == 'block') 
		{
			$('#jsonParent').css('display', 'none');
		}
		else
		{
			$('#jsonParent').css('display', 'block');
		}
	});





	// bref ici je dois faire une intervalle toute les seconde pour verifier que data.json = data.json si ce n'est pas le cas je recharge la page


// 	window.setInterval(function(){



//     var dataUrl = '../map/'+MapDir+'/data/data.json';
    


//         $.get(dataUrl, function(data) {
        	
        	
//         	var dataparse = jQuery.parseJSON(data);
//         	console.log(dataparse);
//         	console.log(Newjson);
//         	var datastring = JSON.stringify(dataparse);
//         	var CompareJson = JSON.stringify(Newjson);

//      		console.log(datastring);
//         	console.log(CompareJson);

//         	console.log(datastring.length);
//         	console.log(CompareJson.length);

//         	if( datastring === CompareJson)
//         	{
//         		console.log('same');
//         	}
//         	else
//         	{
//         		console.log('notsame');
//         		location.reload();
//         	}

//         });


// }, 4500);



 createJSON();



});