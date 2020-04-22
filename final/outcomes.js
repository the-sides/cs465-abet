const outcomeDescStage = document.querySelector('.results > .example > p');
const outcomeMenuStage = document.querySelector('.main-nav');
const setOutcome = ev => {
	const id = ev.srcElement.dataset.id
	const desc = ev.srcElement.dataset.desc
	const major = ev.srcElement.dataset.major
	outcomeDescStage.innerHTML = `<b>Outcome ${id} - ${major}: </b> ${desc}`
}

const createOutcome = (id, desc, major) => {
	const newElm = document.createElement('a');
	newElm.removeAttribute('href');
	newElm.textContent = `Outcome ${id}`
	newElm.dataset.id = id;
	newElm.dataset.desc = desc;
	newElm.dataset.major = major;
	newElm.addEventListener('click', setOutcome);
	outcomeMenuStage.appendChild(newElm);
	return newElm;
}

const clearOutcomes = () => {
	const outcomes = outcomeMenuStage.querySelectorAll('a')
	outcomes.forEach(elm => elm.remove())
}
const fetchOutcomes = (major, section) => {
	fetch(`outcomes.php?major=${major}&sectionId=${section}`).then(res => res.json()).then((data) => {
		//data = [... new Set(data)]
		const result = [];
		const map = new Map();
		for (const item of data) {
			if(!map.has(item.outcomeId)){
				map.set(item.outcomeId, true);    // set any value to Map
				result.push({
					id: item.outcomeId,
					desc: item.outcomeDescription,
					major: item.major
				});
			}
		}
		console.log(result);
		result.map(outcome => createOutcome(...Object.values(outcome)))[0].click();
		
	})
}
console.log('outcome script running');
fetchOutcomes('CS', '9');
