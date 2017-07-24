<?php
include('config/init.php');
verifyUserCooking();
echo yourCookbookEchoHtmlHeader("New Recipe");
?>

<div id="shoppingList" class="shoppingList">
    <h2> Shopping List </h2>
    <form action='' method='post' onsubmit='return newGroceryItem();'>
    <input type="text" name = "ingredientName" id="ingredientName" placeholder="Ingredient...">
    <input type="submit" name= "addItem" id="addItem" value="Add Ingredient" class="addBtn"></form>
</div><br/>
<ul id="groceryUL" class = 'allIngredients'>
    <?php
        echo listOfShoppingList();
    ?>
</ul>
