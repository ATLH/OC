
// Book Slider
let bookSlider = document.getElementById("bookSlider");
let btnLeftBook = document.getElementById("btnLeftBook");
let btnRightBook = document.getElementById("btnRightBook");
let firstBook = document.getElementById("firstBook");
let lastBook = document.getElementById("lastBook");
let bookWidth = parseFloat(getComputedStyle(firstBook).width);
let allBooks = document.querySelectorAll("#bookSlider div");


// Quote slider
let quoteSlider = document.getElementById("slider");
let quoteBtnleft = document.getElementById("btnLeft");
let quoteBtnRight = document.getElementById("btnRight");
let lastQuote = document.getElementById("lastQuote").id;
let firstQuote = document.getElementById("firstQuote").id;
let blockquote = document.querySelector("blockquote");
let blockquoteWidth = parseFloat(getComputedStyle(blockquote).width);
let allQuotes = document.querySelectorAll("#slider blockquote");

let lll = document.getElementById("lll");

lll.addEventListener("click", function(){
	let divMore = document.getElementById("divMore");
    let divMoreHeight = parseFloat(getComputedStyle(divMore).height);
    let section2 = document.getElementById("section2");
    let section2Height = parseFloat(getComputedStyle(section2).height);

    if (window.innerWidth <= 420) {
		if (divMoreHeight == 150 && section2Height == 720) {
			section2.style.height = "900";
			section2.style.transition = "ease 1s";
			divMore.style.height = "300px";
		    divMore.style.transition = "ease 1s";
		    lll.innerHTML = "Réduire";
		} else {
			section2.style.height = "720px";
			divMore.style.height = "150px";
			lll.innerHTML = "Lire la suite";
		}
	} else {
		if (divMoreHeight == 150) {
			divMore.style.height = "300px";
		    divMore.style.transition = "ease 1s";
		    lll.innerHTML = "Réduire";
		} else {
			divMore.style.height = "150px";
			lll.innerHTML = "Lire la suite";
		}
	}
});

class Slider {
	constructor(slider, btnLeft, btnRight, contentWidth, allContent, lastContent, firstContent){
		this.slider = slider;
		this.btnLeft = btnLeft;
		this.btnRight = btnRight;
		this.contentWidth = contentWidth;
		this.allContent = allContent;
		this.lastContent = lastContent;
		this.firstContent = firstContent;
		this.i = 0;
		this.btnLeft.addEventListener("click", () => this.left());
		this.btnRight.addEventListener("click", () => this.right());
		this.slider.addEventListener("transitionend", () => this.transition());
	}
	left(){
		this.i--;
		this.slider.style.transform = "translateX(" + this.i * this.contentWidth + "px)";
		this.slider.style.transition = "ease 3s";
	}
	right(){
		this.i++;
		this.slider.style.transform = "translateX(" + this.i * this.contentWidth + "px)";
		this.slider.style.transition = "ease 3s";
		
	}
	transition(){
		switch (this.allContent[this.i].id) {
			case this.lastContent:
			    this.slider.style.transition = "none";
				this.i = 1;
				this.slider.style.transform = "translateX(" + this.i * this.contentWidth + "px)";
			    break;
			case this.firstContent:
			    this.slider.style.transition = "none";
			    this.i = 3;
				this.slider.style.transform = "translateX(" + this.i * this.contentWidth + "px)";
			    break;
		}
	}
}
let blockquoteSlider = new Slider (quoteSlider, quoteBtnleft, quoteBtnRight, -blockquoteWidth, allQuotes, lastQuote, firstQuote);

let romanSlider = new Slider (bookSlider, btnLeftBook, btnRightBook, -bookWidth, allBooks, lastBook, firstBook);















// Mieux comprendre
if (window.matchMedia("(max-width: 700px)").matches) {
    let headline = document.getElementById("headline");
    headline.style.display = "block";
    headline.innerHTML = "Le nouveau roman, signer jeanforteroche.";
}