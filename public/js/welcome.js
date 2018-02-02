function welcome() {

	// *** Show styling after animation loads ***
	var $body = $('body');
	var $spellBox = $('#spell-animation-container');
	var $languageBox = $('#language-box');

	// First, set animation container's height equal to language box height to fix footer position 
	var $languageBoxHeight = $languageBox.height();
	console.log($languageBox);
	console.log($spellBox);
	// $spellBox.height('324px'); // doesn't work because it catches language box's height which is zero at start (hidden)



	console.log($languageBoxHeight);
	var spellAnimation = bodymovin.loadAnimation({
		container: document.getElementById('spell-animation-container'),
		renderer: 'svg',
		loop: false,
		autoplay: false,
		path: 'https://raw.githubusercontent.com/abrahamrkj/facebook-spell/master/data.json'
	});

	// animate heading (h1, h2)
	var $h1 = $('h1');
	var $h2 = $('h2');
	
	function animateh1() {
		// $h1.addClass('gradient');	
	}

	function animateh2() {
		
	}

	function executeAnimation() {
		animateh1();
		animateh2();
		$languageBox.removeClass('invisible');
		$spellBox.addClass('hidden');
		$body.addClass('animated');
	}

	spellAnimation.addEventListener("complete", executeAnimation);

	spellAnimation.play();
	// executeHeaderTextAnimation();


	console.log($languageBox);
	console.log($h1);
	console.log($h2);

}

$(document).ready(welcome);