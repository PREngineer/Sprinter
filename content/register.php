<title>Sprinter - Register an account</title>
<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Register</h1>

<!-- Form STARTS here -->
<form class="container" id="registerPage" action="api.php">

  <input name="action" type="hidden" value="Register">
  <!--<input name="do" type="hidden" value="1">-->
  <hr>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="username"> <label class="text-danger">*</label> Username</label>
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
	<small id="codeHelp" class="sr-only form-text text-muted">Password must not have spaces.</small>
  </div>
  
  <div class="form-group">
    <label for="code"> <label class="text-danger">*</label> Registration Code</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-barcode"></i>
      </span>
      <input name="code" type="text" class="form-control" id="code" placeholder="john.p.doe" aria-describedby="codeHelp" required>
    </div>
    <small id="codeHelp" class="sr-only form-text text-muted">You must provide the invitation code to register.</small>
  </div>
  
  <div class="form-group">
    <label for="fName"> <label class="text-danger">*</label> First Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="fName" type="text" class="form-control" id="fName" placeholder="john.p.doe" aria-describedby="fNameHelp" required>
    </div>
    <small id="fNameHelp" class="sr-only form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>
  
  <div class="form-group">
    <label for="initials"> <label class="text-danger">*</label> Initials</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="initials" type="text" class="form-control" id="initials" placeholder="john.p.doe" aria-describedby="initialsHelp" required>
    </div>
    <small id="initialsHelp" class="sr-only form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
  </div>
  
  <div class="form-group">
    <label for="lName"> <label class="text-danger">*</label> Last Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input name="lName" type="text" class="form-control" id="lName" placeholder="john.p.doe" aria-describedby="lNameHelp" required>
    </div>
    <small id="lNameHelp" class="sr-only form-text text-muted">Use your enterprise ID only, don't include "@company.com"</small>
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
    $('#registerPage').bootstrapValidator(
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
			initials:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter your initials.'
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
