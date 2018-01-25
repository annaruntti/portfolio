// $('.grid').masonry({
//   // options
//   itemSelector: '.grid-item',
//   columnWidth: 25
// });

// initialisoi masonry
// const $grid = $('.grid');

// init Masonry after all images have loaded
$('.grid').masonry({
	itemSelector: '.grid-item',
	columnWidth: '.grid-sizer',
	percentPosition: true,
});

// init Masonry
var $grid = $('.grid').masonry({
// options...
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
$grid.masonry('layout');
});
