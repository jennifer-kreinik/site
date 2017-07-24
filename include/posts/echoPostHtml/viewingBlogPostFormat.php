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
                echo "<a class = 'resume' href = '/blogUserView/listOfBlogs.php?tagPostId=". $tagsOrganized['tagId']."'>".$tagsOrganized['tagName']." </a>";
                }
            }
        }
function echoPostLinkHtml($postTagName){
    $tagIdOrganizer = dbQuery("
        SELECT * FROM blog_post
        INNER JOIN blogPost_tags_linked ON blogPost_tags_linked.blogPostId = blog_post.blogPostId
        INNER JOIN tags ON tags.tagName =  blogPost_tags_linked.tagName
        WHERE tags.tagId = :varTagName
        ORDER BY dateOfPost DESC
        ", array("varTagName" => $postTagName))->fetchALL();
        $tagPostArray = array();
        foreach ($tagIdOrganizer as $tagPosts){
            if(!@$tagPostArray[$tagPosts['tagName']]){
                echo "<h4 class='projects'>".$tagPosts['tagName']."</h4>";
                $tagPostArray[$tagPosts['tagName']] = true;
            }
            echo  "<a class = 'resume' href = '/blogUserView/viewPost.php?blogPostId=". $tagPosts['blogPostId']."'>".$tagPosts['title']." </a>";
        }
    }
function contentOfBlog($postId){
    $post= obtainSpecificBlogPosts($postId);
    $postTitle = $post['title'];
    $postBody= $post['body'];
    $timePosted = $post['dateOfPost'];
    return "<h2>". $postTitle. "</h2>" . $postBody. "<br/><br/><div style = 'font-size:13px'>". $post['dateOfPost']."</div> <p style= 'text-decoration: underline'> Feel free to leave any comments below: only username and comment will be displayed </p>";
 }
