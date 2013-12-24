<?php
	class timelines_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		
		# Send the user back to the login page if they're not logged in
			if(!$this->user){
				Router::redirect('/index/index');
			}
		}

		/////////////////////// Index /////////////////////////////////////
		public function index() {

			# Pull in arrays from User_feed
				$timelines = User_feed::compile_timeline_feed($this->user);


			# Render View
				$this->template->content = View::instance('v_users_index');
				$this->template->title = "All Timelines";
				$this->template->profile_widget = View::instance('v_users_profile_widget');
				$this->template->content->timelines = $timelines;

				echo $this->template;
		}


		/////////////////////// Add new Timeline ///////////////////////////
		public function add() {

			# Render template
				$this->template->content = View::instance('v_timelines_add');
				$this->template->title = "New Timeline";
				$this->template->content->topics = Topic::list_topics();
				echo $this->template;
		
		}

		public function p_add() {

			# Append relevant data to link content before sending to DB
				$data = Array (
					"title" => $_POST['title'],
					"created" => Time::now(),
					"creator_id" => $this->user->user_id,
					"topic_id" => $_POST['topic_id']	 
					);

			# Load into the DB
				$timeline_id = DB::instance(DB_NAME)->insert('timelines',$data);

				$link = Array (
					"timeline_id" => $timeline_id,
					"href" => $_POST['href'],
					"title" => User_feed::get_remote_page_title($_POST['href']),
					"creator_id" => $this->user->user_id,
					"created" => Time::now()
				);

				DB::instance(DB_NAME)->insert('links',$link);

				Router::redirect('/users/index');


		}

		public function detail($timeline_id=NULL) {

			if ($timeline_id==NULL) {
				Router::redirect('/users/index');
			}

			# Pull associated links
				$q = "SELECT links.href,
										 links.creator_id, 
										 links.timeline_id,
										 links.created,
										 users.first_name,
										 users.last_name
							 	FROM links 
							INNER JOIN users 
								ON links.creator_id = users.user_id
								WHERE timeline_id = $timeline_id
								ORDER BY created DESC";
				$links = DB::instance(DB_NAME)->select_rows($q);

			# Pull timeline titles
				$q = "SELECT title FROM timelines WHERE timeline_id = $timeline_id";

				$subhead = DB::instance(DB_NAME)->select_field($q);

			# Set variables need for profile_widget view
				$name = $this->user->first_name;

			# Render View
				$this->template->content = View::instance('v_timelines_detail');
				$this->template->title = "Timeline Detail";
				$this->template->content->links = $links;
				$this->template->content->created = $created;
				$this->template->subhead = $subhead;
				$this->template->add_link = View::instance('v_links_add');
				$this->template->add_link->timeline_id = $timeline_id;
				$this->template->profile_widget = View::instance('v_users_profile_widget');
				$this->template->profile_widget->user_info = $this->user;

				echo $this->template;

		}

}