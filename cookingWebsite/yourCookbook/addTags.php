<?php
include('config/init.php');
verifyUserCooking();
if(isset($_REQUEST['submitItem'])){
    $errors1 = array();

    if(!@$_REQUEST['recipeIngredientName']){
        $errors1['recipeIngredientName'] = "*Required*";
    }
    if(sizeof($errors1) == 0){
        echo addNewCookingTagQuery($_REQUEST['recipeIngredientName']);
        exit;
    }
}
if(isset($_REQUEST['deleteItem'])){
    $errors2 = array();

    if(!@$_REQUEST['recipeIngredientName']){
        $errors2['recipeIngredientName'] = "*Required*";
    }
    if(sizeof($errors2) == 0){
        echo deleteNewCookingTagQuery($_REQUEST['recipeIngredientName']);
        exit;
    }
}
echo yourCookbookEchoHtmlHeader("tags").
        "</div><h2 class='title'> Add New Tags: </h2><div class = 'newRecipe'></br>
        <form action='' method='post'>
        <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
        "<input type = 'hidden' name = 'blogPostId' value ='". @$_REQUEST['recipeId']. "'/>".
        singleLineTextBox('New Tag Name', 'recipeIngredientName',' ', @$_REQUEST['recipeIngredientName'], @$errors1['recipeIngredientName'])."
        ".submitButton('Add Tag'). "<br/><br/> ".
        dropDownMenu ('Delete Existing Tag (this will delete this tag from ALL posts)', 'recipeIngredientName', 'Select Tag', cookingTagDropDownMenu(), @$errors2['recipeIngredientName']).
        deleteButton('Delete Tag').
        "</form> </div>
        <h2 class = 'title'> List of all tag names: </h2>".
        listOfAllCookingTags();
