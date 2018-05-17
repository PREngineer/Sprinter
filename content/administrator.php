<title>Sprinter - Administrator</title>
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

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Administrator</h1>

<a link="index.php?display=CreateSprint" style="cursor: pointer;">Create Sprint</a>
<br>
<a link="index.php?display=DeleteUser" style="cursor: pointer;">Delete User</a>
<br>
<a link="index.php?display=EditSprint" style="cursor: pointer;">Edit Sprint</a>
<br>
<a link="index.php?display=SendInvite" style="cursor: pointer;">Send Invite</a>
<br>