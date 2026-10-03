/*
 * event-listener.js - Event Listener for Username input box
 *
 * This script uses an Event Listener to call a function that checks 
 * if the username entered inside the input box is at least 5 characters long.
 * This script, along with the javascript.html page, is used as an example of 
 * implementing an Event Listener.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 */

function checkUsername()
{
	var elMsg = document.getElementById('feedback');
	var elUsername = document.getElementById('username');
	if (elUsername.value.length < 5)
	{
		elMsg.innerHTML = '<h3>Username must be 5 characters or more</h3>';
	}
	else
	{
		elMsg.innerHTML = '<h3>Username is good</h3>';
	}
}
var el = document.getElementById('username');
el.addEventListener('blur',checkUsername,false);
