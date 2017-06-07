<?php
include('config/init.php');
if(isset($_POST['submitItem'])){
    dbQuery("UPDATE blog_post SET title = :title, body = :body
                WHERE blogPostId = :blogPostId",
                array('title'=>$_REQUEST['blogTitle'], 'body'=>$_REQUEST['body'], 'blogPostId'=>$_REQUEST['blogPostId']));
    header('Location:adminListAllBlogPosts.php');
}
if(isset($_POST['deleteItem'])){
    dbQuery("DELETE FROM blog_post WHERE blogPostId= :blogPostId", array('blogPostId'=>$_REQUEST['blogPostId']));
    dbQuery("DELETE FROM blogComments WHERE blogPostId= :blogPostId", array('blogPostId'=>$_REQUEST['blogPostId']));
 header('Location:adminListAllBlogPosts.php');
 }
