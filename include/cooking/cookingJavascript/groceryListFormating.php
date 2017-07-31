<script>
function newGroceryItem(){
    var ingredientName = $('#ingredientName').val();
    var addItem = $('#addItem').val();

    if(ingredientName == ''){
        alert("Please enter an ingredient name");
        return false;
    }
    //$('#temp').html('hello')
    //$.append('asfasf');
    //JSON.parse or something like that
    $.post('/ajax/saveShoppingList.php', {ingredientName:ingredientName, addItem:addItem}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        $('.allIngredients').html(Data)
    });
    return false;
}
function deleteIngredient(ingredientId){
    console.log(ingredientId);
    var deleteBtn = $('#deleteBtn').val();
    $.post('/ajax/deleteIngredientOffSHoppingList.php', { deleteBtn:deleteBtn, ingredientId:ingredientId}, function(Data){
        $('.allIngredients').html(Data)});
        console.log("2");
    return false;
}

</script>
