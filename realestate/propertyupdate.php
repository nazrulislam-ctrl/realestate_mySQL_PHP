<?php include 'header.php'; ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realestate";

$conn = new mysqli($servername, $username, $password, $dbname);
	$a="";
	$b="";
	$c="";
	$d="";
	$e="";
	$f="";
	$g="";
	$h="";
	$i="";
	$j="";
	

	$k="";
  if ($_SERVER ['REQUEST_METHOD'] == 'GET'){
    if (!isset($_GET["property_id"])){
      header("location:property_info.php");
      exit;
    }
    $a= $_GET["property_id"];

    $sql= "SELECT * from property where property_id=$a";
    $result = $conn->query($sql);
  
	  
    if(!$row){
      header("location:property_info.php");
    }

	$b=$row['property_name'];
	$c=$row['price'];
	$d=$row['property_type'];
	$e=$row['district'];
	$f=$row['post_office'];
	$g=$row['police_station'];
	$h=$row['road_no'];
	$i=$row['availability'];
	$j=$row['description'];
	$k=$row["image"];
  }
  else{
    //post method: Update the data of the property
    $a=$_POST['property_id'];
	$b=$_POST['property_name'];
	$c=$_POST['price'];
	$d=$_POST['property_type'];
	$e=$_POST['district'];
	$f=$_POST['post_office'];
	$g=$_POST['police_station'];
	$h=$_POST['road_no'];
	$i=$_POST['availability'];
	$j=mysqli_real_escape_string($mysqli ,$_POST['description']);
	
	$target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["image"]["name"]);
	$k=$_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  do{
    if( empty($b) ||empty($c) ||empty($d) ||empty($e) ||empty($f) ||empty($g) ||empty($h) ||empty($i) ||empty($j) || empty($k)) {
      $errorMessage ="All the file are required";
      break;
    }
    
    $sql="UPDATE property".
    "SET property_name= '$b', price= '$c', property_type= '$d',district= '$e',post_office= '$f',police_station= '$g',road_no= '$h',availability= '$i',description= '$j',image= '$k'".
    "WHERE property_id=$a";

    $result =$conn->query($sql);
    if (!$result){
      $errorMessage= 'invalid'. $conn->error;
    }
  } while(false);
  }
?>
<div class="container"> 

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Add a Property </legend>
    <input type="hidden" name="property_id"value="<?php echo $a; ?>" >
    <div class="form-group">
      <label class="col-lg-2 control-label">Property ID</label>
      <div class="col-lg-10">
        <input type="text" name="property_id" class="form-control"  placeholder="Property Id" value="<?php echo $a; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Name Of Property</label>
      <div class="col-lg-10">
        <input type="text" name="property_name" class="form-control"  placeholder="Name Of Property" value="<?php echo $b; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Price</label>
      <div class="col-lg-10">
        <input type="text" name="price" class="form-control"  placeholder="price" value="<?php echo $c; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Property Type</label>
      <div class="col-lg-10">
        <input type="text" name="property_type" class="form-control"  placeholder="Add Property Type" value="<?php echo $d; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">District</label>
      <div class="col-lg-10">
        <input type="text" name="district" class="form-control"  placeholder="Add District" value="<?php echo $e; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Post Office</label>
      <div class="col-lg-10">
        <input type="text" name="post_office" class="form-control"  placeholder="Add Post Office" value="<?php echo $f; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Police Station</label>
      <div class="col-lg-10">
        <input type="text" name="police_station" class="form-control"  placeholder="Police Station" value="<?php echo $g; ?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label">Road and house</label>
      <div class="col-lg-10">
        <input type="text" name="road_no" class="form-control"  placeholder="Road and house" value="<?php echo $h; ?>">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Availability </label>
      <div class="col-lg-10">
        <input type="text" name="availability" class="form-control"  placeholder="Is is available?" value="<?php echo $i; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="description" rows="3" id="textArea"></textarea value="<?php echo $j; ?>">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Featured Image</label>
      <div class="col-lg-10">
        <input type="file" name="image" value="<?php echo $k; ?>">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <ul class="btn btn-success" >
        <li><a href="property_info.php" class="text-light">Go Back </a></li>
      </ul>
      </div>
    </div>
  </fieldset>
</form>

</div>
<?php  include 'footer.php' ; ?>