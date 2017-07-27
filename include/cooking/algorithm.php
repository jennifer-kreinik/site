<?php
function algorithm($loginId){
    $recipeQuery = dbQuery("SELECT * FROM recipes")->fetchALL();
    $recipeArray = array();
        $returnRecipeTags = "";
        foreach ($recipeQuery as $recipes){
            if(!@$recipeArray[$recipes['recipeId']]){
                $recipeArray[$recipes['recipeId']] = true;
            }
                $recieId = $recipes['recipeId']
                $tagQuery = dbQuery("SELECT * FROM recipe_identifier_linked
                            WHERE recipeId= :recipeId", array('recipeId'=>$recieId))->fetchALL();
                $tagArray = array();
                foreach ($tagQuery as $tags){
                    if(!@$tagArray[$tags['recipeIngredientName']]){
                        $tagArray[$tags['recipeIngredientName']] = true;
                    }
                    $recipeIngredientName = $tags['recipeIngredientName'];
                    $recipeTagQuery = dbQuery("SELECT * FROM recipe_identifier_linked
                                        WHERE recipeId != :recipeId AND recipeIngredientName =:recipeIngredientName",
                                        array('recipeId'=>$recieId, 'recipeIngredientName'=$recipeIngredientName))->fetchALL();
                    $recipeTagArray = array();
                    foreach ($recipeTagQuery as $recipeTag){
                        if(!@$recipeTagArray[$recipeTag['recipeId']]){
                            $recipeTagArray[$recipeTag['recipeId']] = true;
                        }
                        $recieId = $recipeTag['recipeId'];
                        $total = 0;
                        $score=dbQuery("SELECT* FROM ratings WHERE recipeTag = :recipeTag", array('recipeId'=>$recieId))->fetch();
                        $total .= $score['rating'];

                    }
                }
        }
        $insertQuery = dbQuery("INSERT INTO scores (loginId, recipeId, score)
            VALUES (:loginId, :recipeId, :score)", array('loginId'=>$loginId, 'recipeId'=>$recipeId, 'score'=>$total));
}




?>
