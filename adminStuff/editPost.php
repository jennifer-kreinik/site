<?php
include('config/init.php');
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['blogTitle']){
        $errors['blogTitle'] = "*Required*";
    }

    if(!@$_REQUEST['body']){
        $errors['body'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        echo updatePost($_REQUEST['blogTitle'], $_REQUEST['body'], $_REQUEST['blogPostId']);
        exit;
    }
}
if(isset($_REQUEST['deleteItem'])){
    $errors = array();

    if(!@$_REQUEST['blogTitle']){
        $errors['blogTitle'] = "*Required*";
    }

    if(!@$_REQUEST['body']){
        $errors['body'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        echo deleteExisitingPost($_REQUEST['blogPostId']);
        exit;
    }
}
$postId = $_REQUEST['blogPostId'];
$posts=obtainSpecificBlogPosts($postId);
echo echoAdminHeaderHtml("Admin Section", "Edit Post").
        "</div><h2> Edit Post </h2><div class = 'forms'></br>
            <form action='' method='post'>
            <input type='hidden' name='blogPostId' value='".$postId."'/>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Blog Post Title', 'blogTitle','Blog Title', $posts['title'], @$errors['blogTitle'])."
            ".textareaTextBox ('Blog Post', 'body', 'Type blog post here...', $posts['body'], @$errors['body'])."
            <input type='hidden' name='articleid' id='articleid' />".
            submitButton('Update Post').
            deleteButton('Delete Post'). "</form> </div></div>".
            echoAdminFooterHtml();
