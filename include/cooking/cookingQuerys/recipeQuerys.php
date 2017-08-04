<?php
function addRecipeQuery($title, $ingredients, $body, $recipeTagName){
    $chef =loginInfo();
    dbQuery("INSERT INTO recipes (title, ingredients, body, loginId, dateOfPost, firstName, lastName)
        VALUES (:title, :ingredients, :body, :loginId, :dateOfPost, :firstName, :lastName)",
        array('title'=>$title, 'ingredients'=>$ingredients, 'body'=>$body, 'loginId'=>$_SESSION['loginId'], 'dateOfPost'=>getPostDateTime(),
            'firstName'=>$chef['firstName'], 'lastName'=>$chef['lastName']));

    $recipeId=dbQuery("SELECT LAST_INSERT_ID() FROM recipes")->fetch();

    dbQuery("INSERT INTO recipe_tag_linked(recipeTagName, recipeId)
    VALUES (:recipeTagName, :recipeId)", array('recipeTagName'=>$recipeTagName, 'recipeId'=>$recipeId['LAST_INSERT_ID()']));
    header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
}
function loginInfo(){
    $recipeLoginId = dbQuery("SELECT * FROM cookingLogin
                WHERE loginId = :loginId",
                array('loginId'=>$_SESSION['loginId']))->fetch();
    return $recipeLoginId;
}
function yourRecipesByLoginId(){
    $recipeLoginId = dbQuery("SELECT * FROM recipes
                WHERE loginId = :loginId
                ORDER BY dateOfPost DESC", array('loginId'=>$_SESSION['loginId']));
    return $recipeLoginId;

}
function yourIngredientsByLoginId(){
    $recipeLoginId = dbQuery("SELECT * FROM shoppingList
                WHERE loginId = :loginId
                ORDER BY ingredientName ASC", array('loginId'=>$_SESSION['loginId']));
    return $recipeLoginId;

}
function echoListOfAllYourRecipes(){
    $recipes = yourRecipesByLoginId();
    $recipeArray = array();
    $returnRecipe = "";
        foreach ($recipes as $recipesOrganized){
            if(!@$recipeArray[$recipesOrganized['title']]){
                $recipeArray[$recipesOrganized['title']] = true;
            }
        $returnRecipe .=  "<li><a href = '/cookingWebsite/yourCookbook/viewRecipe.php?recipeId=".
            $recipesOrganized['recipeId']. "'class='recipeDesign'> ".$recipesOrganized['title']."</a></li>";
        }
        return $returnRecipe;
}
function listOfShoppingList(){
    $groceries = yourIngredientsByLoginId();
    $shoppingArray = array();
    $returnIngredient = "";
        foreach ($groceries as $ingredientOrganized){
            if(!@$shoppingArray[$ingredientOrganized['ingredientName']]){
                $shoppingArray[$ingredientOrganized['ingredientName']] = true;
            }
        $returnIngredient .=  "<li><a href='' id ='deleteBtn' onclick='return deleteIngredient($ingredientOrganized[ingredientId])'>
        <i class='fa fa-trash-o' aria-hidden='true'></i> ".$ingredientOrganized['ingredientName']."
        </a></li><br/>";
        }
        return $returnIngredient;
}
function recipeContent($recipeId, $infoNeeded){
    $recipe = dbQuery("SELECT * FROM recipes
                WHERE recipeId = :recipeId"
                ,array('recipeId'=>$recipeId))->fetch();
    return $recipe[$infoNeeded];
 }
function addNewIngredientShoppingList($loginId, $ingredientName){
    dbQuery("INSERT INTO shoppingList (loginId, ingredientName)
        VALUES (:loginId, :ingredientName)",
        array('loginId'=>$loginId,'ingredientName'=>$ingredientName));
        // header('/cookingWebsite/yourCookbook/groceryList.php');
}
function deleteIngredentFromList($loginId, $ingredientId){
    dbQuery("DELETE FROM shoppingList WHERE loginId=:loginId AND ingredientId=:ingredientId"  ,
        array('loginId'=>$loginId, 'ingredientId'=>$ingredientId));
        header('/cookingWebsite/yourCookbook/groceryList.php');
}
function allRecipes(){
    return $recipes = dbQuery("SELECT * FROM recipes
        ORDER BY dateOfPost DESC")->fetchALL();
}
function echoListOfRecipes(){
    $recipes = allRecipes();
    $recipeArray = array();
    $returnRecipe = "";
        foreach ($recipes as $recipesOrganized){
            if(!@$recipeArray[$recipesOrganized['title']]){
                $recipeArray[$recipesOrganized['title']] = true;
            }
        $returnRecipe .=  "<i class='fa fa-cutlery' aria-hidden='true'></i> <a href = '/cookingWebsite/yourCookbook/allRecipes.php?recipeId=".
            $recipesOrganized['recipeId']. "'> ".$recipesOrganized['title']."</a><br/><br/>";
        }
        return $returnRecipe;
}
function recipeTagOrganizer (){
    $tagTypes = dbQuery("
            SELECT *
            FROM recipeTags
            ORDER BY recipeTagId ASC")->fetchALL();
}
function echoRecipeLinkHtml($recipeTagName, $styleChoice){
    $tagIdOrganizer = dbQuery("SELECT * FROM recipes
        INNER JOIN recipe_tag_linked ON recipe_tag_linked.recipeId = recipes.recipeId
        INNER JOIN recipeTags ON recipeTags.recipeTagName =  recipe_tag_linked.recipeTagName
        WHERE recipeTags.recipeTagId= :recipeTagName
        ORDER BY dateOfPost DESC
        ", array("recipeTagName" => $recipeTagName))->fetchALL();
        $tagPostArray = array();
        $returnTaggedPosts="";
        foreach ($tagIdOrganizer as $tagPosts){
            if(!@$tagPostArray[$tagPosts['recipeTagName']]){
                $tagPostArray[$tagPosts['recipeTagName']] = true;
                echo "<h2 class='$styleChoice'>".$tagPosts['recipeTagName']."</h2>";
            }
        $returnTaggedPosts .= "<div class='recipeList ><i class='fa fa-asterisk' aria-hidden='true'></i> <a href ='/cookingWebsite/theRecipe.php?recipeId=".
            $tagPosts['recipeId']."' class='recipeDesign' > ". $tagPosts['title']." </a></div>";
        }
        return $returnTaggedPosts;
    }
function echoALLRecipeLinkHtml($styleChoice){
        $tagIdOrganizer = dbQuery("SELECT * FROM recipes
            INNER JOIN recipe_tag_linked ON recipe_tag_linked.recipeId = recipes.recipeId
            INNER JOIN recipeTags ON recipeTags.recipeTagName =  recipe_tag_linked.recipeTagName
            ORDER BY dateOfPost DESC
            ") ->fetchALL();
            $tagPostArray = array();
            $returnTaggedPosts="";
            echo "<h2 class='$styleChoice'>All Recipes</h2>";
            foreach ($tagIdOrganizer as $tagPosts){
                if(!@$tagPostArray[$tagPosts['recipeTagName']]){
                    $tagPostArray[$tagPosts['recipeTagName']] = true;
                }
            $returnTaggedPosts .= "<div class='recipeList ><i class='fa fa-asterisk' aria-hidden='true'></i> <a href ='/cookingWebsite/theRecipe.php?recipeId=".
                $tagPosts['recipeId']."' class='recipeDesign' > ". $tagPosts['title']." </a></div>";
            }
            return $returnTaggedPosts;
}
function echoRecipeLinkHtmlCookbook($recipeTagName, $styleChoice, $loginId){
        $tagIdOrganizer = dbQuery("SELECT * FROM recipes
            INNER JOIN scores ON scores.recipeId = recipes.recipeId
            INNER JOIN recipe_tag_linked ON recipe_tag_linked.recipeId = scores.recipeId
            INNER JOIN recipeTags ON recipeTags.recipeTagName =  recipe_tag_linked.recipeTagName
            -- INNER JOIN scores ON recipeTags.recipeTagId =  scores.recipeId
            -- INNER JOIN scores ON scores.recipeId = recipe_tag_linked.recipeId
            WHERE recipeTags.recipeTagId = :recipeTagName AND scores.loginId = :loginId
            -- ORDER BY dateOfPost DESC
            ORDER BY score DESC
            ", array("recipeTagName" => $recipeTagName, "loginId" => $loginId))->fetchALL();
            $tagPostArray = array();
            $returnTaggedPosts="";
            foreach ($tagIdOrganizer as $tagPosts){
                if(!@$tagPostArray[$tagPosts['recipeTagName']]){
                    $tagPostArray[$tagPosts['recipeTagName']] = true;
                    echo "<h2 class='$styleChoice'>".$tagPosts['recipeTagName']."</h2>";
                }
            $returnTaggedPosts .= "<div class='recipeList ><i class='fa fa-asterisk' aria-hidden='true'></i> <a href ='/cookingWebsite/yourCookbook/theRecipeCookbook.php?recipeId=".
                $tagPosts['recipeId']."' class='recipeDesign' > ". $tagPosts['title']." </a></div>";
            }
            return $returnTaggedPosts;
}
function echoALLRecipeLinkHtmlCookbook($styleChoice, $loginId){
        $tagIdOrganizer = dbQuery("SELECT * FROM recipes
            INNER JOIN scores ON scores.recipeId = recipes.recipeId
            INNER JOIN recipe_tag_linked ON recipe_tag_linked.recipeId = scores.recipeId
            INNER JOIN recipeTags ON recipeTags.recipeTagName =  recipe_tag_linked.recipeTagName
            -- INNER JOIN scores ON recipeTags.recipeTagId =  scores.recipeId
            -- INNER JOIN scores ON scores.recipeId = recipe_tag_linked.recipeId
            WHERE scores.loginId = :loginId
            -- ORDER BY dateOfPost DESC
            ORDER BY score DESC
            ", array("loginId" => $loginId))->fetchALL();
            $tagPostArray = array();
            $returnTaggedPosts="";
            echo "<h2 class='$styleChoice'>All Recipes</h2>";
            foreach ($tagIdOrganizer as $tagPosts){
                if(!@$tagPostArray[$tagPosts['recipeTagName']]){
                    $tagPostArray[$tagPosts['recipeTagName']] = true;
                }
            $returnTaggedPosts .= "<div class='recipeList' ><a href ='/cookingWebsite/yourCookbook/theRecipeCookbook.php?recipeId=".
                $tagPosts['recipeId']."' class='recipeDesign' > ". $tagPosts['title']." </a></div>";
            }
            return $returnTaggedPosts;
}
