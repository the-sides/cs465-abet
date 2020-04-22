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

//echo $_GET["email"] . " " . $_GET["password"];
$email = $conn->real_escape_string($_GET["email"]);
$pass = $conn->real_escape_string($_GET["password"]);
$sql = ("SELECT DISTINCT s.instructorId, s.sectionId, s.courseId, c.major, s.semester, s.year
FROM Sections s, CourseOutcomeMapping c
	WHERE s.instructorId = (SELECT instructorId FROM Instructors 
			WHERE email='$email' AND password = PASSWORD('$pass'))
			AND s.courseId = c.courseId
					AND s.semester = c.semester
							AND s.year = c.year
								ORDER BY s.year DESC, s.semester ASC;");

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
