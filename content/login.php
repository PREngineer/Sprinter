<title>Sprinter - Login</title>
<?php
include '../functions/Init.php';
include '../functions/DB.php';

if( !empty($_POST) )
{
	echo '<script>alert("Inside the action");</script>';
	$user = $_GET['username'];
	$pass = $_GET['password'];

	$res = login($user, $pass);

	if( $res['Result'] )
	{
		$userdata = mysqli_fetch_all( $res['Data'] )[0];

		// Initialize the session
		session_start();

		$_SESSION['userID']    = $userdata[0];
		$_SESSION['fName']     = $userdata[1];
		$_SESSION['initials']  = $userdata[2];
		$_SESSION['lName']     = $userdata[3];
		$_SESSION['userRole']  = $userdata[4];

		// Extend cookie life time
		// A year in seconds = 365 days * 24 hours * 60 mins * 60 secs
		$cookieLifetime = 365 * 24 * 60 * 60;
		setcookie("Sprinter",session_id(),time() + $cookieLifetime);

		header('Location: index.php?display=Leaderboard&LoggedIn=1');
	}
	if( $res['Result'] == false)
	{
		echo '<script>alert("Failed");</script>';
		//header('Location: index.php?display=Login&Success=0');
	}
}
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

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Login</h1>

<!-- Form STARTS here -->
<form class="container" method="POST" id="loginPage">

 <input name="display" type="hidden" value="Login">
  <hr>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="enterpriseID"> <label class="text-danger">*</label> Username</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="username" type="text" class="form-control" id="username" placeholder="john.p.doe" aria-describedby="usernameHelp" required>
    </div>
    <small id="usernameHelp" class="sr-only form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>

  <div class="form-group">
    <label for="Password"> <label class="text-danger">*</label> Password</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="password" type="password" class="form-control" id="password" placeholder="password" required>
    </div>
  </div>

  <!--Login Button-->
</div >
  <div>
    <input class="btn btn-primary" type="submit" value="Submit">
  </div>
  <hr>
  <p>
	Don't have an account?  <a link="index.php?display=Register" style="cursor: pointer;">Create one here!</a>
  </p>

</form>

<!-- ******************* END FORM ******************* -->

<script type="text/javascript">
   $(document).ready(function()
   {
    $('#loginPage').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons:
        {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:
        {
            username:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your Enterprise ID.'
                    }
                }
            },
            password:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your password.'
                    }
                }
            },
        }
      })

      // POST if everything is OK
      .on('success.form.bv', function(e)
      {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('display'), $form.serialize(), function(result)
            {
                console.log(result);
            }, 'json');
      });
});
</script>
