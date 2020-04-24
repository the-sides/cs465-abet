const passwordElms = [...document.querySelectorAll('input.password')]
const emailVal = document.querySelector('#email').textContent.trim();

const changePassword = () => {
	if(passwordElms[0].value !== passwordElms[1].value){
		reporter('password', false);
		return false;
	}
	const password = passwordElms[0].value;
	const url = `updatePassword.php?email=${emailVal}&password=${password}`
	console.log(url)
	fetch(url).then(res => res.json()).then(data => reporter('password', data))
}


document.querySelector('#changePassword').addEventListener('click', changePassword)
