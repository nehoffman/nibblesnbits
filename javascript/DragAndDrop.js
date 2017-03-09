/*
	Author: Nathan Hoffman
	created on 03/08/2017
*/

console.log("Hello World");

function init() {
	var ulClicker[] = document.getElementsByTagName("li");
	for(var i = 0; i < ulClicker.length; i++) {
		ulClicker[i].onclick = click;
	}
}

function click() {
	console.log("HI");
}

// Initializes everything
init();