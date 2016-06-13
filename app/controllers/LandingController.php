<?php

	class LandingController {
	
		// Properties
	
		// Constructor
	
		// Methods (functions)
		public function registerAccount() {
	
			// Validate the user's data
	
			// Check the to see if the email is in use
	
			// Check the strength of the password
	
			// Register the account OR show error message
	
			// If successfull, log user in and redirect to their brand new stream page (account)
	
		}
	
	public function buildHTML() {

		// instantiate (create instace of) plates library
		$plates = new League\Plates\Engine('app/templates');
		
		echo $plates->render('landing');
	}	
}