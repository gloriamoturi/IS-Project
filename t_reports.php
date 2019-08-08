<?php 
   include('linkbar.php');
   
?>


<html>
	<head>

	<link href="stylesheet.css" rel="stylesheet" type="text/css">
		<title>Reports Page</title>
		
	</head>
	<body class="loggedin">
		
		<div class="content">
            <h2 style="color:white;">Reports</h2>
            
            <?php   
            
            $sql="SELECT * FROM user WHERE u_type='tenant' AND property='$session_property' ORDER BY status ";
	$sql1="SELECT * FROM user WHERE u_type='tenant' AND property='$session_property'AND status='active'  ";
	$sql2="SELECT * FROM user WHERE u_type='tenant' AND property='$session_property'AND status='deactivated'  ";
	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    
    
    echo "<span style='color:white;'><h3><u>Summary</u><br>Active Tenants : ".$result1->num_rows."<br>Deactivated Tenants : ".$result2->num_rows;
    
    echo "</h3></span>";

    
            
        $dataPoints = array( 
            array("y" => $result1->num_rows, "label" => "Active" ),
            array("y" => $result2->num_rows, "label" => "Deactivated" ),
           
        );
        
        ?>
        <!DOCTYPE HTML>
<html>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Tenants"
	},
	axisY: {
		title: "Tenants"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}


</script>
<?php
echo "<br><br><span style='color:white;'><h3>Deactivated Tenants</h3></span>";
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered table-light ">';
    echo "<thead class='thead-dark'><tr><th>"."User ID"."</th><th>"."Start Date"."</th><th>"."End Date"."</th><th>"."Duration"."</th></tr></thead>";
          
    while($row = mysqli_fetch_array($result)) {
        if($row["status"]=="deactivated"){
           
            $start_date = new DateTime($row["start_date"]);
            $since_start = $start_date->diff(new DateTime($row["end_date"]));


            $r = $since_start->format('%y Year %m Month %d Day %h Hours %i Minute %s Seconds' );
            echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["start_date"]. "</td><td>" .$row["end_date"]. "</td><td>" . $r  ."</td></tr>";

        }
    }
    echo "</table>";
}
?>
</head>
<body>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>        
   