<?php include 'header.php'; ?>
<?php

include 'dbconnect.php';

if(isset($_POST['property_id']) ){
	$a = $_POST['property_id'];
	
	$sql = " delete from property where property_id = '$a' ";
	
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_affected_rows($conn)){
	
		//echo "Inserted Successfully";
	}
	else{
		// echo "Insertion Failed";
		
	}
	
}
	
	
		
?>

<div class="container"> 

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Delete a Property </legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Property ID</label>
      <div class="col-lg-10">
        <input type="text" name="property_id" class="form-control"  placeholder="Enter Property Id Here">
      </div>
    </div>

  

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <ul class="btn btn-success" >
        <li><a href="admin_info.php" class="text-light">Go Back </a></li>
      </ul>
      </div>
    </div>
  </fieldset>
</form>

</div>


<?php  include 'footer.php' ; ?>