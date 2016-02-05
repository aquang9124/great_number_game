<?php
	session_start();
	if(isset($_SESSION['errors']))
	{
		foreach ($_SESSION['errors'] as $error) 
		{
		echo "<p class='error'>" . $error . "</p>";
		}
		unset($_SESSION['errors']);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Great Number Game</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
</head>
<style type="text/css">
	h1, h2, p, form {
		text-align: center;
	}

	form .nums {
		display: block;
		margin-left: 43.5%;
		margin-bottom: 10px;
	}

	.box {
		width: 200px;
		height: 100px;
		color: white;
		margin: 0 auto;
	}

	.incorrect {
		background-color: red;
	}

	.correct {
		background-color: green;
	}

	.error {
		color: #ff4d4d;
		font-size: 2em;
	}

	.btn-form {
		background-color: green;
		width: 200px;
		height: 70px;
		margin: 0 auto;
		margin-bottom: 20px;
	}

	.reset-btn {
		background-color: green;
		color: white;
		
	}

</style>
<body>
	<div id="container">
		<h1>Welcome to the Great Number Game!</h1>
		<h2>I am thinking of a number between 1 and 100</h2>
		<p>Take a guess!</p>
		<?php
		if(isset($_SESSION['too_low']))
		{
			echo $_SESSION['too_low'];
			unset($_SESSION['too_low']);
		}
		?>
		<?php 
		if(isset($_SESSION['too_high']))
		{
			echo $_SESSION['too_high'];
			unset($_SESSION['too_high']);
		}
		?>
		<?php 
		if(isset($_SESSION['correct']))
		{
			echo $_SESSION['correct'];
			echo "<form class='btn-form' action='great_nums.php' method='post'> 
				  <input type='submit' class='reset-btn' name='replay' value='replay'>	
				  </form>";
			unset($_SESSION['correct']);
		}
		?>
		<form action="great_nums.php" method="post">
			<input type="number" name="guess" class="nums">
			<input type="hidden" name="action" value="number">
			<input type="submit" value="Submit Guess">
		</form>
	</div>
</body>
</html>
