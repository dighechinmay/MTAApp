<?

include("include/session.php");
include("include/mysql_dbconn.php");




if($_GET['fav'] != ""){
	
//echo $_GET['fav'];


$query = "Select * from favorites where userid=".$_SESSION['userid'];



$result = mysqli_query($con,$query);



if (mysqli_num_rows($result)==0) { // if no fav are stored before


$query1 = "Insert into favorites (userid,linenames,lastUpdated) VALUES (".$_SESSION['userid'].",'".$_GET['fav']."',now())";
mysqli_query($con,$query1);

//echo $query1;

}
else {
	
$update_query = "Update favorites set linenames ='".$_GET['fav']."',lastUpdated = now() where userid =".$_SESSION['userid'];
mysqli_query($con,$update_query);

//echo $update_query;
	
	
}	
	



}
	

?>