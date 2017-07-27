<?php
include('config/init.php');

if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['email']){
        $errors['email'] = "*Required*";
    }
    if(!@$_REQUEST['password']){
        $errors['password'] = "*Required*";
    }
    if(!@$_REQUEST['firstName']){
        $errors['firstName'] = "*Required*";
    }
    if(!@$_REQUEST['lastName']){
        $errors['lastName'] = "*Required*";
    }
    if(sizeof($errors) == 0){

        echo signUpAccount($_REQUEST['email'], sha1($_REQUEST['password']), $_REQUEST['firstName'], $_REQUEST['lastName']);
        //header('Location:/adminStuff/adminSection.php');
        exit;
    }

}
    echo echoHeaderHtml("Sign Up ", "Sign Up").
        "</div><h2 > Sign Up! </h2><div class = 'aboutMe'></br>
            <form action='' method='post' class = 'formComments'>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Email', 'email','Email', @$_REQUEST['email'], @$errors['email']).
            "Password: ".returnRequireStatement(@$errors['password'])."<br/><input type='password' name='password' id='password'
            placeholder='Password'/><br/><br/>".
            singleLineTextBox('First Name', 'firstName','Jonh', @$_REQUEST['firstName'], @$errors['firstName'])."".
            singleLineTextBox('Last Name', 'lastName','Doe', @$_REQUEST['lastName'], @$errors['lastName'])."
            <input type='hidden' name='articleid' id='articleid' />".
            submitButton('Sign Up!'). "</form> ".
            echoFooterHtml();
