const expectScoreElms = [...document.querySelectorAll('.expectations > .filters > input')]
const expectScoreTotalElm = document.querySelector('.totalValue.value')
const addToTotal = ev => {
    const scores = expectScoreElms.map(elm => Number(elm.value))
    const total = scores.reduce((sum, val) => sum + val) 
    expectScoreTotalElm.textContent = total
}
expectScoreElms.forEach(input => {
    input.addEventListener('change', addToTotal)
})


const outcomeMenuButtons = document.querySelectorAll('.main-nav > a')
const urlParams = new URLSearchParams(window.location.search);
outcomeMenuButtons.forEach(elm => {
    if(urlParams.has('outcome') & urlParams.get('outcome') === elm.id){
        elm.classList.add('activeOutcome')
    }
});