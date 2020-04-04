/*
	Print the narrative summary for CS majors for outcome 2 that were assessed by sectionId 3. Print the strengths, weaknesses, and actions.
*/

SELECT strengths, weaknesses, actions FROM Narratives
	WHERE major = 'CS'
		AND outcomeId = 2
		AND sectionId = 3;
