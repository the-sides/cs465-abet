/*
	Print the instructorId, sectionId, courseId, major, semester, and year of all sections taught by an instructor with an email address of "coyote@utk.edu" and password of "password" (the password string in the sample data you have been given is the hash string for "password" that is created by MySQL's PASSWORD function). Note that the same sectionId could appear twice in the results because that section might be used to assess both EE and CpE majors or both CS and CpE majors. The results should be ordered by year in descending order and secondarily by semester in ascending order.
*/

SELECT DISTINCT s.instructorId, s.sectionId, s.courseId, c.major, s.semester, s.year
FROM Sections s, CourseOutcomeMapping c
	WHERE s.instructorId = (SELECT instructorId FROM Instructors 
		WHERE email = "coyote@utk.edu" AND password = PASSWORD('password'))
		AND s.courseId = c.courseId
		AND s.semester = c.semester
		AND s.year = c.year
	ORDER BY s.year DESC, s.semester ASC;
