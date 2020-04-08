/*
	Print the outcomeIds and outcomeDescriptions of all outcomes assessed for CS majors by sectionId 3. Order the output by outcomeIds.
*/

SELECT outcomeId, outcomeDescription FROM Outcomes
	WHERE outcomeId IN (SELECT outcomeId FROM OutcomeResults
		WHERE major = 'CS'
			AND sectionId = 3)
	ORDER BY outcomeId;
