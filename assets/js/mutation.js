/*
 * mutation.js - Mutation for Shopping List
 *
 * This script uses Mutations to modify a Shopping List page.
 * Items can be added and removed from the Shopping list. 
 * The counter Updates as items are added and removed.
 * This script, along with the mutation.html page, 
 * is used as an example of using Mutations.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 */

// Declare variables
var elList, addLink, newEl, newText, counter, listItems, idCounter, inputElement, textInput;
elList = document.getElementById('list'); // Location for newly added list items
addLink = document.getElementById('addToList'); // Bind element for event to add item to list
counter = document.getElementById('counter'); // Place to update items in list


// Set listeners for all current list items
elList.childNodes.forEach(childNode => {
  if (childNode.nodeType === 1) { // Check if the child node is an element node
    childNode.addEventListener('click', () => {
		childNode.remove(); // Remove node on click
		updateCount(); // Update count
	});
  }
});

// Declare function to process newly added item event
function addItem(e) {
	e.preventDefault(); // Prevent link action when page is not ready
	newEl = document.createElement('div'); // Create new div inside our shopping list
	idCounter++; // Increment for a unique id
	newEl.id = idCounter; // Set id of new div
	newEl.addEventListener("click", function() { // Set listener for new div
		this.remove(); // Remove list element on click
		updateCount(); // Update count
	});
	inputElement = document.getElementById("itemName"); // Get the input text box elemnent
	textInput = inputElement.value; // Get the text from input text box element
	newText = document.createTextNode(textInput); // Text for new item for new div
	newEl.classList.add('alert'); // Add the alert class to the newly created div
	newEl.classList.add('alert-info'); // Add aditioinal class to the newly created div\]
	newEl.appendChild(newText); // Add text to div
	elList.appendChild(newEl); // Add fully configured div to shopping list
}

// Declare function to update shopping list count
function updateCount() {
	listItems = elList.getElementsByTagName('div').length; // Get the total number of divs inside our list
	counter.innerHTML=listItems; // Update the shopping list count
}

addLink.addEventListener('click', addItem, false); // Listen for the click event on the button
elList.addEventListener('DOMNodeInserted', updateCount, false); // Listen for the DOM to be updated