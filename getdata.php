<?php
include'config1.php';
$imagename=$_FILES["myimage"]["name"]; 



//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('b.jpeg','$imagename')";
if (mysqli_query($conn, $insert_image)) {
		echo "Yes";
}else{
	echo "No";
}
?>