<?php
	class users_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		} 

	////////////////////// USERS HOME ////////////////////////////////

		public function index() {

			if(!$this->user) {
						die(Router::redirect('/index/index'));
			}

			# Set variables need for profile_widget view
				$name = $this->user->first_name;
				
				$timelines = User_feed::compile_timeline_feed($this->user);

			# Setup view
				$this->template->profile_widget = View::instance('v_users_profile_widget');
				$this->template->content = View::instance('v_timelines_index');
				$this->template->title = "Index";
				$this->template->profile_widget->user_info = $this->user;
				$this->template->content->links = $links;
				$this->template->content->timelines = $timelines;
				$this->template->subhead = "Your Timelines";


			# Render Template
				echo $this->template;	
		}


	////////////////////// SIGN UP ////////////////////////////////

		public function signup() {

			# Setup view
				$this->template->content = View::instance('v_users_signup');
				$this->template->title   = "Sign Up";

				$this->template->content->error = $error;

			# Render Template
				echo $this->template;

		}

		public function p_signup() {

			if (empty($_POST['first_name'])) {
				Router::redirect('/users/signup/error');
			} 

			elseif (empty($_POST['last_name'])) {
				Router::redirect('/users/signup/error');
			}
			elseif (empty($_POST['email'])) {
				Router::redirect('/users/signup/error');
			}
			elseif (empty($_POST['password'])) {
				Router::redirect('/users/signup/error');
			} else {

				$email = $_POST['email'];

			# More data we want stored with the user
				$_POST['created']  = Time::now();
				$_POST['modified'] = Time::now();

			# Encrypt the password  
				$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

			# Create an encrypted token via their email address and a random string
				$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

			# Check to see if the email is unique	
				if(!$this->userObj->confirm_unique_email($email)) {
					echo '
					<script>
					alert("This email is in use. Please log in to continue.");
					window.location.href=\'/users/login\';
					</script>';
;
				}

			# Insert this user into the database
				$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

				$this->userObj->create_initial_avatar($user_id);

			# log in new user
				if($user_id) {
					setcookie('token',$_POST['token'], strtotime('+1 year'), '/');
					Router::redirect('/users/index');
				}
			}
		}

	////////////////////// LOGIN ////////////////////////////////


		public function login($error=NULL) {
			# Setup view
				$this->template->content = View::instance('v_users_login');
				$this->template->title   = "Login";

			# Send error var to view if user login fails
				$this->template->content->error = $error;

			# Render template
				echo $this->template;
		}

		public function p_login() {

			# Get users email
				$email = $_POST['email'];

			#Use the login method provided by the core framework
				$token = $this->userObj->login($email, $_POST['password'], $_POST['timezone']);

			# If the login fails
				if(!$token) { 
					Router::redirect("/users/login/error"); 

				} else { # otherwise go to user home

					setcookie("token", $token, strtotime('+2 weeks'), '/');
					Router::redirect("/users/index");
				}

		} 



	////////////////////// LOGOUT ////////////////////////////////

		public function logout() {

			# Generate and save a new token for next login
				$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

			# Create the data array we'll use with the update method
			# In this case, we're only updating one field, so our array only has one entry
				$data = Array("token" => $new_token);

			# Do the update
				DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

			# Delete their token cookie by setting it to a date in the past - effectively logging them out
				setcookie("token", "", strtotime('-1 year'), '/');

			# Send them back to the main index.
				Router::redirect("/");

		} 



	////////////////////// PROFILE ////////////////////////////////

		public function profile ($route = NULL) {
			
			# Only logged in users are allowed...
				if(!$this->user) {
							die('Members only. <a href="/users/login">Login</a>');
				}

			# Check to see if specific routing params were called.
				$editing = false;
				$success = false;

				if ($route != NULL)	{

					if ($route ==='edit') {
						$editing = true;
					}else if ($route === 'success') {
						$success = true;
					} else {
						echo('This is not the page you are looking for...');
						die();
					}

				}			
			
			# Set up the View
				$profile_view = View::instance('v_users_profile');

				$this->template->content = $profile_view;

				$profile_view->image_upload = View::instance('v_users_upload_profile_image');

				$this->template->content->editing = $editing;

				$this->template->success = $success;
				$this->template->subhead = "<h1>Profile Settings</h1>";

				$profile_view->user_info = $this->user;

				$this->template->title   = "Profile";


			# Display the view
				echo $this->template;
																		
		}

		public function p_update_profile() {

		# If the user cancels their edits	
			if($name = $_POST['cancel']) {
				Router::redirect('/users/profile');
			}

		# Build the array to prevent injection attacks
			$data = Array (
				"first_name" => $_POST['first_name'],
				"last_name" => $_POST['last_name'],
				"email" => $_POST['email'],
				"website" => $_POST['website'],
				"twitter_handle" => $_POST['twitter_handle']
				);

		# Update the DB 
			DB::instance(DB_NAME)->update_row("users", $data, "WHERE user_id ="	.$this->user->user_id);
			
		# Bring user back to profile page
			Router::redirect('/users/profile/success');
		}


	////////////////////// UPLOAD PROFILE IMAGE //////////////////

		public function upload_profile_image($error=NULL) {

			$this->template->title = "Upload Image";
			$this->template->content = View::instance('v_users_upload_profile_image');

			$this->template->content->error = $error;
			$this->template->subhead = '<h1>Upload A New Profile Photo</h1>';

			echo $this->template;
		}


		public function p_upload_profile_image() {

			# Build the variables
				$user_id = $this->user->user_id;

		    $time = Time::now();
		    
		    $file_name = APP_PATH.AVATAR_PATH.$time.$user_id.".png"; 


	    # Check the file to be sure it meets size/type reqs
		    if(isset($_FILES['upload_image_file'])) {
		        $errors     = array();
		        $maxsize    = 2097152;
		        $acceptable = array(
		            'image/jpeg',
		            'image/jpg',
		            'image/gif',
		            'image/png'
		        );

		        if(($_FILES['upload_image_file']['size'] >= $maxsize) || ($_FILES["upload_image_file"]["size"] == 0)) {
		            $errors[] = 'File too large. File must be less than 2 megabytes.';
		        }

		        if(!in_array($_FILES['upload_image_file']['type'], $acceptable) && (!empty($_FILES["upload_image_file"]["type"]))) {
		            $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
		        }

	        # If all goes well, load the image into the DB and resize
		        if(count($errors) === 0) {

        	    # Load and resize the image
        		    $imgObj = new Image($file_name);
        		    $imgObj->open_image($file_name);
        		    $imgObj->get_dimensions(200,200);
        	    	$imgObj->save_image($file_name);

      	    	# Move the image to the uploads/avatars folder
		            move_uploaded_file($_FILES['upload_image_file']['tmp_name'], $file_name);

	            # Update the DB
		            DB::instance(DB_NAME)->update('users', Array("avatar" => $time.$user_id.".png"), "WHERE user_id = ".$user_id);

	            # Redirect to the profile page
		            Router::redirect('/users/profile/success');

	        # Otherwise spit out an error message, depending on the problem
		        } else {
		            foreach($errors as $error) {
		                echo '
		                <script>
		                alert("'.$error.'");
		                window.location.href=\'/users/upload_profile_image\';
		                </script>';

		            }
		            die(); 
		        }
		    }
		}   
		


	/////////////// USER TO USER RELATIONSHIPS //////////////////

			public function relationships() {

				# Setup view
					$this->template->content = View::instance("v_users_relationships");
					$this->template->title = "User Relationships";
					$this->template->subhead = "<h1>Find Fellow Collaborators</h1>";
					$this->template->profile_widget = View::instance('v_users_profile_widget');

				# Set variables need for profile_widget view
					$this->template->profile_widget->user_info = $this->user;
					$name = $this->user->first_name;

				# Build Query for users
					$q = "SELECT *
								FROM users";

					$users = DB::instance(DB_NAME)->select_rows($q);

				# Build Query connections
					$q = "SELECT *
								FROM users_users
								WHERE user_id = ".$this->user->user_id;

					$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

				# Set view variables
					$this->template->content->users = $users;
					$this->template->content->connections = $connections;

					echo $this->template;
			}

			public function follow($user_id_followed) {

				# Prepare the data array to be inserted
					$data = Array(
				    "created" => Time::now(),
				    "user_id" => $this->user->user_id,
				    "user_id_followed" => $user_id_followed
			    );

				# Do the insert
					DB::instance(DB_NAME)->insert('users_users', $data);

				# Send them back
					Router::redirect("/users/relationships");

			}

			public function unfollow($user_id_followed) {

		    # Delete this connection
			    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
			    DB::instance(DB_NAME)->delete('users_users', $where_condition);

		    # Send them back
			    Router::redirect("/users/relationships");

			}

			////////////// End User <-> User ///////////////////////////


	} # end of the class

?>