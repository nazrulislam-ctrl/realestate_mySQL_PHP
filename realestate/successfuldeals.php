<?php include 'header.php'; ?>
<?php    

$mysqli=new mysqli('localhost','root','','realestate');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

	$query="SELECT * FROM property where availability='' ";
	$read=$mysqli->query($query);

?>

<div class="container-fluid">
	<div class="banner">
		<img src="image/banner.jpg">
	</div>

</div>

<div class="container">

<h2>  Property List  </h2>



      
     
<hr>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Property ID</th>
      <th>Property Name</th>
      <th>Price</th>
      <th>Property Type</th>
      <th>District</th>
      <th>Post office</th>
      <th>Police Station</th>
      <th>Road and house</th>
      <th>Description</th>
      <th>Image</th>

    </tr>
  </thead>
  <tbody>
  <?php while ($row=$read->fetch_assoc()) { ?>

    <tr class="info">
      <td><?php echo  $row['property_id'];   ?></td>
      <td><?php echo  $row['property_name'];   ?></td>
      <td><?php echo  $row['price'];   ?></td>
      <td><?php echo  $row['property_type'];   ?></td>
      <td><?php echo  $row['district'];   ?></td>
      <td><?php echo  $row['post_office'];   ?></td>
      <td><?php echo  $row['police_station'];   ?></td>
      <td><?php echo  $row['road_no'];   ?></td>
      <td><?php echo  $row['description'];   ?></td>
      
      <td><img src="uploads/<?php echo  $row['image']; ?>" ></td>
      

    </tr>
    
    <?php } ?>
  </tbody>
</table> 
	

</div>

<?php  include 'footer.php' ; ?>
