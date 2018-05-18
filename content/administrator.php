<title>Sprinter - Administrator</title>
<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectAdmin();

$code = get_SprintData( date("Y-m-d") )[0][6];

$url = 'http://' . $_SERVER['HTTP_HOST'] . '/Sprinter/content/index.php?display=Register';

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

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Administrator</h1>

<a link="index.php?display=CreateSprint" style="cursor: pointer;">Create Sprint</a>
<br><br>
<a link="index.php?display=DeleteUser" style="cursor: pointer;">Delete User</a>
<br><br>
<a link="index.php?display=EditSprintList" style="cursor: pointer;">Edit Sprint</a>
<br><br>
<?php
echo '<a link="mailto:?
		subject=Thought%20you%20would%20like%20to%20join%20in%20on%20the%20fun
		&body=Sprinter%20is%20an%20application%20used%20to%20track%20the%20progress%20of%20healthy%20challenges.
		%0A%0AVisit%20this%20web%20page%20to%20register%20and%20use%20the%20following%20code%20to%20register: ' . $code .'
		%0A%0AClick here: ' . $url . '" style="cursor: pointer;">Send Invite</a>';
				  
?>