<?php
include('config/init.php');

 $postId =  $_REQUEST['blogPostId'];

dbQuery("INSERT INTO blogComments (name, email, username, comment, blogPostId)
        VALUES (:name, :email, :username, :comment, :postId)",
        array('name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email'], 'username'=>$_REQUEST['username'],
                'comment'=>$_REQUEST['comment'], 'postId'=>$_REQUEST['blogPostId']));

            echo echoHeaderHtml("Blog", "My Blog!")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
                <a href='viewPost.php?blogPostId=".$postId."'> Click Here to return to post</a> </h4></br>". echoFooterHtml();
