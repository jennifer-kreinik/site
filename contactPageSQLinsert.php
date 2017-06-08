<?php
include('config/init.php');
    dbQuery("INSERT INTO contactPage (name, email, comment)
        VALUES (:name, :email, :comment)", array('name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email'], 'comment'=>$_REQUEST['comment']));
                echo echoHeaderHtml("Contact", "More Information about Me")." <br/></br><h4 class='contact'> Message successfully recorded! </h4><br/></br>". echoFooterHtml();
