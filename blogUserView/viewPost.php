<?php
include('config/init.php');
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['name']){
        $errors['name'] = "*Required*";
    }

    if(!@$_REQUEST['email']){
        $errors['email'] = "*Required*";
    }
    if(!@$_REQUEST['username']){
        $errors['username'] = "*Required*";
    }
    if(!@$_REQUEST['comment']){
        $errors['comment'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        echo commentQuery($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['username'], $_REQUEST['comment'], $_REQUEST['blogPostId']);
        exit;
    }
}
$postId =  $_REQUEST['blogPostId'];
echo echoHeaderHtml("Blog", "My Blog!").
        "</div><div class = 'aboutMe'></br>".
            contentOfBlog($postId)."
            <form action='' method='post' class = 'formComments'>
            <input type='hidden' name='blogPostId' value=". $postId."/>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Name', 'name','John Doe', @$_REQUEST['name'], @$errors['name'])."
            ".singleLineTextBox('Email', 'email','john.doe@email.com', @$_REQUEST['email'], @$errors['email'])."
            ".singleLineTextBox('Username', 'username','Username', @$_REQUEST['username'], @$errors['username'])."
            ".textareaTextBox ('Comment', 'comment', 'Type comment here...', @$_REQUEST['comment'], @$errors['comment'])."
            <input type='hidden' name='articleid' id='articleid' value=".$postId." />".
            submitButton('Post Comment'). "</form> ".
            echocommentHtml($postId).
            echoFooterHtml();
