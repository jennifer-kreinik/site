<?php
include('config/init.php');
verifyUserCooking();

if(isset($_REQUEST['deleteItem'])){
    $errors2 = array();

    if(!@$_REQUEST['recipeIngredientName']){
        $errors2['recipeIngredientName'] = "*Required*";
    }
    if(sizeof($errors2) == 0){
        deleteTagFromExistingRecipes($_REQUEST['recipeIngredientName'], $_REQUEST['recipeId']);
        exit;
    }
    else{
        echo "failure";
        exit;
    }
}
