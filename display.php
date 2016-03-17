<?

include("include/session.php");
include("include/mysql_dbconn.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>indexpage</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="js/service.js"></script>



    <style>
        #service_type {


            width : 150px;


        }

        body {

            background-color : #0093d0;


        }
    </style>
	
	<script>
	
	function unique(list) {
    var result = [];
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
    }

	 var favList = new Array();
	
	
	
	function saveFav(){    
   
    $("input:checkbox[name=favourite]:checked").each(function(){
   
     favList.push($(this).val());
    });
   
    favList = unique(favList);

   
    var xhttp = new XMLHttpRequest();
	
		  xhttp.onreadystatechange = function() {
		 if (xhttp.readyState == 4 && xhttp.status == 200) {
			  
			  alert("Successfully added to your favourites!");
			}
		  };
		  
		  xhttp.open("GET","saveFav.php?fav="+ favList, true);
		  xhttp.send();
    }
	
	
	
	</script>
	


</head>
<body onload="" >

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MTA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Display</a></li>
      <?if(isset($_SESSION['userid'])){?><li><a href="logout.php">Logout</a></li><?}?>
    </ul>
  </div>
</nav>
  



<div class="container">




<h1>Welcome <?if(isset($_SESSION['userid'])){ echo $_SESSION['firstname']; }else{echo "Guest User";}?> to MTA website</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">


                    <form role="form">
                        <div class="form-group">
                            <label for="service_type">Choose a service type :</label>
                            <select class="form-control" id="service_type">
                                <option value="">Select Service</option>
                                <option value="subway">Subway</option>
                                <option value="bus">Bus</option>
                                <option value="bt">BT</option>
                                <option value="lirr">LIRR</option>
                                <option value="metronorth">MetroNorth</option>
                            </select>


                        </div>

                        <button type="button" class="btn btn-success" id="service_button" >Check service status</button>
						<?if(isset($_SESSION['userid'])){?><button type="button" class="btn btn-info" id="fav_button" onClick="getFav()" >Favourites</button><?}?>
                    </form>

               </div>
            </div>
        </div>
    </div>


<br><br>



<div id="fav" style="display:none"></div>
<div id="mta_table" style="display:none"></div>

</div>

</body>
</html>