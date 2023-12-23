<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realestate" ;

//creating connection 

$con = new mysqli($servername,$username,$password);

if ($con-> connect_error){
      die("connection failed:" . $con->connect_error);
}
else {
{
    mysqli_select_db ($con , $dbname);
    //echo "connection successful";
    $propId=$_POST['PropertyID'];
    $propName=$_POST['PropertyName'];
    $buyerName=$_POST['BuyerName'];
    $sellerName=$_POST['SellerName'];
    $review=$_POST['Review'];

    $query= "insert into sucessfuldealsdata values ('$propId' , '$propName' , '$buyerName' , '$sellerName' , '$review')";
    mysqli_query($con, $query);
    echo "successfully posted";
 //echo"$query";

 //mysqli_query( $con , $query );

 //header('location:index.php');

}
 ?>
