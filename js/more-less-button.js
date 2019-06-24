let plusIcon = document.getElementById("plusFas");
let enableComment = document.querySelector(".enableComment"); // 
let commentContainer = document.getElementById("commentContainer"); // Div commentContainer
let containerHeight = parseFloat(getComputedStyle(commentContainer).height); // Hauteur initial



class Plus_Minus {
	constructor(button, elem, height, newHeight, plus_minus_elem){
		this.button = button;
		this.elem = elem;
		this.height = height;
		this.newHeight = newHeight;
		this.plus_minus_elem = plus_minus_elem;
		this.button.addEventListener("click", this.plus_minus.bind(this));
	}
	plus_minus(){
		if (this.elem.style.height == this.newHeight) {
			this.elem.style.transition = "ease 3s";
			this.plus_minus_elem.className = "fas fa-minus"
			this.elem.style.height = this.newHeight;
		} else if (this.elem.style.height == this.newHeight) {
			this.elem.style.transition = "ease 3s";
			this.plus_minus_elem.className = "fas fa-plus"
			this.elem.style.height = this.height;
		}
	}
}

let plusBilletView = new Plus_Minus(enableComment, commentContainer, containerHeight, "200px", plusIcon);


