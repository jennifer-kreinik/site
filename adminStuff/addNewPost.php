<?php
include('init.php');
// include('config/init.php');
verifyUser();
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['blogTitle']){
        $errors['blogTitle'] = "*Required*";
    }

    if(!@$_REQUEST['body']){
        $errors['body'] = "*Required*";
    }
    if(!@$_REQUEST['tagName']){
        $errors['tagName'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        addPostQuery($_REQUEST['blogTitle'], $_REQUEST['body'], $_REQUEST['tagName']);
        header('Location:/adminStuff/addNewPost.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<?php
echo echoAdminHeaderHtml("Admin Section", "Edit Post").
        "</div><h2> New Post </h2><div class = 'forms'></br>
            <form action='' method='post'>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Blog Post Title', 'blogTitle','Blog Title', @$_REQUEST['blogTitle'], @$errors['blogTitle'])."<div class='writePost'>
            ".textareaTextBox ('Blog Post', 'body', 'Type blog post here...', @$_REQUEST['body'], @$errors['body'])."</div>
            ".dropDownMenu ('Tag(s)', 'tagName', 'Select Tag', tagDropDownMenu(), @$errors['tagName'])."
            ". submitButton('Create New Post'). "</form> ".
            echoAdminFooterHtml();
//  echo "<pre>
// ";
// var_dump($_REQUEST);
// echo "</pre>";
//<input type='hidden' name='articleid' id='articleid' />
