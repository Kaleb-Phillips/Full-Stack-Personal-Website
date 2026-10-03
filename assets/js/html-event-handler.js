/*
 * html-event-handler.js - Event Handler for Username input box
 *
 * This script uses an Event Handler to call a function that checks 
 * if the username entered inside the input box is at least 5 characters long.
 * This script, when paired with an Event Listener in the javascript.html page 
 * to call it, is used as an example of implementing an Event Handler.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 */

function checkUsername()
{ 	// Declare function
	var elMsg = document.getElementById('feedback'); // Get feedback element
	var elUsername = document.getElementById('username'); // Get username input
	if (elUsername.value.length < 5)
	{ // If username too short
		elMsg.innerHTML = '<h3>Username must be 5 characters or more</h3>'; // Set msg
	}
	else
	{ 	// Otherwise
		elMsg.innerHTML = '<h3>Username is good</h3>'; // Clear message
	}
}
