<?php

// Make everything in the vendor fold available
require 'vendor/autoload.php';

// instantiate (create instace of) plates library
$plates = new League\Plates\Engine('app/templates');

// Load the appropriate page
if( isset( $_GET['page'] ) ) {
	// The requested page
	$page = $_GET['page'];
} else {
	// Home page
	$page = 'landing';
}

// Load the appropriate files based on page
switch ($page) {
	// Home page
	case 'landing':
	case 'register':
	echo $plates->render('landing');
		break;
	
	// About page
	case 'about':
	echo $plates->render('about');	
		break;
	
	// Contact page
	case 'contact':
	echo $plates->render('contact');	
		break;
	
	// Stream page
	case 'stream':
	echo $plates->render('stream');
		break;
	
	// Login page
	case 'login':
	echo $plates->render('login');
		break;

	default:
	echo $plates->render(' Error 404');
		break; 
}