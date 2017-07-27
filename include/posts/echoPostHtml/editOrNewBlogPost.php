<?php
function allBlogPosts(){
    return $posts = dbQuery("
        SELECT *
        FROM blog_post
        ")->fetchALL();
}
function echoListOfAllPostsAdmin (){
    $posts = allBlogPosts();
    $postArray = array();
    $returnPosts = "";
        foreach ($posts as $postsOrganized){
            if(!@$postArray[$postsOrganized['title']]){
                $postArray[$postsOrganized['title']] = true;
            }
        $returnPosts .=  "<div class='resume'><a href = /adminStuff/editPost.php?blogPostId=".
            $postsOrganized['blogPostId']. "'> <i class='fa fa-pencil-square-o' aria-hidden='true'>
            </a></i>
            <a href = /adminStuff/addNewTag.php?blogPostId=".$postsOrganized['blogPostId'].
            "'> <i class='fa fa-tags' aria-hidden='true'></a></i> ".$postsOrganized['title']."</div>";
        }
        return $returnPosts;
    }
function obtainSpecificBlogPosts($postId){
    return $posts = dbQuery("
        SELECT *
        FROM blog_post
        WHERE blogPostId = :varPostId
        ", array("varPostId"=>$postId))
        ->fetch();
}
