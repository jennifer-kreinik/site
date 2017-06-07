<?php
include('config/init.php');
    dbQuery("INSERT INTO blog_post (title, body, dateOfPost)
        VALUES (:blogTitle, :body, :dateOfPost)", array('blogTitle'=>$_REQUEST['blogTitle'], 'body'=>$_REQUEST['body'], 'dateOfPost'=>getPostDateTime()));

    $postId=dbQuery("SELECT LAST_INSERT_ID() FROM blog_post")->fetch();

    dbQuery("INSERT INTO blogPost_tags_linked(tagName, blogPostId)
    VALUES (:tagName, :blogPostId)", array('tagName'=>$_REQUEST['tagName'], 'blogPostId'=>$postId['LAST_INSERT_ID()']));
    echo echoHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
        <a href='adminSection.php'> Click here to write another post</a> </h4></br>". echoAdminFooterHtml();
