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
    
    $sql3 = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' and stage='awaiting feedback'";

    $result3 = $conn->query($sql3);
    $sql4 = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' and stage='assigned'";
    $result4 = $conn->query($sql4);
    $sql5 = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' and stage='complete'";
    $result5 = $conn->query($sql5);
    $sql6 = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' ";
    $result6 = $conn->query($sql6);
    echo "<span style='color:white;'><h3><u>Summary</u>";
    echo "<br>Total Maintenance Requests : ".$result6->num_rows;
    echo "<br>Awaiting Feedback : ".$result3->num_rows;
    echo "<br>Assigned : ".$result4->num_rows;
    echo "<br>Completed : ".$result5->num_rows;
    echo "</h3></span>";
    
           
                    
                       
                        
        $dataPoints = array( 
            array("y" => $result6->num_rows, "label" => "Total" ),
            array("y" => $result3->num_rows, "label" => "Awaiting Feedback" ),
            array("y" => $result4->num_rows, "label" => "Assigned" ),
            array("y" => $result5->num_rows, "label" => "Complete" ),
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
		text: "Maintenance Requests"
	},
	axisY: {
		title: "Maintenance Requests"
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
echo "<br><br><span style='color:white;'><h3>Completed Maintenance Requests</h3></span>";
if ($result5->num_rows > 0) {
    echo '<table class="table table-bordered table-light ">';
    echo "<thead class='thead-dark'><tr><th>"."Request ID"."</th><th>"."Submission Date"."</th><th>"."Completion Date"."</th><th>"."Duration"."</th></tr></thead>";
          
    while($row = mysqli_fetch_array($result5)) {
        
           
        $start_date = new DateTime($row["r_date"]);
        $since_start = $start_date->diff(new DateTime($row["completion_date"]));


        $r = $since_start->format('%y Year %m Month %d Day %h Hours %i Minute %s Seconds' );
            echo "<tr><td>" . $row["request_id"]. "</td><td>" . $row["r_date"]. "</td><td>" .$row["completion_date"]. "</td><td>" . $r  ."</td></tr>";

        
    }
    echo "</table>";
}
?>
</head>
<body>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>        
   