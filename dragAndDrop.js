/*
	Author: Nathan Hoffman
	created on 03/16/2017
*/

var selectedIngredient = null;

function init() {
	var ulClicker = document.getElementsByTagName("li");
	for(var i = 0; i < ulClicker.length; i++) {
		ulClicker[i].onclick = click;
	}

	window.addEventListener("mousemove", function(event) { move(event) }, false);
}

function move(event) {
	if(selectedIngredient) {
		selectedIngredient.style.position = "absolute";
		selectedIngredient.style.left = event.clientX + -250 + "px";
		selectedIngredient.style.top = event.clientY + -250 + "px";
	}
}

function click() {
	if(selectedIngredient == null) {
		selectedIngredient = this;
	} else {
		selectedIngredient = null;
	}
}

// Initializes everything
init();