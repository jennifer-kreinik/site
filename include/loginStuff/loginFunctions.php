<?php
function signUpAccount($email, $password, $firstName, $lastName){
    dbQuery("INSERT INTO loginBlog (email, password, firstName, lastName)
        VALUES (:email, :password, :firstName, :lastName)",
        array('email'=>$email, 'password'=>$password, 'firstName'=>$firstName, 'lastName'=>$lastName));
        return echoAdminHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Sign Up Sucessful! <br/>
            <a href='/adminStuff/adminSection.php'> Click Here to Start Managing Posts</a> </h4></br>". echoAdminFooterHtml();
}
function obtainSpecificUser($email){
    return $user = dbQuery("
        SELECT * FROM loginBlog
        WHERE email = :email
        ", array("email"=>$email))
        ->fetch();
}
function loginVerification ($email, $password){
    $user = obtainSpecificUser($email);
    $userEmail=$user['email'];
    $userPassword=$user['password'];
    $userId=$user['loginId'];
    dbQuery("SELECT* FROM loginBlog WHERE email=:email and password =:password",
    array('email'=>$userEmail, 'password'=>sha1($userPassword)));
    if ($email==$userEmail and sha1($password)==$userPassword){
            $_SESSION['loginId']=$userId;
        return echoAdminHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> LogIn Sucessful! <br/>
            <a href='/adminStuff/adminSection.php'> Click Here to Start Managing Posts</a> </h4></br>". echoAdminFooterHtml();
    }
    else if ($email==$userEmail and sha1($password)!=$userPassword){
        return echoHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Password Inccorect! <br/>
            <a href='/blogUserView/login.php'>Click Here to Try Again</a> </h4></br>". echoFooterHtml();
    }
    else{
        return echoHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> LogIn Failed! Your email and password are incorrect <br/>
            <a href='/blogUserView/login.php'>Click Here to Try Again</a> </h4></br>". echoFooterHtml();
    }

}
function verifyUser(){
    $isLoggedIn = false;
    if(isset($_SESSION['loginId'])) {
        $isLoggedIn = true;
    }
    if(!$isLoggedIn){
        header('Location:/blogUserView/login.php');
        exit;
    }
    //
    //
    //
    // dbQuery("SELECT * FROM loginBlog WHERE loginId = :loginId",
    // array('loginId'=>$_SESSION['loginId']))->fetch();
}
