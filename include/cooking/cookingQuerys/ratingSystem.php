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
function deleteTagFromExistingRecipes($tagName, $postId){
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
function algorithm(){
    $total = 0;
    $loginQuery = dbQuery("SELECT * FROM cookingLogin")->fetchALL(); //get a list of all of the login IDs
    $loginArray = array();
    // $recipeQuery = dbQuery("SELECT * FROM recipes")->fetchALL(); //new
    foreach ($loginQuery as $logins){   //start to loop through each login ID 1-by-1
        if(!@$loginArray[$logins['loginId']]){
                $loginArray[$logins['loginId']] = true;
            }
                $loginId = $logins['loginId'];


    $recipeQuery = dbQuery("SELECT * FROM recipes")->fetchALL();  //get a list of all the recipes
    $recipeArray = array();
        foreach ($recipeQuery as $recipes){     //start to loop through the reccipes 1-by-1
            if(!@$recipeArray[$recipes['recipeId']]){
                $recipeArray[$recipes['recipeId']] = true;
            }
                $recipeId = $recipes['recipeId'];
                $tagQuery = dbQuery("SELECT * FROM recipe_identifier_linked
                            WHERE recipeId= :recipeId", array('recipeId'=>$recipeId))->fetchALL(); //gets all the tags associated with the recipe
                $tagArray = array();
                foreach ($tagQuery as $tags){ //loops through each tag to sum up up the total ratings that have been given to other recipes

                    if(!@$tagArray[$tags['recipeIngredientName']]){
                        $tagArray[$tags['recipeIngredientName']] = true;

                    }
                    $recipeIngredientName = $tags['recipeIngredientName'];
                    $recipeTagQuery = dbQuery("SELECT * FROM recipe_identifier_linked
                                        WHERE recipeId != :recipeId AND recipeIngredientName =:recipeIngredientName" ,
                                        array('recipeId'=>$recipeId, 'recipeIngredientName'=>$recipeIngredientName))->fetchALL();
                    //above gets the ratings of a specific tag from recipes with a recipeID UNEQUAL to the recipe we are looking at at the current moment
                    $recipeTagArray = array();
                    foreach ($recipeTagQuery as $recipeTag){
                        if(!@$recipeTagArray[$recipeTag['recipeId']]){
                            $recipeTagArray[$recipeTag['recipeId']] = true;
                        }
                        $recipeId2 = $recipeTag['recipeId'];
                        $score=dbQuery("SELECT* FROM ratings WHERE recipeId = :recipeId AND loginId=:loginId", array('recipeId'=>$recipeId2, 'loginId'=>$loginId))->fetch();
                        //gets the rating of each tag from the parent recipe
                        $total += $score['rating']; //sums together all of the ratings of each tag to give each recipe a final score
                    // var_dump($recipeId);echo"<br/><br/>";
                    // var_dump($total);echo"<br/><br/>";
                    // var_dump($recipeId2);echo"<br/><br/>";
                    // var_dump($recipeIngredientName);echo"<br/><br/>";
                    // die("hello friends");
                    }

                }

        $insertQuery = dbQuery("UPDATE scores
            SET score= :score
            WHERE loginId = :loginId AND recipeId = :recipeId", array('loginId'=>$loginId, 'recipeId'=>$recipeId, 'score'=>$total));
            $total = 0;
        }


    }
}
