<?php
function addpostQuery($blogTitle, $body, $tagName){
    dbQuery("INSERT INTO blog_post (title, body, dateOfPost)
        VALUES (:blogTitle, :body, :dateOfPost)", array('blogTitle'=>$blogTitle, 'body'=>$body, 'dateOfPost'=>getPostDateTime()));

    $postId=dbQuery("SELECT LAST_INSERT_ID() FROM blog_post")->fetch();

    dbQuery("INSERT INTO blogPost_tags_linked(tagName, blogPostId)
    VALUES (:tagName, :blogPostId)", array('tagName'=>$tagName, 'blogPostId'=>$postId['LAST_INSERT_ID()']));
    return echoAdminHeaderHtml("Admin Section", "Admin Section")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
        <a href='/adminStuff/adminSection.php'> Click here to write another post</a> </h4></br>". echoAdminFooterHtml();
}
function updatePost($title, $body, $postId){
    dbQuery("UPDATE blog_post SET title = :title, body = :body
                WHERE blogPostId = :blogPostId",
                array('title'=>$title, 'body'=>$body, 'blogPostId'=>$postId));
    header('Location:/adminStuff/adminListAllBlogPosts.php');
}
function deleteExisitingPost($postId){
    dbQuery("DELETE FROM blog_post WHERE blogPostId= :blogPostId", array('blogPostId'=>$_REQUEST['blogPostId']));
    dbQuery("DELETE FROM blogComments WHERE blogPostId= :blogPostId", array('blogPostId'=>$_REQUEST['blogPostId']));
    dbQuery("DELETE FROM blogPost_tags_linked WHERE blogPostId= :blogPostId", array('blogPostId'=>$_REQUEST['blogPostId']));
 header('Location:/adminStuff/adminListAllBlogPosts.php');
 }
function commentQuery($name, $email, $username, $comment, $postId){
        dbQuery("INSERT INTO blogComments (name, email, username, comment, blogPostId, dateComment)
        VALUES (:name, :email, :username, :comment, :postId, :dateComment)",
        array('name'=>$name, 'email'=>$email, 'username'=>$username,
                'comment'=>$comment, 'postId'=>$postId, 'dateComment'=>getPostDateTime()));
    $commentId=dbQuery("SELECT LAST_INSERT_ID() FROM blogComments")->fetch();
        // header('Location:/blogUserView/viewPost.php?blogPostId='.$postId.'#comment_'.$commentId["LAST_INSERT_ID()"]);

            // echo echoHeaderHtml("Blog", "My Blog!")." <br/></br><h4 class='contact'> Comment successfully posted! <br/>
            //     <a href='/blogUserView/viewPost.php?blogPostId=".$postId."'> Click Here to return to post</a> </h4></br>". echoFooterHtml();
 }
 //
