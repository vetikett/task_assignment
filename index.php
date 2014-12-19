<?php

require_once 'app/database.php';
require_once 'app/auth.php';
require_once 'app/user.php';
require_once 'app/task.php';

if ( !$_SESSION['auth'] ) {
    header("location: login.php");
}

if( isset($_POST['logout']) ) {
    logout();
}

if ( isset($_POST['create_task']) ) {
	createTask($_POST['task'], $_SESSION['user']->id);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css"/>
	<script src="lib/jquery-2.1.1.js"></script>
	<script src="js/main.js"></script>
</head>
<body>

	<?php require_once "header.php"; ?>

	<div class="main-container">
		<div class="wrapper">
			<div class="create-task">
				<form method="post">
					<input type="text" name="task"/>
					<input type="submit" name="create_task" value="create"/>
				</form>
			</div>

			<div class="tasks">
				<ul>
					<?php foreach( listTasks() as $item ) {
						echo "<li>" .
								"<input class='task-checkbox' name='status' type='checkbox'" . $item->checked . "/>" .
								"<input type='hidden' id='" . $item->id . "'/>" .
								"<p>" . $item->task . "</p>" .
								"<form class='tasks-crud' method='post'>" .
									"<input class='task-edit' type='submit' name='edit' value='edit'/>" .
									"<input class='task-remove' type='submit' name='delete' value='remove'/>" .
								"</form>" .
							"</li>";
					} ?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>

