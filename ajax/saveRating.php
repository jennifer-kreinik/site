<?php
include('config/init.php');
verifyUserCooking();

if(isset($_REQUEST['submitItem'])){
    $errors1 = array();

    if(!@$_REQUEST['rating']){
        $errors1['rating'] = "*Required*";
    }
    if(sizeof($errors1) == 0){
        insertRatingIntoTable($_REQUEST['loginId'], $_REQUEST['recipeId'], $_REQUEST['rating']);
        exit;
    }
    else{
        echo "failure";
        exit;
    }
}
