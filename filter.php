<?php


$books = [
	     	[
	     		'name' => 'Do Androids Dream of Electron',
	     		'author' => 'Philip K. Dick',
	     		'releaseyear' => 1968,
	     		'purchaseUrl' => 'http://example.com'

	     	],
	     	[
	     		'name' => 'Project Hail Mary',
	     		'author' => 'Andy Weir',
	     		'releaseyear' => 2021,
	     		'purchaseUrl' =>'http://example.com'

	     	],
	     	[
	     		'name' => 'The Martian',
	     		'author' => 'Andy Weir',
	     		'releaseyear' => 2011,
	     		'purchaseUrl' =>'http://example.com'

	     	],
	     ];

	     function filter($items,$fn){
	     	$filteredItems = [];

	     	foreach ($items as $item) {
	     		if($fn($item)){
	     			$filteredItems[] = $item;
	     		}
	     	}
	     	return $filteredItems;
	     }

	     $filteredBooks = array_filter($books, function($book){
	     	return $book['releaseyear'] <2011;
	     });