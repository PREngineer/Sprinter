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
* Member Actions
*/

{
  // Message upon Registrations
  if( ($_GET['display'] == 'Login') )
  {
    if( $_GET['success'] == '1')
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              New Member has been recorded!
            </div>';
    }
    else if( $_GET['error'] == '1' )
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] The registration code provided is invalid.  Please, try again.</div>';
    }
    if( $_GET['exists'] == '1')
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] This Member already exists.</div>';
    }
  }
  
  // Message upon 
  if( ($_GET['display'] == '') )
  {
    if(1)
    {
      echo '<div class="container alert alert-success alert-dismissible" role="alert" style="padding-top:75px;">
              <button type = "button" class="close" data-dismiss = "alert">x</button>
              New Member has been recorded!
            </div>';
    }
    else if(0)
    {
      echo '<div class="container alert alert-danger alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] The registration code provided is invalid.  Please, try again.</div>';
    }
    else
    {
      echo '<div class="container alert alert-warning alert-dismissible" role="alert" style="padding-top:75px;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              [!] This Member already exists.</div>';
    }
  }
}

?>
