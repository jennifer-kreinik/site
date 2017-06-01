<?php
include('config/init.php');
if(isset($_POST['submitItem'])){
    dbQuery("INSERT INTO blogPost_tags_linked (tagName, blogPostId)
        VALUES (:tag, :postId)", array('tag'=>$_REQUEST['tagName'], 'postId'=>$_REQUEST['blogPostId']));
            header('Location:adminListAllBlogPosts.php');
}
