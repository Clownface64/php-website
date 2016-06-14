<?php

	class LandingController {
	
		// Properties
		private $emailMessage;

		private $passwordMessage;

		// Constructor
		public function __construct() {

			// If the user has submitted the registration form
			// echo '<pre>';
			// print_r( $_POST ); 
			// echo '<pre>';
			if ( isset($_POST['new-account']) ) {

				$this->validateRegistrationForm();

			}

		}
	
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
		
		// Prepear the container for data
		$data = [ ];

		// If there is an amail error
		if($this->emailMessage != ''){

			$data['emailMessage'] = $this->emailMessage;

		}

		if($this->passwordMessage != ''){

			$data['passwordMessage'] = $this->passwordMessage;

		}

		echo $plates->render('landing', $data);
	}

	private function validateRegistrationForm() {

		$totalErrors = 0;

		// Make sure an email has been provided and that it is valid
		if( $_POST['email'] == '' ) {

			//Email is invalid
			$this->emailMessage = 'Invalid E-Mail';
			$totalErrors++;

		}
		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {

			//password is to short
			$this->passwordMessage = 'Must be at least 8 characters';
			$totalErrors++;

		}

		// Determine if this data is valid to go into the database
		if( $totalErrors == 0) {

			// Vallidation passed
			
		}

	}

}



































































