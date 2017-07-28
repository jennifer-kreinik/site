<?php
include('init.php');
// include('config/init.php');
// $errorAlert = sizeof(@$errors);
$postId =  $_REQUEST['blogPostId'];
//$commentId =  $_REQUEST['id'];


echo echoHeaderHtml("Blog", "My Blog!").
        "</div><div class = 'aboutMe'></br>".
            contentOfBlog($postId)."
            <form action=# method='post' class = 'formComments' onsubmit='return viewComment($postId)'>
            <input type='hidden' name='blogPostId' value=". $postId."/>
            <input type='hidden' namCan ie='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Name', 'name','John Doe', @$_REQUEST['name'], @$errors['name'])."
            ".singleLineTextBox('Email', 'email','john.doe@email.com', @$_REQUEST['email'], @$errors['email'])."
            ".singleLineTextBox('Username', 'username','Username', @$_REQUEST['username'], @$errors['username'])."
            ".textareaTextBox ('Comment', 'comment', 'Type comment here...', @$_REQUEST['comment'], @$errors['comment'])
            ."<input type='submit' id = 'submitItem' name = 'submitItem'  value='Post Comment' style='background-color: #b2e5a7'/></form>
            <input type='hidden' name='articleid' id='articleid' value=".$postId." />";

echo "<div class ='allComments'".
        echocommentHtml($postId)."</div>".
        echoFooterHtml();
