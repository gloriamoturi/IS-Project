<html>
<body>
		
<form method="POST" action="" >
 <input type="file" name="imagename">
 <input type="submit" name="display_image" value="Display">
</form>

</body>
</html>



<?php
include'config1.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
$imagename = $_POST['imagename'];
$select_image="select * from image_table where imagename='$imagename'";
$result = $conn->query($select_image);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "post id: " . $row["imagename"]. " - Name: " . $row["imagecontent"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
}
?>
