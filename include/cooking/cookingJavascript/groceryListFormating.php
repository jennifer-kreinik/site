<script>
function newGroceryItem(){
    var ingredientName = $('#ingredientName').val();
    var addItem = $('#addItem').val();

    if(ingredientName == ''){
        console.log("im here 2");
        return false;
        alert("Please enter an ingredient name");
        return false;
    }
    //console.log("we're here 2", addItem, ingredient);

    $.post('/ajax/saveShoppingList.php', {ingredientName:ingredientName, addItem:addItem}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        $('.allIngredients').html(Data)
    });
    return false;
}
// function strikeThrough(){
//     var ingredient = $('#ingredientName').val();
//     $('ingredient').strike();
// }
function deleteIngredient(ingredientId){
    console.log(ingredientId);
    var deleteBtn = $('#deleteBtn').val();
    $.post('/ajax/deleteIngredientOffShoppingList.php', { deleteBtn:deleteBtn, ingredientId:ingredientId}, function(Data){
        $('.allIngredients').html(Data)});
        console.log("2");
    return false;
}
// function favorited(){
//     $('#faves').css('color','#ffff66');
// }
</script>
