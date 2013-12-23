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
				$this->template->content = View::instance('v_timelines_index');
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

			// $links = DB::instance(DB_NAME)->select_rows($q);
			$q = "SELECT links.href,
									 links.creator_id, 
									 links.timeline_id 
						 	FROM links 
						LEFT OUTER JOIN users_users 
							ON links.creator_id = users_users.user_id_followed 
						INNER JOIN users 
							ON links.creator_id = users.user_id
							WHERE timeline_id = $timeline_id";
			$links = DB::instance(DB_NAME)->select_rows($q);
			Debug::printr($links);
			//encode links 


			# Populate template with links

			# Build template out of results


			# Render View
				$this->template->content = View::instance('v_timelines_detail');
				$this->template->title = "Timeline Detail";

				echo $this->template;

		}

		public function p_detail() {
				$links = User_feed::embedly_array($this->user);

				echo json_encode($links);
		}

}