<?php
	class User_feed {

		# DB call for your links and the links of those you follow
		
			public static function compile_feed ($user) {

		    $q = "SELECT 
	            links.lede,
	            links.title,
	            links.created,
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
		        	OR links.creator_id = $user->user_id
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

	}
?>