<?php
include('config/init.php');
    dbQuery("INSERT INTO blog_post (title, body)
        VALUES (:blogTitle, :body)", array('blogTitle'=>$_REQUEST['blogTitle'], 'body'=>$_REQUEST['body']));

    dbQuery("SELECT LAST_INSERT_ID() FROM blog_post
    SET blogPostId = last_insert_id()",
    array());

    dbQuery("INSERT INTO blogPost_tags_linked(tagName, blogPostId)
    VALUES (:tagName, :blogPostId)", array('tagName'=>$_REQUEST['tagName'], 'blogPostId'=>$_REQUEST['blogPostId']));
    echo echoHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
        <a href='adminSection.php'> Click here to write another post</a> </h4></br>". echoAdminFooterHtml();
        // echo echoHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
        // <a href='adminSection.php'> Click here to write another post</a> </h4></br>". echoAdminFooterHtml();
// // close connection
// mysqli_close($link);
