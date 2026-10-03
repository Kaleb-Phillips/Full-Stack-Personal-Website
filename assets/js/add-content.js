/*
 * add-content.js - Adds content to a page using JavaScript
 *
 * This script displays a greeting that changes based on the time of day.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 */

var today = new Date();
var hourNow = today.getHours();
var greeting;
if (hourNow > 18){
	greeting = "Good evening!";
}
else if (hourNow > 12){
	greeting = "Good afternoon!";
}
else if (hourNow > 0){
	greeting = "Good morning!";
}
else {
	greeting = "Welcome!";
}

document.write('<h3>'+greeting+'</h3>');
