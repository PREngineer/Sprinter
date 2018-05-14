<?php
	include '../functions/Init.php';
	include '../functions/DB.php';
?>

<!--Skip Navigation Link-->
<a class="skip-navigation sr-only sr-only-focusable" href="#page_title">Skip Navigation</a>

<h1 id="page_title" tabindex="-1" role="heading" aria-level="1">Leaderboard</h1>

<?php
	echo '<br><br>SESSION: ';
	print_r($_SESSION);
?>

<br>
Leaderboard goes here.


<script type="text/javascript">
	var SprintData = "";

    function loadXMLDoc(getSprintData.php)
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari, SeaMonkey
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", theURL, false);
        xmlhttp.send();
    }
</script>