<title>Sprinter - Sprint Summary</title>
<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

Testing!!

<script>
  // Do the actual loading.
  function changeSprint(value)
  {
    window.location = "index.php?display=Past&sprint=" + value;
  }
</script>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Sprint Summary</h1>

<?php

	$sprints = get_AvailableSprints();
	
	// Drop down to choose the Sprint
?>
	<div class="panel-body">
    <table role="presentation">
      <tr>
        <td style="padding: 5px;">
          <div class="input-group">
            <select onchange="changeSprint(this.value)" class="form-control" id="Options">
        	    <option <?php if( !( isset($_GET['sprint']) ) ){echo 'selected';} ?> value="">-Please choose-</option>
        <?php     
			  foreach($sprints as $each)
			  {
				echo '<option ';
				if($_GET['sprint'] == 1)
				{
					echo 'selected ';
				} 
				echo 'value="' . $each[2] . '"';
				echo '>' . $each[1] . '</option>';
			  }
		?>	  
            </select>
          </div>
        </td>
	  </tr>
	</table>

<?php	
	if( isset($_GET['sprint']) )
	{
		$Sprint   = get_SprintData( $_GET['sprint'] )[0];
	
		$leaders = get_Leaderboard( $_GET['sprint'] );
	
		echo '
<div class="container">
	<table class="table">
		<thead>
			<th>
				Name
			</th>
			<th>
				Count to Date
			</th>
			<th>
				Goal to Date (%)
			</th>
		</thead>


		<tbody>';

		foreach($leaders as $each)
		{
			echo'
					<tr>
						<td style="width:50%">
						' . $each[0] . '
						</td>
						<td style="width:25%">
						' . $each[1] . '
						</td>
						<td style="width:25%">
						' . $each[2] . '%
						</td>
					</tr>
		</tbody>
	</table>
</div>
			';
		}
	}
?>