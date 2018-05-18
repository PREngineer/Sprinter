<?php

//echo '<br><br><br><br>Loaded Alerts';

/*
This contains the action alert notifications that appear on top.

The alerts are dismissible but they disappear after 5 a seconds with an upper scroll.
*/
?>

<!-- Close the alerts after 5 seconds -->
<script>
  window.setTimeout(function()
  {
    $(".alert").fadeTo(500, 0).slideUp(500, function()
    {
        $(this).remove();
    });
  }, 5000);
</script>

<?php

/*
* Administrator page messages
*/
{
	// Message upon 
	if( ($_GET['display'] == 'Administrator') )
	{
		if($_GET['CreateSprint'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
					<button type = "button" class="close" data-dismiss = "alert">x</button>
					The sprint has been registered.
				</div>';
		}
		else if($_GET['something'] == '1')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					[!] .  Please, try again.</div>';
		}
	}
}

/*
* CreateSprint page messages
*/
{
	// Message upon 
	if( ($_GET['display'] == 'CreateSprint') )
	{
		if($_GET['CreateSprint'] == '0')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
					<button type = "button" class="close" data-dismiss = "alert">x</button>
					[!]  An error occurred.  The sprint was not registered.
				</div>';
		}
	}
}

/*
* EditSprintList page messages
*/
{
	// Message upon 
	if( ($_GET['display'] == 'EditSprintList') )
	{
		if($_GET['DeleteSprint'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
					<button type = "button" class="close" data-dismiss = "alert">x</button>
					The sprint has been deleted.
				</div>';
		}
		else if($_GET['EditSprint'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					The sprint has been successfully updated.</div>';
		}
		else if($_GET['EditSprint'] == '0')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					[!] An error occurred.  The sprint was not updated.  Please, try again.</div>';
		}
	}
}

/*
* Leaderboard page messages
*/
{
	// Messages in the Leaderboard page
	if($_GET['display'] == 'Leaderboard')
	{
		// If logged in
		if($_GET['LoggedIn'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
				<button type = "button" class="close" data-dismiss = "alert">x</button>
				You have been logged in.
				</div>';
		}
		
		// If Goal was set
		if($_GET['SetGoal'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
				<button type = "button" class="close" data-dismiss = "alert">x</button>
				Your goal has been set.
				</div>';
		}
		
		// If Goal was not set
		if($_GET['SetGoal'] == '0')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
				<button type = "button" class="close" data-dismiss = "alert">x</button>
				Your goal could not be set.
				</div>';
		}
		
		// If Data was added
		if($_GET['AddData'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
				<button type = "button" class="close" data-dismiss = "alert">x</button>
				Your data has been added.
				</div>';
		}
		
		// If data was not added
		if($_GET['AddData'] == '0')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
				<button type = "button" class="close" data-dismiss = "alert">x</button>
				Your data could not be added.
				</div>';
		}
	}
}

/*
* Login page messages
*/
{
	// Messages in the Login page
	if($_GET['display'] == 'Login')
	{
		// If failed to validate
		if($_GET['Success'] == '0')
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
				<button type="button" class="close" data-dismiss="alert">x</button>
				[!] The information provided is not valid.  Please, try again.</div>';
		}
	}
}

/*
* Register page messages
*/
{
	// Message upon Registrations
	if( ($_GET['display'] == 'Register') )
	{
		if( $_GET['success'] == '1')
		{
			echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
					<button type = "button" class="close" data-dismiss = "alert">x</button>
					New account has been recorded!
				</div>';
		}
		else if( $_GET['error'] == '0' )
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					[!] The registration code provided is invalid or has expired.</div>';
		}
		else if( $_GET['error'] == '1')
		{
			echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					[!] This account already exists.</div>';
		}
		else if( $_GET['error'] == '2' )
		{
			echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
					<button type="button" class="close" data-dismiss="alert">x</button>
					[!] Error(s) occurred while attempting to register the account.</div>';
		}
	}
}



?>
