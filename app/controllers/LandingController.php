<?php

	class LandingController {
	
		// Properties
		private $emailMessage;

		private $passwordMessage;

		private $dbc;

		// Constructor
		public function __construct($dbc) {

			//save the database connection for later
			$this->dbc = $dbc;

			// If the user has submitted the registration form
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

		//filter user data before using it in a query
		$filteredEmail = $this->dbc->real_escape_string($_POST['email']);

		$sql = "SELECT email 
				FROM users
				WHERE email =''$filteredEmail";

		//run the query
		$result = $this->dbc->query($sql);

		//if the queary failed or there is a result
		if( !$result || $result->num->rows > 0 ){

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
			
			

			// hash the password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			//prepare the SQL
			$sql = "INSERT INTO users (email, password) 
					VALUES('$filteredEmail','$hash')";

			//run the user query
			$this->dbc->query($sql);

			//Check to make sure it works

			//log the user in
			$_SESSION['id'] = $this->dbc->insert_id;
			

			//redirect the user to the stream page
			header('Location: index.php?page=stream');
		}

	}

}



































































