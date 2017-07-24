<?php
function contactQuery($name, $email, $comment){
    dbQuery("INSERT INTO contactPage (name, email, comment)
        VALUES (:name, :email, :comment)", array('name'=>$name, 'email'=>$email, 'comment'=>$comment));
                echo echoHeaderHtml("Contact", "More Information about Me")." <br/></br><h4 class='contact'> Message successfully recorded! </h4><br/></br>". echoFooterHtml();
}
