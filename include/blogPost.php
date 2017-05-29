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
function echoPostLinkHtml($postTagId){
    $tagIdOrganizer = dbQuery("
        SELECT * FROM blog_post
        INNER JOIN blogPost_tags_linked ON blogPost_tags_linked.blogPostId = blog_post.blogPostId
        INNER JOIN tags ON tags.tagId =  blogPost_tags_linked.tagId
        WHERE tags.tagId = :varTagName
        ", array("varTagName" => $postTagId))->fetchALL();
        $tagPostArray = array();
        foreach ($tagIdOrganizer as $tagPosts){
            if(!in_array($tagPosts['tagName'], $tagPostArray)){
                echo "<h4 class='projects'>".$tagPosts['tagName']."</h4>";
                array_push($tagPostArray, $tagPosts['tagName']);
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
    return "<h2>". $postTitle. "</h2>" . $postBody. "<br> <p style= 'text-decoration: underline'> Feel free to leave any comments below </p>";
 }

 function commentSection($postId){
     echo "
      Name: <input type='text' name='name' id='name' /><br />
     Email: <input type='text' name='email' id='email' /><br />
      Comment:<br />
      <textarea name='comment' id='comment'></textarea><br />
      <input type='hidden' name='articleid' id='articleid' value=".$postId." />
      <input type='submit' value='Submit' /> </form> </div>";
 }
