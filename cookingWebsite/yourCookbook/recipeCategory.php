<?php
include('config/init.php');
verifyUserCooking();
echo yourCookbookEchoHtmlHeader("All Recipes");
$recipeTagName = $_REQUEST['recipeTagId'];
if ($recipeTagName == 1){
    $styleChoice='tag1';
};
if ($recipeTagName == 2){
    $styleChoice='tag2';
};
if ($recipeTagName == 3){
    $styleChoice='tag3';
};
if ($recipeTagName == 4){
    $styleChoice='tag4';
};
if ($recipeTagName == 5){
    $styleChoice='tag5';
};
if ($recipeTagName == 6){
    $styleChoice='tag6';
};
if ($recipeTagName == 7){
    $styleChoice='tag7';
};

echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice);
?>
</h2><br/></div>
