/*
 * formValidation.js - Contact Form input validation
 *
 * This script checks for valid input on the contact.html page, 
 * in each input box, in real time so that users get feedback 
 * on their input without needing to reload the webpage. 
 * This script, along with the contact.html page, is used as an 
 * example of creating a dynamic webpage with user input 
 * validation only using JavaScript.
 * This script is only used for user feedback.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 */

var elFirstName = document.getElementById('firstName');//declare variable to hold first name div object
var elLastName = document.getElementById('lastName');//declare variable to hold last name div object
var elEmail = document.getElementById('email');//declare variable to hold email div object
var elPhone = document.getElementById('phone');//declare variable to hold phone number div object
var elUsername = document.getElementById('username');//declare variable to hold username div object
var elPassword = document.getElementById('password');//declare variable to hold password div object
var elComments = document.getElementById('comments');//declare variable to hold comments div object

// Function to validate input in the form
function checkData(minLength,inputGroup,inputStatus,inputEl){
    var elStatus = document.getElementById(inputStatus);
    var elGroup = document.getElementById(inputGroup);
    var elInput = document.getElementById(inputEl);
	var validLength = true; // Varaible to hold the result of checking the length
	var validCharacters = true; // Varaible to hold the result of comparing to a regex
	var validRegex; // Variable to hold a regex
	
	// Check for exact number of digits in phone number
	if (inputEl === 'phone' && elInput.value.length !== minLength)
	{
		// Display error message
		validCharacters = false;
		elStatus.innerHTML = inputEl.toUpperCase()+' must be exactly '+minLength+' digits.';
		elGroup.classList.add('has-error');
	}
	// Check for the minimum number of characters
	if (inputEl === 'comments' && elInput.value.length < minLength)
	{
		// Display error message
		validCharacters = false;
		elStatus.innerHTML = inputEl.toUpperCase()+' can not be empty.';
		elGroup.classList.add('has-error');
	}
	// Check for the minimum number of characters
    else if (elInput.value.length < minLength)
    {
		// Display error message
		validCharacters = false;
		elStatus.innerHTML = inputEl.toUpperCase()+' must be '+minLength+' characters or more.';
		elGroup.classList.add('has-error');
	}
	
	// Check for valid characters
	if (inputEl == 'firstName' || inputEl === 'lastName' 
		|| inputEl === 'email' || inputEl === 'phone' 
		|| inputEl === 'comments') {
		// Check for valid names
		if (inputEl == 'firstName' || inputEl === 'lastName')
		{
			// Regex for valid names
			validRegex = /^[A-Za-z'-]+$/;
			// If name is not valid
			if (!elInput.value.match(validRegex))
			{
				// Display error message
				validCharacters = false;
				elStatus.innerHTML = inputEl.toUpperCase()+' must only contain alphabetical characters, hyphens, or apostrophes.';
				elGroup.classList.add('has-error');
			}
		}
		// Check for valid email
		else if (inputEl === 'email')
		{
			// Regex for valid email
			validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			// If email is not valid
			if (!elInput.value.match(validRegex))
			{
				// Display error message
				validCharacters = false;
				elStatus.innerHTML = "Invalid Email";
				elGroup.classList.add('has-error');
			}
		}
		// Check for valid phone number
		else if (inputEl === 'phone')
		{
			// Regex for valid phone number
			validRegex = /^[0-9]+$/;
			// If phone number is not valid
			if (!elInput.value.match(validRegex))
			{
				// Display error message
				validCharacters = false;
				elStatus.innerHTML = inputEl.toUpperCase()+' can only contain numbers';
				elGroup.classList.add('has-error');
			}
		}
	}
	// Check if the characters and length are both valid
	if (validCharacters && validLength)
	{
		// Display success message
		elStatus.innerHTML = '';
		elGroup.classList.remove('has-error');
		elGroup.classList.add('has-success');
	}
}

// Event listeners for input fields
elFirstName.addEventListener('blur', function(){
    checkData(2,'firstNameGroup','firstNameStatus','firstName');
    }, false);
elLastName.addEventListener('blur', function(){
    checkData(2,'lastNameGroup','lastNameStatus','lastName');
    }, false);
elEmail.addEventListener('blur', function(){
    checkData(2,'emailGroup','emailStatus','email');
    }, false);
elPhone.addEventListener('blur', function(){
    checkData(10,'phoneGroup','phoneStatus','phone');
    }, false);
elUsername.addEventListener('blur', function(){
    checkData(6,'usernameGroup','usernameStatus','username');
    }, false);
elPassword.addEventListener('blur', function(){
    checkData(6,'passwordGroup','passwordStatus','password');
    }, false);
elComments.addEventListener('blur', function(){
    checkData(1,'commentsGroup','commentsStatus','comments');
    }, false);