<html>
<body>
		
<form method="GET" action=" " >
 <input type="file" name="imagename">
 <input type="submit" name="display_image" value="Display">
</form>

</body>
</html>



<?php
include'config1.php';
$getname = $_GET['imagename'];

echo "< img src = fetch_image.php?imagename=".$getname." width=200 height=200 >";

?>