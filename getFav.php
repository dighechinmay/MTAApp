<?
include("include/session.php");
include("include/mysql_dbconn.php");





	


$queryFav = "Select linenames from favorites where userid= ".$_SESSION['userid'];
$result = mysqli_query($con,$queryFav);



$row = mysqli_fetch_assoc($result);


if(mysqli_num_rows($result) == 0){

echo "no rows";

}	
else{
echo $row['linenames'];
}	
	
	

	
	
	



?>