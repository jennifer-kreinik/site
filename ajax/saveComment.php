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
        commentQuery($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['username'], $_REQUEST['comment'], $_REQUEST['blogPostId']);
        echo echoCommentHtml($_REQUEST['blogPostId']);
        exit;
    }
    else{
        echo "failure";
        exit;
    }
}
