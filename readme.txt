=== Plugin Name ===
Contributors: ig & Nick [LINICKX] Bettison
Donate link: 
Tags: punBB, forum, topics, sidebar
Requires at least: 2.0.9
Tested up to: 2.0.9
Stable tag: 0.3

This plugin is based on the phpbb_recent_topics pluging made by Nick [LINICKX] Bettison http://www.linickx.com/archives/392/recent-phpbb-topics-on-wordpress-plugin-v04
i just took the pluging made for phpbb forum and i adapted to work with punbb forums
This plugin grabs your recent punBB forum topics for you to display in wordpress, you can display them either in a post, a page or in your theme with punbb_topics function.

== Description ==

Do you have a punBB forum, do you want to drag your blog readers into your forum ? Then this plugin might just help, you can include somewhere in wordpress a list of recent punbb threads (topics) in a page, a post, and even in your theme - so your sidebar for example !

== Installation ==

1. unzip punbb_recent_topics.zip in your `/wp-content/plugins/` directory. (You'll have a new directory, with this plugin in /wp-content/plugins/punbb_recent_topics)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the plugin, you need to tell wordpress about punbb, this is done in the wordpress menu 'Options' -> 'punBB Recent Topics'
	The following Settings are required:
		* The name of your punBB database (e.g punbb)
		* The name of the table where topics are held (the default is punbb_topics )
		* The full url of your forum for links (e.g. http://www.mydomain.com/forum)
		* The number of topics to show. (If left blank you get 5)
4. Hit 'Update Options"
5. 	To output the list of topics in a page or post... 
		* create a new page/post, type {punbb_recent_topics} , hit 'Publish' or 'Create new page'
	To output the list of topics in your theme sidebar...
		* edit sidebar.php and inside <div id="sidebar"> type...
		`<?php
	        if (function_exists('punbb_topics')) {
				punbb_topics();
			} 
		?>`


more information: http://varios2.wordpress.com/2008/04/25/punbb-recent-topics-wordpress-pluging/
