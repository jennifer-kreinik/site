<?php
include('init.php');
verifyUserCooking();
$deleteItem = $_REQUEST['ingredientId'];
$loginId = $_SESSION['loginId'];
deleteIngredentFromList($loginId, $deleteItem);
echo listOfShoppingList();
