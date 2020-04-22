<?php
$servername = "dbs2.eecs.utk.edu";
$username = "dmw131";
$password = "respectMyAuthority";
$dbname = "cosc465_dmw131";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");

// sectionId, outcomeId, major, performanceLevel, and numberOfStudents
$major = $conn->real_escape_string($_GET["major"]);
$outcome = $conn->real_escape_string($_GET["outcome"]);
$section = $conn->real_escape_string($_GET["sectionId"]); 
$performanceLvl = $conn->real_escape_string($_GET["performanceLevel"]);
$studentsN =  $conn->real_escape_string($_GET["numberOfStudents"]);
$sql = ("
	INSERT INTO OutcomeResults 
	VALUES(
		'$section',
		'$outcome',
	    '$major', 
		'$performanceLvl',
		'$studentsN'
	)
		;");

$result = $conn->query($sql);
var_dump($result);
$out = [];

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
			array_push($out, $row);
	}
}
echo json_encode($out);

$conn->close();
?>
