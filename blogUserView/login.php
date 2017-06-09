<?php
include('config/init.php');
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['username']){
        $errors['username'] = "*Required*";
    }
    if(!@$_REQUEST['password']){
        $errors['password'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        echo loginVerification($_REQUEST['username'], $_REQUEST['password']);
        exit;
    }
}
    echo echoHeaderHtml("Login Page", "Login").
        "</div><h2 > Login </h2><div class = 'aboutMe'></br>
            <form action='' method='post' class = 'formComments'>
            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Username', 'username','Username', @$_REQUEST['username'], @$errors['username']).
            "Password: ".returnRequireStatement(@$errors['password'])."<br/><input type='password' name='password' id='password'
            placeholder='Password'/><br/><br/>
            <input type='hidden' name='articleid' id='articleid' />".
            submitButton('Login'). "</form> ".
            echoFooterHtml();
