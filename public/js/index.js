function main() {
	// *** h1 in navbar displayed only when page header is not in viewport ***
	$navh1 = $('.navbar-header h1');
	$pageHeaderh2 = $('.page-header h2');
	if (inViewport($pageHeaderh2)) {
		console.log('page header h1 in viewport');
		$navh1.addClass('hidden-xs');
	}
	$(window).scroll(function() {
		if (inViewport($pageHeaderh2)) {
			console.log('page header h1 in viewport');
			// $navh1.addClass('disappear');
			$navh1.addClass('hidden-xs');
		}
		else
		{
			$navh1.removeClass('hidden-xs');
			// $navh1.removeClass('disappear');
		}
	});

// *** Row (#offer) images appearing on viewport entry ***
// 	pass each image container to the "in viewport checker" to get its position
	var $rowImageBox = $("#offer div[class*='col-']");
	$rowImageBox.each(function(){
		if (inViewport($(this))) {
			console.log($(this).children());
			$(this).children().addClass('appear');
		} 
	});

// 	repeat to make it work on scroll as well
	$(window).scroll(function() {
		console.log(inViewport($rowImageBox)); // ovde vraća true samo za prvi box, za ostale kaže UNDEFINED ???
		$rowImageBox.each(function(){
			if (inViewport($(this))) {
				$(this).children().addClass('appear');
			} 
		});
	});



	/* *** ANIMATE JUMBOTRON IMAGE *** */
	$amazingShows = $('#amazing-shows-list');
	$(window).scroll(function() {
		if(inViewport($amazingShows)) {
			$($amazingShows).parent().find('img').addClass('animate');
		}
	});

}

$(document).ready(main);