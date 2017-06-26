<?php
include('config/init.php');
verifyUserCooking();
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['title']){
        $errors['title'] = "*Required*";
    }
    if(!@$_REQUEST['ingredients']){
        $errors['ingredients'] = "*Required*";
    }
    if(!@$_REQUEST['body']){
        $errors['body'] = "*Required*";
    }
    if(!@$_REQUEST['recipeTagName']){
        $errors['recipeTagName'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        addRecipeQuery($_REQUEST['title'], $_REQUEST['ingredients'], $_REQUEST['body'], $_REQUEST['recipeTagName']);
        header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
        exit;
    }
}

echo    yourCookbookEchoHtmlHeader("New Recipe").
        "</div><h2 class='title'> Add New Recipe: </h2><div class = 'newRecipe'></br>
            <form action='' method='post'>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Recipe Title', 'title','Title', @$_REQUEST['title'], @$errors['title'])."
            ".textareaTextBox ('Ingredients', 'ingredients', 'Type ingrdients here...(hit enter after each ingredient)',
            @$_REQUEST['ingredients'], @$errors['ingredients'])."
            ".textareaTextBox ('Instructions', 'body', 'Type instructions here...', @$_REQUEST['body'], @$errors['body'])."
            Tag: ".returnRequireStatement(@$errors['recipeTagName'])."<br/><select id = 'recipeTagName' name= 'recipeTagName'>
            <option disabled selected value> ---Select Tag --- </option>
            <option value='Breakfast'>Breakfast </option>
            <option value='Brunch'>Brunch </option>
            <option value='Lunch'>Lunch </option>
            <option value='Dinner'>Dinner </option>
            <option value='Dessert'>Dessert </option>
            <option value='Side Dishes'>Side Dishes</option>
            <option value='Drinks/Cocktails'>Drinks/Cocktails</option>
            ". loginButtonCooking('Publish New Recipe'). "</form> ";
