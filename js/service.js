/**
 * Created by Chinmay on 3/15/2016.
 */
/*
 * Author : Chinmay Dighe
 *
 *
 * */

 
 
var serviceTagName;
var favLineNames;
 
$(function() {

    $('#service_button').on('click', function() {
        var select_value = $('#service_type').val();

        loadService(select_value);



    });
});


function getFav(){
	

	
var xhttp = new XMLHttpRequest();
	
xhttp.onreadystatechange = function() {

if (xhttp.readyState == 4 && xhttp.status == 200) {
			  
	 
	// alert(xhttp.responseText);
	 
	var Response = xhttp.responseText.replace(/(\r\n|\n|\r)/gm,"");
	
	if(Response == "no rows"){
			
			alert("Please choose your favorites and hit save!");
			return;
	}
	 
	 favLineNames = xhttp.responseText;	 
	 favLineNames = favLineNames.replace(/(\r\n|\n|\r)/gm,"");
	 
	 
	 displayFav(favLineNames);
	 
}
};

xhttp.open("GET", "getFav.php", true);
xhttp.send();
}
	
	
function displayFav(names) {
	
var arrayNames = names.split(",");	



	

var xhttp = new XMLHttpRequest();
	
xhttp.onreadystatechange = function() {

if (xhttp.readyState == 4 && xhttp.status == 200) {
	
    var xmlText1 = xhttp.responseText;


    parser = new DOMParser();
    xmlDoc1 = parser.parseFromString(xmlText1, "text/xml");
	
	
	
	var timeFormat1 = xmlDoc1.getElementsByTagName("timestamp")[0].childNodes[0].nodeValue;
	var table1="<table class='table table-striped'><tr><th>Line</th><th>Status</th></tr>"
	
	for(var p=0;p<arrayNames.length;p++){
		
		var resol = arrayNames[p].split("_");

        var y =  xmlDoc1.getElementsByTagName(resol[0].toString())[0].getElementsByTagName("line");	
		
		table1 += "<tr><td>" +
             y[Number(resol[1])].getElementsByTagName("name")[0].childNodes[0].nodeValue +
             "</td>";
			 
		if(y[Number(resol[1])].getElementsByTagName("status")[0].childNodes[0].nodeValue != "SERVICE CHANGE"){


        table1 +="<td>"+ y[Number(resol[1])].getElementsByTagName("status")[0].childNodes[0].nodeValue +
                      "</td></tr>";

        }
        else{

		table1 +="<td class='info'>" + y[Number(resol[1])].getElementsByTagName("status")[0].childNodes[0].nodeValue + " <br/>" +y[Number(resol[1])].getElementsByTagName("text")[0].childNodes[0].nodeValue+
                      "</td></tr>";

        }	 
			 
		
		
	}
	
	table1 += "</table>";
	
	
	
	
	//document.getElementById("fav").innerHTML = table1;
    //document.getElementById("fav").style.display = "block"; 

   	var header1 = "<h2>Favorite Services Updated at : "+ timeFormat1 +"</h2>";
	header1 += table1; 
    document.getElementById("fav").innerHTML = header1;
	document.getElementById("fav").style.display= "block";	
	 
	 
}
};

xhttp.open("GET", "http://web.mta.info/status/serviceStatus.txt", true);
xhttp.send();	


}	
	





function loadService(val) {

    var xhttp = new XMLHttpRequest();
    var serviceRequested = val;
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {


            var xmlText = xhttp.responseText;


            parser = new DOMParser();
            xmlDoc = parser.parseFromString(xmlText, "text/xml");

			
            var table = "<table class='table table-striped'><thead><tr><th></th><th>Line Name</th><th>Status</th></tr></thead><tbody>";
            var timeFormat = xmlDoc.getElementsByTagName("timestamp")[0].childNodes[0].nodeValue;

            if (val.toUpperCase() == "SUBWAY") {


            var x = xmlDoc.getElementsByTagName("subway")[0].getElementsByTagName("line");
            serviceTagName = "subway";


            }
            else if (val.toUpperCase() == "BUS") {


                var x = xmlDoc.getElementsByTagName("bus")[0].getElementsByTagName("line");
                serviceTagName = "bus";


            }
            else if (val.toUpperCase() == "BT") {


                var x = xmlDoc.getElementsByTagName("BT")[0].getElementsByTagName("line");
                serviceTagName = "BT";


            }
            else if (val.toUpperCase() == "LIRR") {


                var x = xmlDoc.getElementsByTagName("LIRR")[0].getElementsByTagName("line");
                serviceTagName = "LIRR";


            }
            else if (val.toUpperCase() == "METRONORTH") {


                var x = xmlDoc.getElementsByTagName("MetroNorth")[0].getElementsByTagName("line");
                serviceTagName = "MetroNorth";


            }


             for (var i = 0; i <x.length; i++) {

			// make changes x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue
             table += "<tr><td><input type='checkbox' name='favourite' value="+ serviceTagName +"_"+ i + "></td><td>" +
             x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
             "</td>";


              if(x[i].getElementsByTagName("status")[0].childNodes[0].nodeValue != "SERVICE CHANGE"){


                  table +="<td>"+ x[i].getElementsByTagName("status")[0].childNodes[0].nodeValue +
                      "</td></tr>";

              }
              else{


                  table +="<td class='info'>" + x[i].getElementsByTagName("status")[0].childNodes[0].nodeValue + " <br/>" +x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue+
                      "</td></tr>";

              }


             }

             table += "</tbody></table><button type='button' class='btn btn-success' onClick='saveFav()'>Save Favorites</button>";


            //document.getElementById("heading").innerHTML = val.toUpperCase() +" Status Updated at : "+timeFormat;
            //document.getElementById("heading").style.display = "block";
			var header = "<h2>" + val.toUpperCase() +" Status Updated at : "+ timeFormat +"</h2>";
			header += table; 
            document.getElementById("mta_table").innerHTML = header;
			document.getElementById("mta_table").style.display= "block";




        }
    };
    xhttp.open("GET", "http://web.mta.info/status/serviceStatus.txt", true);
    xhttp.send();
}


