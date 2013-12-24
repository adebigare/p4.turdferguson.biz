$(document).ready(function (){

	$.embedly.defaults.key = 'eb8655d55cda4cdfb48466f52b4ca264';

	$('a').embedly({query: {chars: 50}});

	var $container = $('#container').masonry();


	//initialize Masonry after all images have loaded  
	$container.imagesLoaded( function() {
	  $container.masonry({
	  	'itemSelector': '.item',
	  	'stamp':'.stamp',
	  	"isFitWidth": true,
	  	columnWidth: container.querySelector('.grid-sizer'),
  	});
	});

	$('#add-link-form').ajaxForm({
			type: 'POST',
			url: '/links/p_add',
			beforeSubmit: function() {
				$('#results').html("Adding...");
			},
			success: function(response) {
				$('#results').html("Your post was added.");
				window.location.reload(true);
			}
	});

});	

	///////// Function for more fine grained control of Embedly. Use post-project /////////
	// $.ajax ({
	// 	type: 'POST',
	// 	url: '/timelines/p_index',
	// 	success: function (response) {
	// 					var data = $.parseJSON(response);
		
	// 					var deferred = $.embedly.extract([data], {
	// 					  key: 'eb8655d55cda4cdfb48466f52b4ca264',
	// 					  query: {
	// 					    words: 20,
	// 					  }

	// 					}).progress(function(data){
	// 					  console.log(data.url, data.title);

	// 					}).done(function(results){
	// 					  $.each(results, function(i, data){
	// 					    console.log(data.original_url);
	// 					    return data;
	// 						});
	// 				  });
 //  	},

	// });






