<?php
include_once('config/init.php');
function blogTagOrganizer (){
    $tagTypes = dbQuery("
            SELECT *
            FROM tags
            ")->fetchALL();
    $tagArray = array();
        foreach ($tagTypes as $tagsOrganized){
            if(!in_array($tagsOrganized['tagName'], $tagArray)){
                array_push($tagArray, $tagsOrganized['tagName']);
                echo "<a class = 'resume' href = 'listOfBlogs.php?tagPostId=". $tagsOrganized['tagId']."'>".$tagsOrganized['tagName']." </a>";
                }
            }
        }
function echoPostLinkHtml($postTagName){
    $tagIdOrganizer = dbQuery("
        SELECT * FROM blog_post
        INNER JOIN blogPost_tags_linked ON blogPost_tags_linked.blogPostId = blog_post.blogPostId
        INNER JOIN tags ON tags.tagName =  blogPost_tags_linked.tagName
        WHERE tags.tagId = :varTagName
        ", array("varTagName" => $postTagName))->fetchALL();
        $tagPostArray = array();
        foreach ($tagIdOrganizer as $tagPosts){
            if(!@$tagPostArray[$tagPosts['tagName']]){
                echo "<h4 class='projects'>".$tagPosts['tagName']."</h4>";
                $tagPostArray[$tagPosts['tagName']] = true;
            }
            echo  "<a class = 'resume' href = 'viewPost.php?blogPostId=". $tagPosts['blogPostId']."'>".$tagPosts['title']." </a>";
        }
    }
function contentOfBlog($postId){
    $post = dbQuery("
        SELECT *
        FROM blog_post
        WHERE blogPostId = :varPostId
        ", array("varPostId"=>$postId))
        ->fetch();
    $postTitle = $post['title'];
    $postBody= $post['body'];
    return "<h2>". $postTitle. "</h2>" . $postBody. "<br> <p style= 'text-decoration: underline'> Feel free to leave any comments below: only username and comment will be displayed </p>";
 }

 function commentSection($postId){
     echo "
     <div class = 'formComments'>
     <form action='insert.php' method='post'>
     <input type='hidden' name='blogPostId' value=". $postId."/>
      Name:<br> <input type='text' name='name' id='name' value = 'Name' /><br />
     Email:<br> <input type='text' name='email' id='email' value = 'John-Doe@email.com' /><br />
      Username:<br> <input type='text' name='username' id='username' value = 'username' /><br />
      Comment:<br />
      <textarea name='comment' id='comment'>Type comment here...</textarea><br />
      <input type='hidden' name='articleid' id='articleid' value=".$postId." />
      <input type='submit' value='Post Comment' style = 'background-color: #b2e5a7' /> </form> </div>"
      ;
 }
function echoCommentHtml($postId){
    $postSpecificComments = dbQuery("
        SELECT * FROM blog_post
        INNER JOIN blogComments ON blogComments.blogPostId = blog_post.blogPostId
        WHERE blogComments.blogPostId = :varPostId
        ", array("varPostId" => $postId));
        $commentPostArray = array();
        foreach ($postSpecificComments as $postComments){
            if(!in_array($postComments['blogPostId'], $commentPostArray)){
                array_push($commentPostArray, $postComments['blogPostId']);
            }
            echo "<div class='commentStyle'><i class='fa fa-user-circle-o' aria-hidden='true'><br/>".$postComments['username']." </i>
                <p class='commentSection'> ".$postComments['comment']."</p></div><br/>";
        }
    }
