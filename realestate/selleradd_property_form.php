<?php include 'header.php'; ?>
<?php

$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$price=$_POST['price'];
	$address=$_POST['address'];
	$Roadandhouse=$_POST['Roadandhouse'];
	$posoffice=$_POST['posoffice'];
	$policestation=$_POST['policestation'];
	$descrip=mysqli_real_escape_string($mysqli ,$_POST['descrip']);
	
	$target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["images"]["name"]);
	$temp_file=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
	
	
	$query="INSERT INTO propety (name,price,address,Roadandhouse,posoffice,policestation,descrip,images) VALUES ('$name','$price','$address','$Roadandhouse','$posoffice','$policestation','$descrip','$temp_file')";
	$insert=$mysqli->query($query);
	$last_id = $mysqli->insert_id;
	$c=count($_FILES['img']['name']);
	if($insert){

		if($c < 10){

			for ($i=0; $i <$c; $i++) { 
				$img_name=$_FILES['img']['name'][$i];
				move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
				$query_multi="INSERT INTO details(images,proid) VALUES ('$img_name','$last_id')";
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
      <label for="inputEmail" class="col-lg-2 control-label">Name Of Property</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control"  placeholder="Name Of Property">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Price</label>
      <div class="col-lg-10">
        <input type="text" name="price" class="form-control"  placeholder="price">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">District</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="address" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Road and house</label>
      <div class="col-lg-10">
        <input type="text" name="Roadandhouse" class="form-control"  placeholder="Roadandhouse">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Post office</label>
      <div class="col-lg-10">
        <input type="text" name="posoffice" class="form-control"  placeholder="postoffice">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Police station</label>
      <div class="col-lg-10">
        <input type="text" name="policestation" class="form-control"  placeholder="nearbypolicestation">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="descrip" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Featured Image</label>
      <div class="col-lg-10">
        <input type="file" name="images">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Rooms Images</label>
      <div class="col-lg-10">
        <input type="file" name="img[]" multiple>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

</div>


<?php  include 'footer.php' ; ?>