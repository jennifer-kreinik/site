<?php
include('config/init.php');
verifyUserCooking();
echo yourCookbookEchoHtmlHeader("All Recipes");
$recipeTagName = $_REQUEST['recipeTagId'];
$loginId = $_SESSION['loginId'];
if ($recipeTagName == 1){
    $styleChoice='tag1';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 2){
    $styleChoice='tag2';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 3){
    $styleChoice='tag3';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 4){
    $styleChoice='tag4';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 5){
    $styleChoice='tag5';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 6){
    $styleChoice='tag6';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
};
if ($recipeTagName == 7){
    $styleChoice='tag7';
    echo echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId);
}
if ($recipeTagName == 8){
    $styleChoice='tag8';
    echo echoALLRecipeLinkHtmlCookbook($styleChoice, $loginId);
}
?>
</h2><br/></div>
