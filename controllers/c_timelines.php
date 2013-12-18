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
			echo('index called');
		}


		/////////////////////// Add new Timeline ///////////////////////////
		public function add() {
				$this->template->content = View::instance('v_timelines_add');
				$this->template->title = "New Timeline";
				$this->template->content->topics = Topic::list_topics();

			# Render template
				echo $this->template;
		
		}

		public function p_add() {

			# Append relevant data to link content before sending to DB
			$data = Array (
				"title" => $_POST['title'],
				"created" => Time::now(),
				"creator_id" => $this->user->user_id,
				"topic_id" => 1 			######## TBD ########### 
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

				Router::redirect('/timelines/index');


		}

}