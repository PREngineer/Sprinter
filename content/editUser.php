<title>Sprinter - Edit User</title>
<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Edit User</h1>

<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectAdmin();

$user = get_User($_GET['username'])[0];

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

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Administrator" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
  <li>
    <a link="index.php?display=DeleteUser" style="cursor:pointer;">
      User List
    </a>
  </li>
</ol>

<!-- Form STARTS here -->
<form class="container" id="editUserPage" action="api.php">

  <input name="action" type="hidden" value="editUser">
  <input name="do" type="hidden" value="1">
  <hr>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="username"> <label class="text-danger">*</label> Username</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="username" type="text" class="form-control" id="username" placeholder="john.p.doe" aria-describedby="usernameHelp" value="<?php echo $user[0]; ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label for="password"> <label class="text-danger">*</label> Password</label> <label class="text-danger">(ONLY IF YOU WANT TO CHANGE IT)  Password must not have spaces.</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="password" type="password" class="form-control" id="password" placeholder="password">
    </div>
  </div>
  
  <div class="form-group">
    <label for="fName"> <label class="text-danger">*</label> First Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="fName" type="text" class="form-control" id="fName" placeholder="john.p.doe" aria-describedby="fNameHelp" value="<?php echo $user[2]; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="initials"> Initials</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="initials" type="text" class="form-control" id="initials" placeholder="john.p.doe" aria-describedby="initialsHelp" value="<?php echo $user[3]; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <label for="lName"> <label class="text-danger">*</label> Last Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="lName" type="text" class="form-control" id="lName" placeholder="john.p.doe" aria-describedby="lNameHelp" value="<?php echo $user[4]; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="role"> <label class="text-danger">*</label> Role:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <select name="role" class="form-control" id="role" aria-required="true">
      <?php

         if($user[5] == 1)
		 {
           echo '<option selected>Admin</option>';
         }
		 else
		 {
			 echo '<option>Admin</option>';
		 }
		 
		 if($user[5] == 0)
		 {
           echo '<option selected>User</option>';
         }
		 else
		 {
			 echo '<option>User</option>';
		 }

      ?>
      </select>
    </div>
  </div>

  <!--Login Button-->
</div >
  <div>
    <input class="btn btn-primary" type="submit" value="Submit">
  </div>

</form>

<!-- ******************* END FORM ******************* -->

<script type="text/javascript">
   $(document).ready(function()
   {
    $('#editUserPage').bootstrapValidator(
	{
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
                        message: 'ERROR: Please enter your enterprise ID.'
                    }
                }
            },
			code:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the registration code.'
                    }
                }
            },
			fName:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your first name.'
                    }
                }
            },
			lName:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your last name(s).'
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
