<?php
include('config/init.php');
if(isset($_POST['submitItem'])){
    dbQuery("INSERT INTO blogPost_tags_linked (tagName, blogPostId)
        VALUES (:tag, :postId)", array('tag'=>$_REQUEST['tagName'], 'postId'=>$_REQUEST['blogPostId']));
            header('Location:adminListAllBlogPosts.php');
}
if(isset($_POST['deleteItem'])){
    dbQuery("DELETE FROM blogPost_tags_linked WHERE tagName=:tagName and blogPostId=:blogPostId",
        array('tagName'=>$_REQUEST['tagName'], 'blogPostId'=>$_REQUEST['blogPostId']));
        header('Location:adminListAllBlogPosts.php');
}
