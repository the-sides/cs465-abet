const assPlate = ` <input type="number" name="weight" id="weight%i" class='weight' min="1" max="100" value=""> <textarea name="desc" id="desc0" class="desc" cols="30" rows="5" maxlength="400" placeholder="None">%d</textarea> <div id="remove%i" class="remove"> <button class="btn btn--red"> <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg"> <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/> </svg> </button> </div>`

const createAss = () => {
	const newAss = document.createElement('div')
	let assContent = assPlate;
	assContent.replace(//, '69')
	newAss.innerHTML = assContent
	newAss.classList.add('inputs')
	console.log(newAss)
	// Change weight ids and so forth
	assessmentStage.appendChild(newAss)
	return newAss
}
const clearAsses = () => {assessmentStage.innerHTML = ''}

const fetchAsses = () => {
	const state = getState();
	console.log('state check', state);
	const url = `assessment.php?major=${state.major}&outcome=${state.outcome}&sectionId=${state.section}`
	fetch(url).then(res => res.json()).then(data => {
		console.log(`Assessments`, data)
		// Check for errors here, which the PHP isn't doing.
		clearAsses();
		data.forEach(ass => {
			createAss()
		})
	})
}

document.querySelector('#newAssessment').addEventListener('click', createAss)
