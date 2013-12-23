$(document).ready(function (){
	var $container = $('#container');
	$.embedly.defaults.key = 'eb8655d55cda4cdfb48466f52b4ca264';
	// initialize
	$container.masonry({
	  columnWidth: 400,
	  itemSelector: '.item'
	});

	$('a').embedly({query: {chars: 50}});

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




});	


// encode URI 

// Send encoded URI to embedly  API

// Receive response 

// parse into array

// parse array into html elements

// style elements 

// load onto DOM 