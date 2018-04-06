<?php
	include 'class.JSONHandler.php';
	jsonHandler::jsonGet("facebook.json","https://graph.facebook.com/v2.12/211202900/posts?access_token=tokenNumber","America/Los_Angeles");//call class and get the static method.
?>
