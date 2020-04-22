console.log('section script running');
const sectionStage = document.querySelector('#sectionMenu');
const handleSectionChange = ev => {
	// Find selected option to uncover section id and major 
	// Find selected option to uncover section id and major 
	[...sectionStage.querySelectorAll('option')].forEach(elm => {
		console.log('searching')
		if(elm.selected){
				clearOutcomes()
				fetchOutcomes(elm.dataset.major, elm.dataset.sectionid)
			}
	})
}
sectionStage.addEventListener('change', handleSectionChange)
