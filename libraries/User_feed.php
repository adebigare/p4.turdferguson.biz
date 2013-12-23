<?php
	class User_feed {

		# DB call for your links and the links of those you follow
		
			public static function link_feed ($user) {

		    $q = "SELECT 
	            links.title,
	            links.created,
	            links.href,
	            links.creator_id AS link_creator_id,
	            users_users.user_id AS follower_id,
	            users.first_name,
	            users.last_name
		        FROM links
		        LEFT OUTER JOIN users_users 
	            ON links.creator_id = users_users.user_id_followed
		        INNER JOIN users 
	            ON links.creator_id = users.user_id
		        WHERE users_users.user_id = $user->user_id
		        ORDER BY created DESC";

				$feed = DB::instance(DB_NAME)->select_rows($q);
				return $feed;

			}

		# Method to grab the meta tag "title" from the content page
			
			public static function get_remote_page_title ($url) {
				$data = file_get_contents($url);
				$regex = '/<title[^>]*>(.*)<\/title>/';
				preg_match($regex,$data,$match);

				return $match[1]; 
			}

			public static function compile_timeline_feed ($user) {
			// get timelines
				$q = "SELECT * FROM timelines 
							LEFT OUTER JOIN users_users 
								ON timelines.creator_id = users_users.user_id_followed 
							INNER JOIN users 
								ON timelines.creator_id = users.user_id 
							WHERE users_users.user_id = $user->user_id";

				$timelines = DB::instance(DB_NAME)->select_rows($q);
				return $timelines;

			}
			////// This method to be moved into the model post-project ////////////
			
			// public static function embedly_array($timeline_id) {
			// 	//query table for links on tables assoc. with user_id_followed
			// 	Debug::printr($timeline_id);

			// 	$q = "SELECT links.href,
			// 							 links.creator_id, 
			// 							 links.timeline_id 
			// 				 	FROM links 
			// 				LEFT OUTER JOIN users_users 
			// 					ON links.creator_id = users_users.user_id_followed 
			// 				INNER JOIN users 
			// 					ON links.creator_id = users.user_id
			// 					WHERE timeline_id = 1";
			// 	$links = DB::instance(DB_NAME)->select_rows($q);
			// 	//encode links 
			// 	return $links;
			// 	// new http extract req to embedly
			// 	// return array 
			// }
	}
?>