<?php

	class links_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		
		# Send the user back to the login page if they're not logged in
			if(!$this->user){
				echo '
				<script>
				alert("Oops, you\'ve found a members only area, and you\'re not logged in.");
				window.location.href=\'/users/login\';
				</script>';
			}
		}

	///////////////////// links Feed ///////////////////////////////////
	
		public function index($links = NULL) {
		# View
			$this->template->content = View::instance('v_links_index');
			$this->template->add_link = View::instance('v_links_add');
			$this->template->title = 'Links';
			$this->template->profile_widget = View::instance('v_users_profile_widget');
			$this->template->subhead = "<h1>Latest News</h1>";

		# Query
			$this->template->content->links = User_feed::link_feed($this->user);

			echo $this->template;

		}

	///////////////////// Add New Link ///////////////////////////////////

		public function add() {

			# Setup view
				$this->template->content = View::instance('v_links_add');
				$this->template->title = "New Link";

			# Render template
				echo $this->template;
		}

		public function p_add() {

			$data = Array (
				"creator_id" => $this->user->user_id,
				"created" => Time::now(),
				"title" => User_feed::get_remote_page_title($_POST['href']),
				"timeline_id" => $_POST['timeline_id'],
				"href" => $_POST['href']
				);

			# Load into the DB
				DB::instance(DB_NAME)->insert('links',$data);

				// Router::redirect('/timelines/index');
		}

	}

?>