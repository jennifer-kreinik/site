<?php
include('init.php');
// include('config/init.php');
verifyUserCooking();
$recipeId = $_REQUEST['recipeId'];
$loginId = $_SESSION['loginId'];
echo yourCookbookEchoHtmlHeader("New Recipe");
?>
<script>
function addTagExistingRecipe(recipeId){
    var recipeIngredientName = $('#recipeIngredientName').val();
    var submitItem = $('#submitItem').val();
    console.log(recipeId, submitItem, recipeIngredientName)
    $.post('/ajax/saveAddedtag.php', {recipeIngredientName:recipeIngredientName, submitItem:submitItem, recipeId:recipeId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        // $('.addTag').html(Data)
    });
    alert("The tag was sucessfully added!");
    return false;
}
function addRating(loginId, recipeId){
    var rating = $('#rating').val();
    var submitItem = $('#submitItem').val();
    console.log(recipeId, submitItem, loginId)
    $.post('/ajax/saveRating.php', {rating:rating, submitItem:submitItem, recipeId:recipeId, loginId:loginId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
    });
    alert("The tag was sucessfully added!");
    return false;
}
function deleteTagExistingRecipe(recipeId){
    var recipeIngredientName = $('#recipeIngredientName').val();
    var deleteItem = $('#deleteItem').val();
    $.post('/ajax/deleteTagExistingPost.php', {recipeIngredientName:recipeIngredientName, deleteItem:deleteItem, recipeId:recipeId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        // $('.deleteTag').html(Data)
    });
    alert("The tag was sucessfully removed!");
    return false;
}
</script>
<br/><br/><div class = 'recipeHeader'><span class='recipe'>

<?php
echo recipeContent($recipeId, 'title');
?>
 <!-- <a href='#' id='faves' onclick='favorited()'><i class="fa fa-star" aria-hidden="true"></i></a> -->
</div><p style='text-align:center; font-size:14px'>By:
<?php
    echo recipeContent($recipeId, 'firstName')." ".recipeContent($recipeId, 'lastName');
    echo "<br/><div class='recipeHeader'><form action='' method='post' onsubmit='return addRating($loginId, $recipeId)'>
            <select id = 'rating' name= 'rating'>
            <option disabled selected value> ---Select rating --- </option>
            <option value='1'>1 </option>
            <option value='2'>2 </option>
            <option value='3'>3 </option>
            <option value='4'>4 </option>
            <option value='5'>5 </option>".
            submitButton('Submit Rating')."</form></div>";
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
<br/><br/>

<?php

    echo "<div class='Timer'>Add/Delete Tag To Existing Post </div><br/>
        <form action='' method='post' onsubmit='return addTagExistingRecipe($recipeId)'>
        <input type='hidden' name='recipeId' value='$recipeId'/>
        <input type='hidden' name='dateOfPost' id='dateOfPost' value='getPostDateTime()' />".
        dropDownMenu ('Add New Tag', 'recipeIngredientName', 'Select Tag', cookingTagDropDownMenu(), @$errors1['recipeIngredientName']).
        submitButton('Add Tag')."<br/><br/></form><div class='deleteTag'>
        <form action='' method='post' onsubmit= 'return deleteTagExistingRecipe($recipeId)'>
        <input type='hidden' name='recipeId' value='$recipeId'/>
        <input type='hidden' name='dateOfPost' id='dateOfPost' value='getPostDateTime()' />".
        dropDownMenu ('Delete An Existing Tag', 'tagName', 'Delete Tag', currentCookingTagDropDownMenu($recipeId), @$errors2['recipeIngredientName']).
        "<div class = 'deleteTags'>".deleteButton('Delete Tag').
         "</form></div></div></div>";
?>

<br/><br/><br/>
<div class='Timer'> Timer </div>
    <div id='counter'>
        <input ="text" placeholder="minutes" value = '0' name = "mins" id="mins">Minutes
        <input ="text" placeholder="seconds" value = '0' name = "secs" id="secs">Seconds
    </div>
    <input id='startStopButton' value='Start' type ='button' onclick='startStop()'>
    <input id='reset' value='Reset' type ='button' onclick='resetBtn()' style = 'display:none'>
</div>
