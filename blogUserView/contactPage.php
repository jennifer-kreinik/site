<?php
include('init.php');
//include('config/init.php');
if(isset($_REQUEST['submitItem'])){
    $errors = array();

    if(!@$_REQUEST['name']){
        $errors['name'] = "*Required*";
    }

    if(!@$_REQUEST['email']){
        $errors['email'] = "*Required*";
    }
    if(!@$_REQUEST['comment']){
        $errors['comment'] = "*Required*";
    }
    if(sizeof($errors) == 0){
        echo contactQuery($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['comment']);
        exit;
    }
}
echo echoHeaderHtml("Blog", "My Blog!").
        "</div><h2> Contact </h2> <div class = 'aboutMe'></br>
            <h4 class='contact'>
            <p style= 'text-decoration: underline'> Please use the form to direct all questions or concerns </p>
            <form action='' method='post'>

            <input type='hidden' name='dateOfPost' id='dateOfPost' value=".getPostDateTime(). " />".
            singleLineTextBox('Name', 'name','John Doe', @$_REQUEST['name'], @$errors['name'])."
            ".singleLineTextBox('Email', 'email','john.doe@email.com', @$_REQUEST['email'], @$errors['email'])."
            ".textareaTextBox ('Questions/Concerns/Comments', 'comment', 'Type comment here...', @$_REQUEST['comment'], @$errors['comment'])."
            <input type='hidden' name='articleid' id='articleid' />".
            submitButton('Submit Request'). "
            <input type='reset' value='Reset' style='background-color:#cfe6fc'></form>
            <a href='mailto:jenny.kreinik@lessannoyingcrm.com' class='fa fa-envelope' aria-hidden='true'></a>
            <a href='http://linkedin.com/in/jennifer-kreinik-731a63106' class='fa fa-linkedin'></a>
            <br/><br/></h4>".
            echoFooterHtml();



//     $name = $_POST['name'];
//     $visitorsEmail = $_POST['email'];
//     $message = $_POST['comment'];
//     $emailFrom = "jenny.kreinik@lessannoyingcrm.com";
//     $emailSubject = "New Form Submission ";
//     $emailBody = "You have received a new message from the user $name.\n"."Here is the message:\n $message".
//     $to = "jenny.kreinik@lessannoyingcrm.com";
//     $headers = "From: $emailFrom \r\n";
//     $headers .= "Reply-To: $visitorsEmail \r\n";
//     mail($to, $emailSubject, $emailBody, $headers);
// function IsInjected($str){
//     $injections = array(
//         '(\n+)',
//         '(\r+)',
//         '(\t+)',
//         '(%0A+)',
//         '(%0D+)',
//         '(%08+)',
//         '(%09+)'
//         );
//     $inject = join('|', $injections);
//     $inject = "/$inject/i";
//         if(preg_match($inject,$str)){
//             return true;
//         }
//         else{
//             return false;
//         }
//         }
//         if(IsInjected($visitor_email)){
//             echo "Bad email value!";
//             exit;
//         }
