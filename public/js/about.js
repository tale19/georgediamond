function main() {
	// *** News images appearing on viewport entry ***
	
// first, create a getter that returns the window parameters
	function getWindowOffset() {
		var $windowTop = $(window).scrollTop() + 67; // 67px is the navbar height;
		var $windowHeight = $(window).height();
		var $windowBottom = $windowTop + $windowHeight;
		return [$windowTop, $windowHeight, $windowBottom];
	}

	// next, create a getter for elements' position
	function getElementVerticalPosition($elem) {
		$elementTopPosition = $elem.offset().top;
		$elementBottomPosition = $elem.offset().top + $elem.height();
		// console.log('news preview top position: ' + $elementTopPosition);
		// console.log('news preview bottom position: ' + $elementBottomPosition);
		return [$elementTopPosition, $elementBottomPosition];
	}

// then create a method that checks if an element is in the viewport using the window offset and element's parameters
	function inViewport($elem) {
		if (getElementVerticalPosition($elem)[0] > getWindowOffset()[0] && getElementVerticalPosition($elem)[1] < getWindowOffset()[2]) {
			// console.log('element is in Viewport');
			return true;
		} 
	}
	


// *** SCROLLTOP ***
	
	// first, make scrolltop button visible only when there's an offset 
	$scrolltopButton = $('#scrollTop');
	$(window).scroll(function() {
		if (getWindowOffset()[0] > 200) {
			$scrolltopButton.addClass('appear');
		}
		else {
			$scrolltopButton.removeClass('appear');
		}
	});

	// next, make it go *SMOOTHLY*  to page top on click
	$scrolltopButton.on('click', function(e) {
		// $(window).scrollTop(0);
		$("html, body").animate({ scrollTop: 0 }, 1500);
    	e.preventDefault();
	});



}

$(document).ready(main);