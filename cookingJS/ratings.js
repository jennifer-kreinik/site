
function addTagExistingRecipe(recipeId){
    var recipeIngredientName = $('#recipeIngredientName').val();
    var submitItem = $('#submitItem').val();
    console.log(recipeId, submitItem, recipeIngredientName)
    $.post('/ajax/saveAddedtag.php', {recipeIngredientName:recipeIngredientName, submitItem:submitItem, recipeId:recipeId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        alert("The tag was sucessfully added!")// $('.addTag').html(Data)
    });
    return false;
}
function deleteTagExistingRecipe(recipeId){
    var recipeIngredientName = $('#recipeIngredientName').val();
    var submitItem = $('#deleteItem').val();
    $.post('/ajax/deleteTagExistingPost.php', {recipeIngredientName:recipeIngredientName, deleteItem:deleteItem, recipeId:recipeId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        // $('.deleteTag').html(Data)
    });
    return false;
}
