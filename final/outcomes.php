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

// Print the outcomeIds and outcomeDescriptions of all outcomes 
//	assessed for a major by sectionId. Order the output by outcomeIds.

$major = $conn->real_escape_string($_GET["major"]);
$section = $conn->real_escape_string($_GET["sectionId"]);
$sql = ("SELECT outcomeId, outcomeDescription FROM Outcomes
	WHERE outcomeId IN (SELECT outcomeId FROM OutcomeResults
			WHERE major = '$major'
						AND sectionId = '$section')
		ORDER BY outcomeId;");

$result = $conn->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo json_encode($row);
	}
}

$conn->close();
?>
