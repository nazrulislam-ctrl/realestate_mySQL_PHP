<?php include 'header.php'; ?>
<?php

$mysqli=new mysqli('localhost','root','','realestate');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_POST['submit'])){

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
	
	
	$query="UPDATE property".
    "SET property_name= '$b', price= '$c', property_type= '$d',district= '$e',post_office= '$f',police_station= '$g',road_no= '$h',availability= '$i',description= '$j',image= '$k'".
    "WHERE property_id=$a";
	$insert=$mysqli->query($query);
	$last_id = $mysqli->insert_id;
	header('location:property_info.php');
	$l=count($_FILES['img']['name']);
	if($insert){

		if($l < 10){

			for ($i=0; $i <$l; $i++) { 
				$img_name=$_FILES['img']['name'][$i];
				move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
				$query_multi="INSERT INTO description(image,name) VALUES ('$img_name','$last_id')";
				$ins=$mysqli->query($query_multi);
			}
			
			// else{
			// 	echo "MAX LIMIT EXCEED";
			// }

		}
	}


}
?>

<div class="container"> 

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Add a Property </legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Property ID</label>
      <div class="col-lg-10">
        <input type="text" name="property_id" class="form-control"  placeholder="Add Property Id Here">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Name Of Property</label>
      <div class="col-lg-10">
        <input type="text" name="property_name" class="form-control"  placeholder="Name Of Property">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Price</label>
      <div class="col-lg-10">
        <input type="text" name="price" class="form-control"  placeholder="price">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Property Type</label>
      <div class="col-lg-10">
        <input type="text" name="property_type" class="form-control"  placeholder="Add Property Type">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">District</label>
      <div class="col-lg-10">
        <input type="text" name="district" class="form-control"  placeholder="Add District">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Post Office</label>
      <div class="col-lg-10">
        <input type="text" name="post_office" class="form-control"  placeholder="Add Post Office">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Police Station</label>
      <div class="col-lg-10">
        <input type="text" name="police_station" class="form-control"  placeholder="Police Station">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label">Road and house</label>
      <div class="col-lg-10">
        <input type="text" name="road_no" class="form-control"  placeholder="Road and house">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Availability </label>
      <div class="col-lg-10">
        <input type="text" name="availability" class="form-control"  placeholder="Is is available?">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="description" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Featured Image</label>
      <div class="col-lg-10">
        <input type="file" name="image">
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