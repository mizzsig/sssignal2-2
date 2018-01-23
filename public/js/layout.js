$(function () {
	$(document).click(function (event) {
		if (!$(event.target).closest('.small-menu').length && !$(event.target).closest('.menu-trigger').length) {
			$('.small-menu').removeClass('small-menu-slide-down');
			$('.small-menu').addClass('small-menu-slide-up');
		}
	});

	$('.menu-trigger').on('click', function () {
		$('.small-menu').toggleClass('small-menu-slide-up');
		$('.small-menu').toggleClass('small-menu-slide-down');
	});
});
