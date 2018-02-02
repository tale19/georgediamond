
// ****** FUNCTIONS ******
// 	Getter that returns the window parameters
function getWindowOffset() {
	var $windowTop = $(window).scrollTop() + 67; // 67px is the navbar height;
	var $windowHeight = $(window).height();
	var $windowBottom = $windowTop + $windowHeight;
	return [$windowTop, $windowHeight, $windowBottom];
}

// 	Getter for elements' position
function getElementVerticalPosition($elem) {
	$elementTopPosition = $elem.offset().top;
	$elementBottomPosition = $elem.offset().top + $elem.height();
	return [$elementTopPosition, $elementBottomPosition];
}

// 	Method that checks if an element is in the viewport using the window offset and element's parameters
function inViewport($elem) {
	if (getElementVerticalPosition($elem)[0] > getWindowOffset()[0] && getElementVerticalPosition($elem)[1] < getWindowOffset()[2]) {
		return true;
	} 
}

// 	Method that checks if an element is PARTIALLY in the viewport using the window offset and element's parameters
function inPartialViewport($elem, $pixels) {
	if (((getWindowOffset()[0] - getElementVerticalPosition($elem)[1] < -$pixels) && (getWindowOffset()[2] - getElementVerticalPosition($elem)[1] > 0)) || 
		((getWindowOffset()[2] - getElementVerticalPosition($elem)[0] >  $pixels) && (getWindowOffset()[0] - getElementVerticalPosition($elem)[0] < 0))) 
	{
		return true;
	} 
}

function main() {

	// Dynamically add class .active to mark current page in the navbar
	// var url = window.location;
 //    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
 //    $('ul.nav a').filter(function() {
 //         return this.href == url;
 //    }).parent().addClass('active');

    // Replace all SVG images with inline SVG
	// jQuery('img.svg').each(function(){
	//     var $img = jQuery(this);
	//     var imgID = $img.attr('id');
	//     var imgClass = $img.attr('class');
	//     var imgURL = $img.attr('src');

	//     jQuery.get(imgURL, function(data) {
	//         // Get the SVG tag, ignore the rest
	//         var $svg = jQuery(data).find('svg');

	//         // Add replaced image's ID to the new SVG
	//         if(typeof imgID !== 'undefined') {
	//             $svg = $svg.attr('id', imgID);
	//         }
	//         // Add replaced image's classes to the new SVG
	//         if(typeof imgClass !== 'undefined') {
	//             $svg = $svg.attr('class', imgClass+' replaced-svg');
	//         }

	//         // Remove any invalid XML tags as per http://validator.w3.org
	//         $svg = $svg.removeAttr('xmlns:a');

	//         // Replace image with new SVG
	//         $img.replaceWith($svg);

	//     }, 'xml');

 //    });

}

$(document).ready(main);
