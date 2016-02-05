<?php
	session_start();

	if(!isset($_SESSION['rand_num'])) 
	{
		$_SESSION['rand_num'] = rand(1,100);
	}

	if(isset($_POST['action']) && $_POST['action'] == 'number')
	{
		$errors = array();
		if(empty($_POST['guess']))
		{
			$errors[] = "Please make a guess!";
		}
		if(count($errors) > 0)
		{
			$_SESSION['errors'] = $errors;
			header('location: nums.php');
		}
		else 
		{
			header('location: nums.php');
		}
	}

	if(isset($_POST['guess']) && !empty($_POST['guess'])) {
		if($_POST['guess'] == $_SESSION['rand_num']) 
		{
			$_SESSION['correct'] = "<h3 class='correct box'>" . $_POST['guess'] . " was the correct number!</h3>";
		}

		if($_POST['guess'] < $_SESSION['rand_num']) 
		{
			$_SESSION['too_low'] = "<h3 class='incorrect box'>" . $_POST['guess'] . " was the wrong number! Too low!</h3>";
		}

		if($_POST['guess'] > $_SESSION['rand_num']) 
		{
			$_SESSION['too_high'] = "<h3 class='incorrect box'>" . $_POST['guess'] . " was the wrong number! Too high!</h3>";
		}
	}

	if(isset($_POST['replay'])) {
		session_unset();
		header("Location: nums.php");
	}

	header('Location: nums.php');
?>