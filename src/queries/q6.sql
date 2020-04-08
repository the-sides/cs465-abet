/*
	Print the sectionId, instructor email, outcomeId, major, and sum of the weight fields (name it weightTotal) for any outcome whose assessments' weights for that outcome and major do not exactly equal 100. As one example, the sum of the assessment weights for EE majors for outcome 1 in section 7 is 70, so you would print the requested information for this section. Order the results by instructor email in ascending order, then by major in ascending order, and finally by outcome in ascending order.
*/

SELECT a.sectionId, i.email, a.outcomeId, a.major, SUM(a.weight) AS weightTotal FROM Assessments a, Instructors i, Sections s
	WHERE a.sectionId = s.sectionId
		AND i.instructorId = s.instructorId
	GROUP BY email ASC, major ASC, outcomeId ASC
	HAVING SUM(weight) != 100;
