<title>Sprinter - Set your goal</title>
<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Set Goal</h1>

<?php

	echo '
		Your sprint goal is: ' . $UserGoal[3] . '.

		<br><br>

		<form action="api.php">
			
			<div class="row">
				<div class=col-lg-6>
					<div class="input-group">
						<input name="action" type="hidden" value="setUserGoal">
						<input name="do" type="hidden" value="1">
						<input name="user" type="hidden" value="' . $_SESSION['userID'] . '">
						<input name="goal" type="text" class="form-control" maxlength="10" placeholder="' . $UserGoal[3] . '" required>
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary">Set Goal</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	';
?>