<?php
include('init.php');
verifyUserCooking();

if(isset($_REQUEST['submitItem'])){
    $errors1 = array();

    if(!@$_REQUEST['recipeIngredientName']){
        $errors1['recipeIngredientName'] = "*Required*";
    }
    if(sizeof($errors1) == 0){
        addNewTagToExistingRecipe($_REQUEST['recipeIngredientName'], $_REQUEST['recipeId']);
        exit;
    }
    else{
        echo "failure";
        exit;
    }
}
