let cardNumInput = 
	document.querySelector('#cardNum') 

cardNumInput.addEventListener('keyup', () => { 
	let cNumber = cardNumInput.value 
	cNumber = cNumber.replace(/\s/g, "") 

	if (Number(cNumber)) { 
		cNumber = cNumber.match(/.{1,4}/g) 
		cNumber = cNumber.join(" ") 
		cardNumInput.value = cNumber 
	} 
})
function validateForm() {
	// Add validation logic for each field
	var fullName = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var address = document.getElementById('address').value;
	// Add more fields as needed

	// Check if any field is empty
	if (fullName === '' || email === '' || address === '') {
		alert('Please fill in all fields before proceeding to checkout.');
		return false; // Prevent form submission
	}

	return true; // Allow form submission
}