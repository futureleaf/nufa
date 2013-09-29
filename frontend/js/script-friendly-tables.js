/*
	Author:	Munawar Ahmed Mohammed
	Website:	www.mobifreaks.com
	Demo URI:	http://www.mobifreaks.com/u/6
	Article URI:	http://www.mobifreaks.com/u/5
*/

// counts total number of td in a head so that we can can use it for label extraction
	var head_col_count =  $('thead td').size();
	// loop which replaces td
	for ( i=0; i <= head_col_count; i++ )  {
		// head column label extraction
		var head_col_label = $('thead td:nth-child('+ i +')').text();
		// replaces td with <div class="column" data-label="label">
		$('tr td:nth-child('+ i +')').replaceWith(
			function(){
				return $('<div class="column" data-label="'+ head_col_label +'">').append($(this).contents());
			}
		);
	}	
	// replaces table with <div class="table">
	$('table').replaceWith(
		function(){
			return $('<div class="table">').append($(this).contents());
		}
	);	
	// replaces thead with <div class="table-head">
	$('thead').replaceWith(
		function(){
			return $('<div class="table-head">').append($(this).contents());
		}
	);	
	// replaces tr with <div class="row">
	$('tr').replaceWith(
		function(){
			return $('<div class="row">').append($(this).contents());
		}
	);	
	// replaces th with <div class="column">
	$('th').replaceWith(
		function(){
			return $('<div class="column">').append($(this).contents());
		}
	);