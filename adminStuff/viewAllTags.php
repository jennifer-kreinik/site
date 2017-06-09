<?php
include('config/init.php');
verifyUser();
if(isset($_REQUEST['submitItem'])){
    $errors1 = array();

    if(!@$_REQUEST['tagName']){
        $errors1['tagName'] = "*Required*";
    }
    if(sizeof($errors1) == 0){
        echo addNewTagQuery($_REQUEST['tagName']);
        exit;
    }
}
if(isset($_REQUEST['deleteItem'])){
    $errors2 = array();

    if(!@$_REQUEST['tagName']){
        $errors2['tagName'] = "*Required*";
    }
    if(sizeof($errors2) == 0){
        echo deleteNewTagQuery($_REQUEST['tagName']);
        exit;
    }
}

echo echoAdminHeaderHtml("Admin Section", "Tags").
        "</div><h2>Tags: </h2>
            <h4 class = 'projects'> Add/Delete Tags: </h4>
            <div class = 'forms'>
            <form action='' method='post'>
            <input type = 'hidden' name = 'blogPostId' value ='". @$_REQUEST['postId']. "'/>".
            singleLineTextBox('New Tag Name', 'tagName',' ', @$_REQUEST['tagName'], @$errors1['tagName'])."
            ".submitButton('Add Tag'). "<br/><br/> ".
            dropDownMenu ('Delete Existing Tag (this will delete this tag from ALL posts)', 'tagName', 'Select Tag', tagDropDownMenu(), @$errors2['tagName'])."
            <input type='hidden' name='articleid' id='articleid' />".
            deleteButton('Delete Tag').
            "</form> </div>
            <h4 class = 'projects'> List of all tag names: </h4>".
            listOfAllTags().
            echoAdminFooterHtml();
