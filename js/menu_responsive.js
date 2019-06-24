let toggler = document.getElementById("toggler");
let overlay = document.getElementById("overlay");
let itemContainer = document.querySelector("nav ul");
let i = 0;



toggler.addEventListener("click", function(){
	overlay.innerHTML = itemContainer.innerHTML;
	overlay.innerHTML = itemContainer.innerHTML;
	if (i == 0) {
		i++;
	    overlay.style.transform = "translateX(" + 0 + "%)";
	    overlay.style.transition = "transform ease 1s";
	}else {
		i--;
	    overlay.style.transform = "translateX(" + -100 + "%)";
	    overlay.style.transition = "transform ease 1s";
	}
});