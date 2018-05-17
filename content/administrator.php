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
<a link="mailto:?subject=Thought%20you%20would%20like%20to%20join%20in%20on%20the%20fun&body=Visit%20this%20web%20page%20to%20register.%0A%0Use%20the%20following%20code%20to%20register: ' . $code .
                  '%0A%0ASprinter%20is%20an%20application%20used%20to%20track%20the%20progress%20of%20healthy%20challenges%20.%0A%0AClick here: ' . $url . '" class="btn btn-success" role="button">Send Invite</a>
<br>