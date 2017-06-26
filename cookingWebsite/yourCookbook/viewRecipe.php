<?php
include('config/init.php');
verifyUserCooking();
$recipeId = $_REQUEST['recipeId'];
echo yourCookbookEchoHtmlHeader("New Recipe");
?>
<br/><br/><span class='recipe'><div class = 'recipeHeader'>
<?php
echo recipeContent($recipeId, 'title');
?>
 <!-- <a href='#' id='faves' onclick='favorited()'><i class="fa fa-star" aria-hidden="true"></i></a> -->
</div><p style='text-align:center; font-size:14px'>By:
<?php
echo recipeContent($recipeId, 'firstName')." ".recipeContent($recipeId, 'lastName');
 ?>
</p><br/><br>
<div class = 'ingredients'>
<h3 style='text-decoration:underline; font-size: 18px '> Ingredients:</h3>
<?php
echo recipeContent($recipeId, 'ingredients');
?>
</div>
<?php
echo recipeContent($recipeId, 'image');
?>
<br/><br/>
<div class = 'instructions'>
<h3 style='text-decoration:underline; font-size: 18px; text-align:center '> Instructions:</h3>
<?php
echo recipeContent($recipeId, 'body');
?>
</div>
<br/><br/><br/>
<div class='Timer'> Timer </div>
    <div id='counter'>
        <input ="text" placeholder="minutes" value = '0' name = "mins" id="mins">Minutes
        <input ="text" placeholder="seconds" value = '0' name = "secs" id="secs">Seconds
    </div>
    <input id='startStopButton' value='Start' type ='button' onclick='startStop()'>
    <input id='reset' value='Reset' type ='button' onclick='resetBtn()' style = 'display:none'>
</div>
