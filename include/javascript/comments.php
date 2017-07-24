<script>
function viewComment(blogPostId){
    var username = $('#username').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var comment = $('#comment').val();
    var submitItem = $('#submitItem').val();
    $.post('/ajax/saveComment.php', {username:username, name:name, email:email, comment:comment, submitItem:submitItem, blogPostId:blogPostId}, function(Data){
          if (Data == "failure"){
            alert("Error");
            return false;
        }
        $('.allComments').html(Data)
    });
    console.log("we're here 1");
    return false;
}

</script>
