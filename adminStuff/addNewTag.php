<?php
include('config/init.php');
verifyUser();
if(isset($_REQUEST['submitItem'])){
    $errors1 = array();

    if(!@$_REQUEST['tagName']){
        $errors1['tagName'] = "*Required*";
    }
    if(sizeof($errors1) == 0){
        echo addNewTagToExistingPost($_REQUEST['tagName'], $_REQUEST['blogPostId']);
        exit;
    }
}
if(isset($_REQUEST['deleteItem'])){
    $errors2 = array();

    if(!@$_REQUEST['tagName']){
        $errors2['tagName'] = "*Required*";
    }
    if(sizeof($errors2) == 0){
        echo deleteTagFromExistingPost($_REQUEST['tagName'], $_REQUEST['blogPostId']);
        exit;
    }
}
$postId = $_REQUEST['blogPostId'];

echo echoAdminHeaderHtml("Admin Section", "Edit Post").
        "</div><h2> Add/Delete Tag To Existing Post </h2><div class = 'forms'></br>
            <form action='' method='post'>
            <input type='hidden' name='blogPostId' value='". $postId."'/>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            dropDownMenu ('Add New Tag', 'tagName', 'Select Tag', tagDropDownMenu(), @$errors1['tagName'])."
            <input type='hidden' name='articleid' id='articleid' />".
            submitButton('Add Tag')."<br/><br/>".
            dropDownMenu ('Delete An Existing Tag', 'tagName', 'Delete Tag', currentTagDropDownMenu($postId), @$errors2['tagName']).
            deleteButton('Delete Tag').
            "</form></div></div>".
            echoAdminFooterHtml();
