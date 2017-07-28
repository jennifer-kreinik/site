<?php
include('init.php');
verifyUserCooking();
// $groceries = yourIngredientsByLoginId();
// $shoppingArray = array();
// $returnIngredient = "";
//     foreach ($groceries as $ingredientOrganized){
//         if(!@$shoppingArray[$ingredientOrganized['ingredientId']]){
//             $shoppingArray[$ingredientOrganized['ingredientId']] = true;
//         }
//     $returnIngredient = $shoppingArray[$ingredientOrganized['ingredientId']];
// }
$deleteItem = $_REQUEST['ingredientId'];
deleteIngredentFromList($deleteItem);
echo listOfShoppingList();
