/*
	Print all assessment plans for CS majors for outcome 2 that were assessed by sectionId 3. Print the assessment description and weight. Order the results by weight in descending order and secondarily by assessment description in ascending order.
*/

SELECT assessmentDescription, weight FROM Assessments
	WHERE major = 'CS'
		AND outcomeId = 2
		AND sectionId = 3
	ORDER BY weight DESC, assessmentDescription ASC;
