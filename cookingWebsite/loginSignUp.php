<?php
include('init.php');
// include('config/init.php');
    if(isset($_REQUEST['submitItem'])){
        $errors = array();

        if(!@$_REQUEST['email']){
            $errors['email'] = "*Required*";
        }
        if(!@$_REQUEST['password']){
            $errors['password'] = "*Required*";
        }
        if(sizeof($errors) == 0){
            loginVerificationCooking($_REQUEST['email'], $_REQUEST['password']);
            header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
            exit;
        }
    }
if(isset($_REQUEST['signUp'])){
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
        signUpCookingAccount($_REQUEST['email'], sha1($_REQUEST['password']), $_REQUEST['firstName'], $_REQUEST['lastName']);
        header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
        exit;
        }

    }

        echo echoCookingHeaderHtml("Login");
        echo    "</div><div class = 'login'><h2 > Login </h2></br>
                <form action='' method='post' class = 'formLogin'>
                <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
                singleLineTextBox('Email', 'email','Email', @$_REQUEST['email'], @$errors['email']).
                "Password: ".returnRequireStatement(@$errors['password'])."<br/><input type='password' name='password' id='password'
                placeholder='Password'/><br/><br/>
                <input type='hidden' name='articleid' id='articleid' />".
                loginButtonCooking('Login'). "</form></div> ";
        echo "<div class='seperatorLogin'> </div>";
        echo  "<div class = 'signUp'><h2 > Sign Up! </h2></br>
                <form action='' method='post' class = 'formLogin'>
                <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
                singleLineTextBox('Email', 'email','jane.doe@email.com', @$_REQUEST['email'], @$errors['email']).
                "Password: ".returnRequireStatement(@$errors['password'])."<br/><input type='password' name='password' id='password'
                placeholder='Password'/><br/><br/>".
                singleLineTextBox('First Name', 'firstName','Jane', @$_REQUEST['firstName'], @$errors['firstName'])."".
                singleLineTextBox('Last Name', 'lastName','Doe', @$_REQUEST['lastName'], @$errors['lastName'])."
                <input type='hidden' name='articleid' id='articleid' />".
                signUpButtonCooking('Sign Up'). "</form> </div>";
