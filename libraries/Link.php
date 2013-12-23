<?php
	class Link {

		public static function add() {

			# Setup view
				$this->template->content = View::instance('v_links_add');
				$this->template->title = "New Link";

			# Render template
				echo $this->template;
		}

		public static function p_add() {
			# Add fields to link entry before writing to DB
				$_POST['user_id'] = $this->user->user_id;

				$_POST['created'] = Time::now();
				$_POST['modified'] = Time::now();
			# Write link to DB
				DB::instance(DB_NAME)->insert('links',$_POST);

				echo "Your link has been added.";
		}	

	}
?>