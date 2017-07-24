<?php
function signUpCookingAccount($email, $password, $firstName, $lastName){
    dbQuery("INSERT INTO cookingLogin (email, password, firstName, lastName)
        VALUES (:email, :password, :firstName, :lastName)",
        array('email'=>$email, 'password'=>$password, 'firstName'=>$firstName, 'lastName'=>$lastName));
        header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
}
function obtainSpecificUserCooking($email){
    return $user = dbQuery("
        SELECT * FROM cookingLogin
        WHERE email = :email
        ", array("email"=>$email))
        ->fetch();
}
function loginVerificationCooking ($email, $password){
    $user = obtainSpecificUserCooking($email);
    $userEmail=$user['email'];
    $userPassword=$user['password'];
    $userId=$user['loginId'];
    dbQuery("SELECT* FROM cookingLogin WHERE email=:email and password =:password",
    array('email'=>$userEmail, 'password'=>sha1($userPassword)));
    if ($email==$userEmail and sha1($password)==$userPassword){
            $_SESSION['loginId']=$userId;
    header('Location:/cookingWebsite/yourCookbook/yourRecipes.php');
    }
    else if ($email==$userEmail and sha1($password)!=$userPassword){
        header('Location:/cookingWebsite/loginSignUp.php');
    }
    else{
        header('Location:/cookingWebsite/loginSignUp.php');
    }

}
function verifyUserCooking(){
    $isLoggedIn = false;
    if(isset($_SESSION['loginId'])) {
        $isLoggedIn = true;
    }
    if(!$isLoggedIn){
        header('Location:/cookingWebsite/loginSignUp.php');
        exit;
    }
}
