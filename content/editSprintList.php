<title>Event Manager - Sprint List</title>

<?php

include '../functions/Init.php';
include '../functions/DB.php';
include 'layout/LinkHandler.php';

protectAdmin();

$sprints = get_AllSprintData();

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

<h1 id="page-title" tabindex="-1" role="heading" aria-level="1">Sprint List</h1>

<hr>

<ol class="breadcrumb">
  <li>
    <a link="index.php?display=Administrator" style="cursor:pointer;">
      <i class="glyphicon glyphicon-arrow-left"></i> Admin
    </a>
  </li>
</ol>

<div class="panel panel-default">

  <!-- Default panel contents -->
  <div class="panel-heading">Here are all the active and future sprints that have been created.</div>
  <div class="panel-body">
    <a link="index.php?display=CreateSprint" style="cursor:pointer;"><i class="glyphicon glyphicon-plus" title="New Event"></i> New Sprint</a>
    <i class="glyphicon glyphicon-edit" title="Edit" style="color:orange; padding-left:2em"></i> = Edit
    <i class="glyphicon glyphicon-trash" title="Delete" style="color:red; padding-left:2em"></i> = Delete
  </div>
</div>

  <!-- Table -->
  <table class="table">

    <thead>
      <th>
        Options
      </th>

      <th>
        Name
      </th>

      <th>
        Goal
      </th>

      <th>
        Rules
      </th>

      <th>
        Start Date
      </th>

      <th>
        End Date
      </th>

      <th>
        Code
      </th>

    </thead>

<?php

  foreach ($sprints as $key => $value)
  {
    echo'
    <tr id="Entry' . $value[0] . '">

      <td>
        <a link="index.php?display=EditEvent&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-edit" title="Edit" style="color: orange"></i></a>

        <a link="deleteEvent.php?display=Admin&id=' . $value[0] . '" style="cursor:pointer;"><i class="glyphicon glyphicon-trash" title="Delete" style="color: red"></i></a>

      </td>

      <td>
      ' . $value[1] . '
      </td>

      <td>
      ' . $value[2] . '
      </td>

      <td>
      ' . $value[3] . '
      </td>

      <td>
      ' . $value[4] . '
      </td>

      <td>
      ' . $value[5] . '
      </td>

      <td>
      ' . $value[6] . '
      </td>

      <td>
      ' . $value[8] . '
      </td>

    </tr>';
  }
?>
  </table>
