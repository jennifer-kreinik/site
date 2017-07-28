<?php
include('init.php');
verifyUserCooking();
if(isset($_REQUEST['addItem'])){

    $errors = array();

    if(!@$_REQUEST['ingredientName']){
        $errors['ingredientName'] = "*Required*";

    }
    if(sizeof($errors) == 0){
        addNewIngredientShoppingList($_SESSION['loginId'], $_REQUEST['ingredientName']);
        echo listOfShoppingList();
        exit;
    }
    else{
        echo "failure";
        exit;
    }
}
