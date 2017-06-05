<?php
include('config/init.php');
echo echoHeaderHtml("Contact", "More Information About Me");
 ?>
<h2> Contact
    <h4 class="contact">
        <p style= 'text-decoration: underline'> Please use the form to direct all questions or concerns </p>
        <form action="contactPageSQlinsert.php" method="post">
    Name: <br/><input type="text" name="name" id="name" placeholder="John Doe" /><br />
    Email:<br/> <input type="text" name="email" id="email" placeholder="john.doe@email.com" /><br />
    Questions/Concerns/Comments:<br />
        <textarea name="comment" id="comment" placeholder="Comment, Questions, Concerns ...."></textarea><br />
        <input type="hidden" name="articleid" id="articleid" value="<? echo $_GET['id'] ?>" />
        <input type="submit" value="Submit" style="background-color: #b2e5a7"/>
        <input type="reset" value="Reset">
    </form>
<!-- <?php
    $name = $_POST['name'];
    $visitorsEmail = $_POST['email'];
    $message = $_POST['comment'];
    $emailFrom = "jenny.kreinik@lessannoyingcrm.com";
    $emailSubject = "New Form Submission ";
    $emailBody = "You have received a new message from the user $name.\n"."Here is the message:\n $message".
    $to = "jenny.kreinik@lessannoyingcrm.com";
    $headers = "From: $emailFrom \r\n";
    $headers .= "Reply-To: $visitorsEmail \r\n";
    mail($to, $emailSubject, $emailBody, $headers);
function IsInjected($str){
    $injections = array(
        '(\n+)',
        '(\r+)',
        '(\t+)',
        '(%0A+)',
        '(%0D+)',
        '(%08+)',
        '(%09+)'
        );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
        if(preg_match($inject,$str)){
            return true;
        }
        else{
            return false;
        }
        }
        if(IsInjected($visitor_email)){
            echo "Bad email value!";
            exit;
        }
?> -->
        <a href="mailto:jenny.kreinik@lessannoyingcrm.com" class="fa fa-envelope" aria-hidden="true"></a>
        <a href="http://linkedin.com/in/jennifer-kreinik-731a63106" class="fa fa-linkedin"></a>
         <br/><br/>
    </h4>
<?php
echo echoFooterHtml();
?>
