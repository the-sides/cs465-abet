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


$major = $conn->real_escape_string($_GET["major"]);
$outcome = $conn->real_escape_string($_GET["outcome"]);
$section = $conn->real_escape_string($_GET["sectionId"]);
$sql = ("SELECT strengths, weaknesses, actions FROM Narratives
	WHERE major = '$major'
			AND outcomeId = '$outcome'
					AND sectionId = '$section';");

$result = $conn->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo json_encode($row);
	}
}

$conn->close();
?>
