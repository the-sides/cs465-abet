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

$sql = ("SELECT a.sectionId, i.email, a.outcomeId, major, sum(a.weight) as weightTotal  FROM Assessments a, Sections s, Instructors i
	GROUP BY a.sectionId, major, a.outcomeId
	HAVING sum(a.weight) != 100
	ORDER BY email ASC, major ASC, a.outcomeId ASC ;");

$result = $conn->query($sql);
$out = [];

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
			array_push($out, $row);
	}
}
echo json_encode($out);

$conn->close();
?>
