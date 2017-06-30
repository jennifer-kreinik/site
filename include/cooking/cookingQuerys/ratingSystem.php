<?php
// ******ALL QUERYS FOR TAGS BELOW******
function currentCookingTagDropDownMenu($recipeId){
        $currentTags = dbQuery("
            SELECT *
            FROM recipe_identifier_linked
            WHERE recipeId = :varPostId
            ", array("varPostId"=>$recipeId))
            ->fetchALL();
        $tagArray = array();
        $returnDropDownMenu = "";
            foreach ($currentTags as $existingTags){
                if(!@$tagArray[$existingTags['recipeIngredientName']]){
                    $tagArray[$existingTags['recipeIngredientName']] = true;
                    }
                $returnDropDownMenu .= "<option value='".$existingTags['recipeIngredientName']."'>".$existingTags['recipeIngredientName']."</option>";
                }
            return $returnDropDownMenu;
}
function cookingTagDropDownMenu(){
    $tagTypes = getAllCookingTags();
    $tagArray = array();
        $returnDropDownMenu = "";
        foreach ($tagTypes as $tagsOrganized){
            if(!@$tagArray[$tagsrganized['recipeIngredientName']]){
                $tagArray[$tagsOrganized['recipeIngredientName']] = true;
            }
            $returnDropDownMenu .= "<option value='".$tagsOrganized['recipeIngredientName']."'>".$tagsOrganized['recipeIngredientName']."</option>";
        }
        return $returnDropDownMenu;
}
function getAllCookingTags(){
    return $tagTypes = dbQuery("
        SELECT *
        FROM recipeTagIds
        ")->fetchALL();
}
function listOfAllcookingTags(){
    $tagTypes=getAllCookingTags();
    $tagArray = array();
    $returnTags = "";
    foreach ($tagTypes as $tagsOrganized){
        if(!@$tagArray[$tagsOrganized['recipeIngredientName']]){
            $tagArray[$tagsOrganized['recipeIngredientName']] = true;
        }
        $returnTags .= "<br/><div class='resume'> ".$tagsOrganized['recipeIngredientName']." </div>";
    }
    return $returnTags;
}
function addNewTagToExistingRecipe($tagName, $recipeId){
    dbQuery("INSERT INTO recipe_identifier_linked(recipeIngredientName, recipeId)
        VALUES (:recipeIngredientName, :recipeId)", array('recipeIngredientName'=>$tagName, 'recipeId'=>$recipeId));
            //header('Location:cookingWebsite/yourCookbook/yourRecipes.php');
}
function deleteTagFromExistingRecipe($tagName, $postId){
    dbQuery("DELETE FROM recipe_identifier_linked WHERE recipeIngredientName=:recipeIngredientName and recipeId=:recipeId",
        array('recipeIngredientName'=>$tagName, 'recipeId'=>$postId));
        //header('Location:cookingWebsite/yourCookbook/yourRecipes.php');
}
function addNewCookingTagQuery ($tagName){
        dbQuery("INSERT INTO recipeTagIds (recipeIngredientName)
            VALUES (:recipeIngredientName)", array('recipeIngredientName'=>$tagName));
            header('Location:/cookingWebsite/yourCookbook/addTags.php');
}
function deleteNewCookingTagQuery ($tagName){
        dbQuery("DELETE FROM recipeTagIds WHERE recipeIngredientName=:recipeIngredientName", array('recipeIngredientName'=>$tagName));
        dbQuery("DELETE FROM recipe_identifier_linked WHERE recipeIngredientName= :recipeIngredientName", array('recipeIngredientName'=>$tagName));
        return header('Location:/cookingWebsite/yourCookbook/addTags.php');
}

// ********ALL FUNCTIONS FOR RATINGS BELOW*********

function insertRatingIntoTable($loginId, $recipeId, $rating){
    dbQuery("INSERT INTO ratings(loginId, recipeId, rating)
            VALUES(:loginId, :recipeId, :rating)",
            array('loginId'=>$loginId, 'recipeId'=>$recipeId, 'rating'=>$rating));
}
