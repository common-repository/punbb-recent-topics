<?php

# Get the Options from the Database

$PUNBBDB = stripslashes(get_option('prt_punbb_db'));
$TOPIC_TABLE = stripslashes(get_option('prt_punbb_tt'));
$SITEURL = stripslashes(get_option('prt_punbb_url'));

# Setup our Wordpress DB Connection
	global $wpdb;

# Are we a function call or Page call ? Set up our list length...

	if (is_null($LIMIT)) { 
		
		$LIMIT = stripslashes(get_option('prt_punbb_LIMIT'));

		if (is_null($LIMIT)) {
                $LIMIT = 5;
	        }
	}

# Connect to pun BB
$wpdb->select($PUNBBDB);

# Run The query
$results = $wpdb->get_results("SELECT * FROM $TOPIC_TABLE ORDER BY $TOPIC_TABLE.`posted` DESC LIMIT 0 , $LIMIT ");

if ($results){
	
		echo "<ul>";	
	
	# Loop away baby !
	foreach ($results as $topic)
		{

		echo "<li>";
		echo "<a href='" . $SITEURL . "/viewtopic.php?id=$topic->id'>";
		echo "$topic->subject";
                echo "</a>";
		echo "<br />\n";
                echo "<small><i>" . date("d/M/y - g:i a", $topic->posted) . "</i></small>\n";
		echo "</li>";
		
		}

		echo "</ul>";
} else {
		echo "<h2> punBB Error </h2>";
}

# Connect back to wordpress :-)
$wpdb->select(DB_NAME);

?>
