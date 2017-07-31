<?php
include('init.php');
verifyUserCooking();
$deleteItem = $_REQUEST['ingredientId'];
deleteIngredentFromList($deleteItem);
echo listOfShoppingList();
