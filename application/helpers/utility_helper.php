<?php

function asset_url(){
   return base_url().'assets/';
}

function link_url(){
   return base_url().'index.php/';
}

function pre($item, $exit=false){
	echo '<pre>';
	print_r($item);
	echo "</pre>";
	if($exit){
		exit;
	}
}

function getBookCategories($id=false)
{
	$categories = array(
		'1'=> 'Academic and Professional',
		'2'=> 'Biographies & Autobiographies',
		'3'=> 'Business, Investing and Management',
		'4'=> 'Children',
		'5'=> 'College Text & Reference',
		'6'=> 'History and Politics',
		'7'=> 'Literature & Fiction'
	);

	if($id){
		return $categories[$id];
	} else {
		return $categories;
	}
}


function getOrderStatus($id=false)
{
	$status = array(
		'1'=> 'Order accepted',
		'2'=> 'Order processing',
		'3'=> 'Items shipped',
		'4'=> 'Items delivered',
		'5'=> 'Order canceled'
	);

	if($id){
		return $status[$id];
	} else {
		return $status;
	}
}
