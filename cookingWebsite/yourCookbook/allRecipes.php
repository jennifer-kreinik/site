<?php
include('config/init.php');
verifyUserCooking();
echo yourCookbookEchoHtmlHeader("All Recipes");
$recipeTags = recipeTagOrganizer ();
?>
<div  class='title'>
 <h2 style='text-decoration: underline'> All Recipes </h2>

<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=1' class= 'tag1'/> Breakfast </a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=2 ' class= 'tag2' /> Brunch </a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=3' class= 'tag3'/> Lunch </a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=4' class= 'tag4'/> Dinner </a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=5' class= 'tag5' /> Dessert </a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=6' class= 'tag6'/> Side Dishes</a><br/>
<a href = '/cookingWebsite/yourCookbook/recipeCategory.php?recipeTagId=7' class= 'tag7'/>Drinks/Cocktails</a><br/>
