<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<script>
  $(document).ready(function()
  {
    $("a").click(function()
    {
      var url = $(this).attr("link");
      window.location = url;
    });
  });
</script>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Change Goal</h1>

<?php

	$UserGoal = get_UserGoal( date("Y-m-d"), $_SESSION['userID'] )[0];
				
	echo '
		Your sprint goal is: ' . $UserGoal[3] . '.

		<br>

		<form action="api.php?action=setUserGoal&goalID=' . $UserGoal[0] . '">
			<div class="row">
				<div class=col-lg-6>
					<div class="input-group">
						<input name="goal" type="text" class="form-control" maxlength="10" placeholder="' . $UserGoal[3] . '" required>
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary">Change Goal</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	';
?>