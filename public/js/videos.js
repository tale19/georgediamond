function main() {

// *** PUSH FOOTER TO THE BOTTOM OF THE PAGE IF THE CONTENT IS NOT HIGH ENOUGH ***
	var docHeight = $(window).height();
	var footerHeight = $('#footer').height();
	var footerTop = $('#footer').position().top + footerHeight;

	if (footerTop < docHeight) {
		$('#footer').css('margin-top', (docHeight - footerTop) + 'px');
	}


}

$(document).ready(main);