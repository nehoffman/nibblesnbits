/*
	Author: Nathan Hoffman
	created on 03/08/2017 - 03/08/2017
*/
var mouseDown = false;
var interval = null;

console.log("Hello World");

function init() {
	var ulClicker = document.getElementsByTagName("li");
	for(var i = 0; i < ulClicker.length; i++) {
		ulClicker[i].addEventListener("mousedown", startDrag, false);
	}
	document.addEventListener("mouseup", stopDrag, false);
}

function startDrag(event) {
	this.style.position = "absolute";
	console.log(this);
	var substitute = this;
	interval = setInterval(function(){drag(event, substitute)}, 100);
	
	/*this.style.top = (event.pageY - 148) + "px";
	this.style.left = (event.pageX - 223) + "px";
	
	console.log("left: " + window.getComputedStyle(this).left);
	console.log("top: " + window.getComputedStyle(this).top);
	
	console.log("x-coords: " + event.pageX);
	console.log("y-coords: " + event.pageY);*/
	
	/*while(mouseDown && (this.style.top != event.pageY || this.style.left != event.pageX)) {
		this.style.top = event.pageY;
		this.style.left = event.pageX;
	}*/
}

function drag(event, element) {
	console.log("Looping");
	element.style.top = (event.pageY - 148) + "px";
	element.style.left = (event.pageX - 223) + "px";
}

function stopDrag(event) {
	clearInterval(interval);
	
	this.style.position = null;

	this.style.top = null;
	this.style.left = null;
}

// Initializes everything
init();