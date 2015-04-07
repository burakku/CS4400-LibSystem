<?php
	session_start();

	// Direct to a new page
	function redirect($new_location)
	{
		header("Location: " . $new_location);
		exit;
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>