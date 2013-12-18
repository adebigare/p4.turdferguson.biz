<?php 

class Topic {

	# DB call for your links and the links of those you follow
	
		public static function list_topics () {

			$q =	"SELECT * 
							FROM topics
							ORDER BY name";
			
			$topics = DB::instance(DB_NAME)->select_rows($q);

			return $topics;
		}
}
