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

