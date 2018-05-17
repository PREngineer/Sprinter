<title>Sprinter - Create Sprint</title>
<?php

include '../functions/Init.php';
include '../functions/DB.php';

protectAdmin();

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

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Create Sprint</h1>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Administrator" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
</ol>

<!-- Form STARTS here -->
<form class="container" id="registerPage" action="api.php">

  <input name="action" type="hidden" value="CreateSprint">
  <!--<input name="do" type="hidden" value="1">-->
  <hr>

  <p><strong>All fields marked with an asterisk ( <label class="text-danger">*</label> ) are required. </strong></p>

  <div class="form-group">
    <label for="name"> <label class="text-danger">*</label> Sprint Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input name="name" type="text" class="form-control" id="name" placeholder="Walk it off!" aria-describedby="nameHelp" required>
    </div>
  </div>

  <div class="form-group">
    <label for="goal"> <label class="text-danger">*</label> Goal</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-thumbs-up"></i>
      </span>
      <input name="goal" type="text" class="form-control" id="goal" placeholder="10.00" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="rules"> <label class="text-danger">*</label> Rules</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-exclamation-sign"></i>
      </span>
      <textarea name="rules" class="form-control" id="rules" placeholder="The rules go here." aria-required="true" rows="10"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="start"> <label class="text-danger">*</label> Start Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="start" class="form-control" type="text" id="start" placeholder="YYYY-MM-DD" aria-required="true">
    </div>
  </div>
  
  <div class="form-group">
    <label for="end"> <label class="text-danger">*</label> End Date:</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input name="end" class="form-control" type="text" id="end" placeholder="YYYY-MM-DD" aria-required="true">
    </div>
  </div>
  
  <div class="form-group">
    <label for="code"> <label class="text-danger">*</label> Invite Code</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input name="code" type="text" class="form-control" id="code" placeholder="0a34bc" required>
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
            name:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s name.'
                    }
                }
            },
            goal:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s goal.'
                    }
                }
            },
			rules:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s rules.'
                    }
                }
            },
			start:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s start date.'
                    }
                }
            },
			end:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s end date.'
                    }
                }
            },
			code:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: 'ERROR: Please enter the sprint\'s invitation code.'
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